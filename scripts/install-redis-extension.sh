#!/bin/bash

# ============================================================================
# Redis PHP Extension Kurulum Scripti
# ============================================================================
# Bu script, phpredis extension'ını kurar (local development için)
# macOS ve Linux için otomatik tespit yapar
# ============================================================================

set -e

echo "🔍 Redis PHP extension kontrol ediliyor..."

# PHP versiyonunu al
PHP_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
echo "📦 PHP Version: $PHP_VERSION"

# Valet PHP'sini kontrol et (eğer varsa)
VALET_PHP=""
if command -v valet &> /dev/null; then
    VALET_PHP=$(valet which-php 2>/dev/null || echo "")
fi

# Extension kontrolü - hem CLI hem Valet PHP için
CLI_HAS_REDIS=false
VALET_HAS_REDIS=false

if php -m | grep -qi redis; then
    CLI_HAS_REDIS=true
    echo "✅ CLI PHP'de Redis extension kurulu"
fi

if [ -n "$VALET_PHP" ] && [ "$VALET_PHP" != "$(which php)" ]; then
    if "$VALET_PHP" -m 2>/dev/null | grep -qi redis; then
        VALET_HAS_REDIS=true
        echo "✅ Valet PHP'de Redis extension kurulu"
    else
        echo "⚠️  Valet PHP'de Redis extension YOK: $VALET_PHP"
    fi
fi

# Her ikisi de kuruluysa çık
if [ "$CLI_HAS_REDIS" = true ] && ([ -z "$VALET_PHP" ] || [ "$VALET_HAS_REDIS" = true ]); then
    echo "✅ Tüm PHP versiyonlarında Redis extension kurulu!"
    exit 0
fi

echo "📥 Redis extension kuruluyor..."

# OS tespiti
if [[ "$OSTYPE" == "darwin"* ]]; then
    # macOS
    echo "🍎 macOS tespit edildi"
    
    # Homebrew ile kurulum
    if command -v brew &> /dev/null; then
        # shivammathur/extensions tap'ini ekle (gerekirse)
        if ! brew tap | grep -q "shivammathur/extensions"; then
            echo "📦 Homebrew tap ekleniyor: shivammathur/extensions"
            brew tap shivammathur/extensions
        fi
        
        # Valet PHP versiyonunu tespit et
        if [ -n "$VALET_PHP" ]; then
            VALET_VERSION=$("$VALET_PHP" -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;" 2>/dev/null || echo "")
            if [ -n "$VALET_VERSION" ]; then
                echo "📦 Valet PHP $VALET_VERSION için Redis extension kuruluyor..."
                brew install "shivammathur/extensions/phpredis@${VALET_VERSION}" || {
                    echo "⚠️  shivammathur/extensions başarısız, standart paket deneniyor..."
                    brew install "php@${VALET_VERSION}-redis" 2>/dev/null || brew install php-redis
                }
            fi
        fi
        
        # CLI PHP için de kur (eğer farklıysa)
        CLI_VERSION=$(php -r "echo PHP_MAJOR_VERSION.'.'.PHP_MINOR_VERSION;")
        if [ "$CLI_VERSION" != "$VALET_VERSION" ]; then
            echo "📦 CLI PHP $CLI_VERSION için Redis extension kuruluyor..."
            brew install "shivammathur/extensions/phpredis@${CLI_VERSION}" || {
                echo "⚠️  shivammathur/extensions başarısız, standart paket deneniyor..."
                brew install "php@${CLI_VERSION}-redis" 2>/dev/null || brew install php-redis
            }
        fi
        
        # PECL ile kurulum (son çare)
        if [ $? -ne 0 ]; then
            echo "⚠️  Homebrew başarısız, PECL deneniyor..."
            pecl install redis
        fi
    else
        echo "📦 PECL ile kuruluyor..."
        pecl install redis
    fi
    
elif [[ "$OSTYPE" == "linux-gnu"* ]]; then
    # Linux
    echo "🐧 Linux tespit edildi"
    
    # Ubuntu/Debian
    if command -v apt-get &> /dev/null; then
        echo "📦 apt-get ile kuruluyor..."
        sudo apt-get update
        sudo apt-get install -y php${PHP_VERSION}-redis
        
    # CentOS/RHEL
    elif command -v yum &> /dev/null; then
        echo "📦 yum ile kuruluyor..."
        sudo yum install -y php-redis
        
    # PECL (fallback)
    else
        echo "📦 PECL ile kuruluyor..."
        pecl install redis
    fi
else
    echo "❌ Desteklenmeyen işletim sistemi: $OSTYPE"
    echo "💡 Manuel kurulum için: pecl install redis"
    exit 1
fi

# php.ini'ye extension ekle
if [ -f "/etc/php/$PHP_VERSION/cli/php.ini" ]; then
    # Linux
    PHP_INI="/etc/php/$PHP_VERSION/cli/php.ini"
elif [ -f "/usr/local/etc/php/$PHP_VERSION/php.ini" ]; then
    # macOS (Homebrew)
    PHP_INI="/usr/local/etc/php/$PHP_VERSION/php.ini"
else
    # php.ini bulunamadı, php --ini ile bul
    PHP_INI=$(php --ini | grep "Loaded Configuration File" | awk '{print $4}')
fi

if [ -f "$PHP_INI" ]; then
    if ! grep -q "extension=redis" "$PHP_INI"; then
        echo "📝 php.ini'ye extension ekleniyor: $PHP_INI"
        echo "extension=redis" >> "$PHP_INI"
    fi
else
    echo "⚠️  php.ini bulunamadı, manuel olarak ekleyin: extension=redis"
fi

# Kontrol
CLI_OK=false
VALET_OK=false

if php -m | grep -qi redis; then
    CLI_OK=true
    echo "✅ CLI PHP'de Redis extension kuruldu!"
fi

if [ -n "$VALET_PHP" ] && "$VALET_PHP" -m 2>/dev/null | grep -qi redis; then
    VALET_OK=true
    echo "✅ Valet PHP'de Redis extension kuruldu!"
    echo "🔄 Valet'i yeniden başlatıyorum..."
    valet restart 2>/dev/null || echo "⚠️  Valet restart edilemedi, manuel olarak: valet restart"
fi

if [ "$CLI_OK" = true ] && ([ -z "$VALET_PHP" ] || [ "$VALET_OK" = true ]); then
    echo "✅ Redis extension başarıyla kuruldu!"
else
    echo "❌ Redis extension kurulumu tamamlanamadı"
    echo "💡 Manuel kurulum için: brew install php@8.5-redis"
    exit 1
fi

