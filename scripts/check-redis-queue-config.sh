#!/bin/bash

# ============================================================================
# Redis Queue Konfigürasyon Kontrol Scripti
# ============================================================================
# Bu script, Redis queue konfigürasyonunun güvenli olduğunu kontrol eder:
# - Eviction policy noeviction olmalı (job'lar uçmasın)
# - Persistence aktif olmalı (RDB + AOF)
# - Queue database'i doğru ayarlanmış olmalı
# ============================================================================

set -e

REDIS_HOST="${REDIS_HOST:-127.0.0.1}"
REDIS_PORT="${REDIS_PORT:-6379}"
REDIS_PASSWORD="${REDIS_PASSWORD:-}"
REDIS_QUEUE_DB="${REDIS_QUEUE_DB:-2}"

echo "🔍 Redis Queue Konfigürasyon Kontrolü"
echo "======================================"
echo ""

# Redis bağlantısı kontrolü
if ! command -v redis-cli &> /dev/null; then
    echo "❌ redis-cli bulunamadı"
    echo "💡 Kurulum: brew install redis (macOS) veya apt-get install redis-tools (Linux)"
    exit 1
fi

# Redis bağlantısı testi
REDIS_CMD="redis-cli -h $REDIS_HOST -p $REDIS_PORT"
if [ -n "$REDIS_PASSWORD" ]; then
    REDIS_CMD="$REDIS_CMD -a $REDIS_PASSWORD"
fi

if ! $REDIS_CMD ping &> /dev/null; then
    echo "❌ Redis'e bağlanılamıyor: $REDIS_HOST:$REDIS_PORT"
    exit 1
fi

echo "✅ Redis bağlantısı başarılı"
echo ""

# Queue database'ine geç
echo "📊 Queue Database (DB $REDIS_QUEUE_DB) Kontrolü:"
echo ""

# Eviction policy kontrolü
EVICTION_POLICY=$($REDIS_CMD CONFIG GET maxmemory-policy | tail -1)
echo "Eviction Policy: $EVICTION_POLICY"

if [ "$EVICTION_POLICY" = "noeviction" ]; then
    echo "✅ Eviction policy güvenli (noeviction)"
else
    echo "⚠️  UYARI: Eviction policy '$EVICTION_POLICY' - Job'lar uçabilir!"
    echo "💡 Düzeltme: $REDIS_CMD CONFIG SET maxmemory-policy noeviction"
fi
echo ""

# Memory limit kontrolü
MAXMEMORY=$($REDIS_CMD CONFIG GET maxmemory | tail -1)
if [ "$MAXMEMORY" = "0" ]; then
    echo "⚠️  UYARI: Memory limit ayarlanmamış (sınırsız)"
else
    echo "✅ Memory limit: $MAXMEMORY bytes ($(($MAXMEMORY / 1024 / 1024)) MB)"
fi
echo ""

# Memory kullanımı
MEMORY_INFO=$($REDIS_CMD INFO memory | grep used_memory_human | cut -d: -f2 | tr -d '\r')
echo "Kullanılan Memory: $MEMORY_INFO"
echo ""

# Persistence kontrolü
echo "📦 Persistence Kontrolü:"
echo ""

# RDB kontrolü
SAVE_CONFIG=$($REDIS_CMD CONFIG GET save | tail -1)
if [ -n "$SAVE_CONFIG" ] && [ "$SAVE_CONFIG" != "" ]; then
    echo "✅ RDB aktif: $SAVE_CONFIG"
else
    echo "⚠️  UYARI: RDB snapshot ayarları yok"
fi

# AOF kontrolü
AOF_ENABLED=$($REDIS_CMD CONFIG GET appendonly | tail -1)
if [ "$AOF_ENABLED" = "yes" ]; then
    echo "✅ AOF aktif (appendonly: yes)"
    
    AOF_SYNC=$($REDIS_CMD CONFIG GET appendfsync | tail -1)
    echo "   AOF sync: $AOF_SYNC"
else
    echo "⚠️  UYARI: AOF aktif değil - Restart sonrası job kaybı olabilir!"
    echo "💡 Düzeltme: $REDIS_CMD CONFIG SET appendonly yes"
fi
echo ""

# Queue database key sayısı
$REDIS_CMD SELECT $REDIS_QUEUE_DB &> /dev/null
KEY_COUNT=$($REDIS_CMD DBSIZE)
echo "📊 Queue Database (DB $REDIS_QUEUE_DB) Key Sayısı: $KEY_COUNT"
echo ""

# Özet
echo "======================================"
echo "📋 Özet:"
echo ""

IS_SAFE=true

if [ "$EVICTION_POLICY" != "noeviction" ]; then
    echo "❌ Eviction policy güvenli değil"
    IS_SAFE=false
fi

if [ "$AOF_ENABLED" != "yes" ]; then
    echo "❌ AOF aktif değil"
    IS_SAFE=false
fi

if [ "$IS_SAFE" = true ]; then
    echo "✅ Redis queue konfigürasyonu güvenli!"
    exit 0
else
    echo "⚠️  Redis queue konfigürasyonu güvenli değil - yukarıdaki uyarıları düzeltin"
    exit 1
fi

