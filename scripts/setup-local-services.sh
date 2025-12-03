#!/bin/bash

# ============================================================================
# Local Development Services Setup Script (macOS)
# ============================================================================
# Bu script, local development için gerekli servisleri (PostgreSQL, Redis, Meilisearch)
# macOS'ta Homebrew kullanarak kurar ve başlatır.
# ============================================================================

set -e

# Renkler
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

# Fonksiyonlar
print_success() {
    echo -e "${GREEN}✓${NC} $1"
}

print_error() {
    echo -e "${RED}✗${NC} $1"
}

print_info() {
    echo -e "${BLUE}ℹ${NC} $1"
}

print_warning() {
    echo -e "${YELLOW}⚠${NC} $1"
}

# Homebrew kontrolü
if ! command -v brew &> /dev/null; then
    print_error "Homebrew bulunamadı. Lütfen önce Homebrew'i kurun:"
    echo "  /bin/bash -c \"\$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)\""
    exit 1
fi

print_success "Homebrew bulundu"

echo ""
print_info "Local development servisleri kuruluyor..."
echo ""

# PostgreSQL Kurulumu
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
print_info "PostgreSQL kurulumu kontrol ediliyor..."

if brew list postgresql@16 &> /dev/null || brew list postgresql &> /dev/null; then
    print_success "PostgreSQL zaten kurulu"
else
    print_info "PostgreSQL kuruluyor..."
    brew install postgresql@16
    
    # PostgreSQL'i başlat
    brew services start postgresql@16
    
    print_success "PostgreSQL kuruldu ve başlatıldı"
    print_info "PostgreSQL varsayılan port: 5432"
    print_info "Veritabanı oluşturmak için: createdb laravel"
fi

# Redis Kurulumu
echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
print_info "Redis kurulumu kontrol ediliyor..."

if brew list redis &> /dev/null; then
    print_success "Redis zaten kurulu"
else
    print_info "Redis kuruluyor..."
    brew install redis
    
    # Redis'i başlat
    brew services start redis
    
    print_success "Redis kuruldu ve başlatıldı"
    print_info "Redis varsayılan port: 6379"
fi

# Meilisearch Kurulumu
echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
print_info "Meilisearch kurulumu kontrol ediliyor..."

if brew list meilisearch &> /dev/null; then
    print_success "Meilisearch zaten kurulu"
else
    print_info "Meilisearch kuruluyor..."
    brew tap getmeili/homebrew-meilisearch
    brew install meilisearch
    
    print_success "Meilisearch kuruldu"
    print_warning "Meilisearch'i manuel olarak başlatmanız gerekiyor:"
    print_info "  meilisearch --master-key=\"your_master_key_here\""
    print_info "  veya"
    print_info "  brew services start meilisearch"
    print_info "Meilisearch varsayılan port: 7700"
fi

# Servis Durumları
echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
print_info "Servis durumları kontrol ediliyor..."
echo ""

# PostgreSQL durumu
if brew services list | grep -q "postgresql.*started"; then
    print_success "PostgreSQL çalışıyor"
else
    print_warning "PostgreSQL çalışmıyor. Başlatmak için: brew services start postgresql@16"
fi

# Redis durumu
if brew services list | grep -q "redis.*started"; then
    print_success "Redis çalışıyor"
else
    print_warning "Redis çalışmıyor. Başlatmak için: brew services start redis"
fi

# Meilisearch durumu
if pgrep -x "meilisearch" > /dev/null; then
    print_success "Meilisearch çalışıyor"
else
    print_warning "Meilisearch çalışmıyor. Başlatmak için: meilisearch --master-key=\"your_master_key\""
fi

echo ""
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━"
print_success "Kurulum tamamlandı!"
echo ""
print_info "Sonraki adımlar:"
echo ""
echo "1. .env dosyasını oluşturun:"
echo "   cp .env.example .env"
echo ""
echo "2. .env dosyasında şu ayarları yapın:"
echo "   DB_CONNECTION=pgsql"
echo "   DB_HOST=127.0.0.1"
echo "   DB_PORT=5432"
echo "   DB_DATABASE=laravel"
echo "   DB_USERNAME=$(whoami)"
echo "   DB_PASSWORD="
echo ""
echo "   REDIS_HOST=127.0.0.1"
echo "   REDIS_PORT=6379"
echo ""
echo "   MEILISEARCH_HOST=http://127.0.0.1:7700"
echo "   MEILISEARCH_KEY=your_master_key_here"
echo ""
echo "3. Veritabanını oluşturun:"
echo "   createdb laravel"
echo ""
echo "4. Migration'ları çalıştırın:"
echo "   php artisan migrate"
echo ""
echo "5. Meilisearch index'lerini ayarlayın:"
echo "   php artisan meilisearch:setup-products"
echo "   php artisan scout:import \"App\\Models\\Product\""
echo ""

