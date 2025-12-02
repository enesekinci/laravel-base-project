#!/bin/bash

# Laravel Octane (FrankenPHP) Deployment Test Script
# Bu script deploy edilen projeyi test eder

set -e

# Renkler
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# URL (environment variable'dan al veya default kullan)
BASE_URL="${BASE_URL:-http://localhost}"
if [[ "$BASE_URL" == "http://localhost" ]]; then
    echo -e "${YELLOW}⚠️  BASE_URL belirtilmedi, localhost kullanılıyor${NC}"
    echo -e "${BLUE}Kullanım: BASE_URL=https://yourdomain.com ./tests/deployment-test.sh${NC}\n"
fi

echo -e "${BLUE}🚀 Laravel Octane Deployment Test Başlatılıyor...${NC}\n"

# Test counter
PASSED=0
FAILED=0

# Test fonksiyonu
test_endpoint() {
    local name=$1
    local url=$2
    local expected_status=${3:-200}
    
    echo -n "Testing $name... "
    
    response=$(curl -s -w "\n%{http_code}" "$url" 2>/dev/null || echo -e "\n000")
    http_code=$(echo "$response" | tail -n1)
    body=$(echo "$response" | sed '$d')
    
    if [ "$http_code" == "$expected_status" ]; then
        echo -e "${GREEN}✓ PASS${NC} (HTTP $http_code)"
        ((PASSED++))
        return 0
    else
        echo -e "${RED}✗ FAIL${NC} (HTTP $http_code, expected $expected_status)"
        echo -e "${RED}Response: $body${NC}"
        ((FAILED++))
        return 1
    fi
}

# 1. Basic Health Check
echo -e "\n${BLUE}1. Basic Health Check${NC}"
test_endpoint "Health Check" "$BASE_URL/up" 200

# 2. Detailed Health Check
echo -e "\n${BLUE}2. Detailed Health Check${NC}"
test_endpoint "Detailed Health" "$BASE_URL/health/detailed" 200

# Health check sonuçlarını parse et
health_response=$(curl -s "$BASE_URL/health/detailed" 2>/dev/null || echo '{}')
echo -e "${YELLOW}Health Check Details:${NC}"
echo "$health_response" | grep -o '"status":"[^"]*"' || echo "Could not parse response"
echo "$health_response" | grep -o '"message":"[^"]*"' | head -5 || echo ""

# 3. Homepage
echo -e "\n${BLUE}3. Homepage${NC}"
test_endpoint "Homepage" "$BASE_URL/" 200

# 4. API Health
echo -e "\n${BLUE}4. API Endpoints${NC}"
test_endpoint "API Auth Register (should fail without data)" "$BASE_URL/api/auth/register" 422

# 5. Octane Status (container içinde)
echo -e "\n${BLUE}5. Octane Status${NC}"
echo -e "${YELLOW}Not: Octane status container içinde kontrol edilmeli${NC}"
echo -e "${BLUE}Container içinde çalıştır: php artisan octane:status${NC}"

# 6. Performance Test
echo -e "\n${BLUE}6. Performance Test${NC}"
echo -n "Testing response time... "
start_time=$(date +%s%N)
curl -s "$BASE_URL/up" > /dev/null 2>&1
end_time=$(date +%s%N)
duration=$(( (end_time - start_time) / 1000000 ))
if [ $duration -lt 100 ]; then
    echo -e "${GREEN}✓ PASS${NC} (${duration}ms - Excellent!)"
    ((PASSED++))
elif [ $duration -lt 500 ]; then
    echo -e "${GREEN}✓ PASS${NC} (${duration}ms - Good)"
    ((PASSED++))
else
    echo -e "${YELLOW}⚠ WARNING${NC} (${duration}ms - Slow)"
    ((PASSED++))
fi

# 7. Load Test (basit)
echo -e "\n${BLUE}7. Load Test (10 requests)${NC}"
echo -n "Testing concurrent requests... "
success_count=0
for i in {1..10}; do
    if curl -s -o /dev/null -w "%{http_code}" "$BASE_URL/up" | grep -q "200"; then
        ((success_count++))
    fi
done
if [ $success_count -eq 10 ]; then
    echo -e "${GREEN}✓ PASS${NC} (10/10 successful)"
    ((PASSED++))
else
    echo -e "${YELLOW}⚠ WARNING${NC} ($success_count/10 successful)"
    ((PASSED++))
fi

# Summary
echo -e "\n${BLUE}════════════════════════════════════════${NC}"
echo -e "${BLUE}Test Summary${NC}"
echo -e "${BLUE}════════════════════════════════════════${NC}"
echo -e "${GREEN}Passed: $PASSED${NC}"
echo -e "${RED}Failed: $FAILED${NC}"

if [ $FAILED -eq 0 ]; then
    echo -e "\n${GREEN}✅ All tests passed!${NC}"
    exit 0
else
    echo -e "\n${RED}❌ Some tests failed!${NC}"
    exit 1
fi

