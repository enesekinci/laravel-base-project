#!/bin/bash

# Laravel Octane (FrankenPHP) Stress Test Script
# Bu script projeyi stres testine sokar ve performans metriklerini ölçer

set -e

# Renkler
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# URL (environment variable'dan al veya default kullan)
BASE_URL="${BASE_URL:-https://laravel.enesekinci.com}"

echo -e "${BLUE}╔══════════════════════════════════════════════════════════════╗${NC}"
echo -e "${BLUE}║     Laravel Octane (FrankenPHP) Stress Test Tool           ║${NC}"
echo -e "${BLUE}╚══════════════════════════════════════════════════════════════╝${NC}\n"

echo -e "${CYAN}Target URL: ${BASE_URL}${NC}\n"

# Test parametreleri
TOTAL_REQUESTS="${TOTAL_REQUESTS:-1000}"
CONCURRENT_USERS="${CONCURRENT_USERS:-50}"
TEST_DURATION="${TEST_DURATION:-30}"

echo -e "${YELLOW}Test Parametreleri:${NC}"
echo -e "  - Total Requests: ${TOTAL_REQUESTS}"
echo -e "  - Concurrent Users: ${CONCURRENT_USERS}"
echo -e "  - Test Duration: ${TEST_DURATION}s\n"

# Araç kontrolü
check_tool() {
    local tool=$1
    if ! command -v $tool &> /dev/null; then
        echo -e "${RED}❌ $tool bulunamadı!${NC}"
        return 1
    fi
    return 0
}

# 1. Apache Bench (ab) Test
run_ab_test() {
    if ! check_tool ab; then
        echo -e "${YELLOW}Apache Bench yüklü değil. Yüklemek için:${NC}"
        echo -e "  macOS: brew install httpd"
        echo -e "  Ubuntu: sudo apt-get install apache2-utils\n"
        return 1
    fi

    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}1. Apache Bench (ab) Test${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

    ab -n $TOTAL_REQUESTS -c $CONCURRENT_USERS -k -g /tmp/ab_results.tsv "$BASE_URL/up" 2>&1 | tee /tmp/ab_output.txt

    echo -e "\n${GREEN}Apache Bench Sonuçları:${NC}"
    grep -E "Requests per second|Time per request|Transfer rate|Failed requests" /tmp/ab_output.txt || echo "Sonuçlar parse edilemedi"
}

# 2. wrk Test (daha detaylı)
run_wrk_test() {
    if ! check_tool wrk; then
        echo -e "${YELLOW}wrk yüklü değil. Yüklemek için:${NC}"
        echo -e "  macOS: brew install wrk"
        echo -e "  Ubuntu: sudo apt-get install wrk\n"
        return 1
    fi

    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}2. wrk Test (Detaylı)${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

    wrk -t4 -c$CONCURRENT_USERS -d${TEST_DURATION}s --latency "$BASE_URL/up"
}

# 3. Basit Load Test (curl ile)
run_simple_load_test() {
    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}3. Basit Load Test (curl)${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

    echo -e "${YELLOW}10 eşzamanlı request gönderiliyor...${NC}"
    
    success=0
    failed=0
    total_time=0
    
    for i in {1..10}; do
        start=$(date +%s%N)
        if curl -s -o /dev/null -w "%{http_code}" "$BASE_URL/up" | grep -q "200"; then
            ((success++))
        else
            ((failed++))
        fi
        end=$(date +%s%N)
        duration=$(( (end - start) / 1000000 ))
        total_time=$((total_time + duration))
    done
    
    avg_time=$((total_time / 10))
    
    echo -e "${GREEN}Başarılı: ${success}/10${NC}"
    echo -e "${RED}Başarısız: ${failed}/10${NC}"
    echo -e "${CYAN}Ortalama Response Time: ${avg_time}ms${NC}"
}

# 4. Health Check Test
test_health_endpoint() {
    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}4. Health Check Test${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

    response=$(curl -s "$BASE_URL/health/detailed" 2>/dev/null || echo '{}')
    
    echo -e "${CYAN}Health Check Response:${NC}"
    echo "$response" | grep -o '"status":"[^"]*"' || echo "Status bulunamadı"
    echo ""
    
    # Database, Redis, Queue durumlarını göster
    echo "$response" | grep -o '"database":{[^}]*}' | head -1 || echo ""
    echo "$response" | grep -o '"redis":{[^}]*}' | head -1 || echo ""
    echo "$response" | grep -o '"queue":{[^}]*}' | head -1 || echo ""
}

# 5. Response Time Distribution
test_response_times() {
    echo -e "\n${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}"
    echo -e "${BLUE}5. Response Time Distribution (20 request)${NC}"
    echo -e "${BLUE}━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━${NC}\n"

    times=()
    for i in {1..20}; do
        start=$(date +%s%N)
        curl -s -o /dev/null "$BASE_URL/up" 2>/dev/null
        end=$(date +%s%N)
        duration=$(( (end - start) / 1000000 ))
        times+=($duration)
    done

    # Sırala ve istatistikleri hesapla
    IFS=$'\n' sorted=($(sort -n <<<"${times[*]}"))
    unset IFS

    min=${sorted[0]}
    max=${sorted[19]}
    median=${sorted[9]}
    
    # Ortalama hesapla
    sum=0
    for t in "${times[@]}"; do
        sum=$((sum + t))
    done
    avg=$((sum / 20))

    echo -e "${GREEN}Min: ${min}ms${NC}"
    echo -e "${GREEN}Max: ${max}ms${NC}"
    echo -e "${GREEN}Avg: ${avg}ms${NC}"
    echo -e "${GREEN}Median: ${median}ms${NC}"
}

# Ana test akışı
main() {
    # Health check önce
    test_health_endpoint
    
    # Response time testi
    test_response_times
    
    # Basit load test
    run_simple_load_test
    
    # Apache Bench (varsa)
    if check_tool ab; then
        run_ab_test
    fi
    
    # wrk (varsa)
    if check_tool wrk; then
        run_wrk_test
    fi
    
    echo -e "\n${BLUE}╔══════════════════════════════════════════════════════════════╗${NC}"
    echo -e "${BLUE}║                    Test Tamamlandı                           ║${NC}"
    echo -e "${BLUE}╚══════════════════════════════════════════════════════════════╝${NC}\n"
    
    echo -e "${CYAN}Not: Daha detaylı test için:${NC}"
    echo -e "  BASE_URL=$BASE_URL TOTAL_REQUESTS=5000 CONCURRENT_USERS=100 ./tests/stress-test.sh"
}

# Script çalıştır
main

