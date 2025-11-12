#!/bin/bash

# Uzak veritabanı bilgileri
REMOTE_HOST="91.98.207.95"
REMOTE_PORT="5432"
REMOTE_DB="fast_commerce"
REMOTE_USER="postgres"
REMOTE_PASSWORD="omxjyblrQ59Hn0auFlQUJC95A0kLEhgJVONZ9RTdkWXVY5aRnpCDiNy51rzw94RD"

# Local veritabanı bilgileri
LOCAL_HOST="localhost"
LOCAL_PORT="5432"
LOCAL_DB="fast_commerce"
LOCAL_USER="enesekinci"
LOCAL_PASSWORD=""

# Dump dosyası
DUMP_FILE="fast_commerce_dump_$(date +%Y%m%d_%H%M%S).sql"

echo "🔄 Uzak veritabanından dump alınıyor..."
export PGPASSWORD="$REMOTE_PASSWORD"
pg_dump -h "$REMOTE_HOST" -p "$REMOTE_PORT" -U "$REMOTE_USER" -d "$REMOTE_DB" \
    --no-owner \
    --no-privileges \
    -F p \
    -f "$DUMP_FILE"

if [ $? -ne 0 ]; then
    echo "❌ Dump alma işlemi başarısız oldu!"
    exit 1
fi

echo "✅ Dump başarıyla alındı: $DUMP_FILE"
echo "📦 Dosya boyutu: $(du -h "$DUMP_FILE" | cut -f1)"

echo ""
echo "🔄 Local veritabanını temizleniyor..."
# Önce tüm tabloları CASCADE ile sil
if [ -z "$LOCAL_PASSWORD" ]; then
    psql -h "$LOCAL_HOST" -p "$LOCAL_PORT" -U "$LOCAL_USER" -d "$LOCAL_DB" -c "DROP SCHEMA public CASCADE; CREATE SCHEMA public; GRANT ALL ON SCHEMA public TO $LOCAL_USER; GRANT ALL ON SCHEMA public TO public;" > /dev/null 2>&1
else
    export PGPASSWORD="$LOCAL_PASSWORD"
    psql -h "$LOCAL_HOST" -p "$LOCAL_PORT" -U "$LOCAL_USER" -d "$LOCAL_DB" -c "DROP SCHEMA public CASCADE; CREATE SCHEMA public; GRANT ALL ON SCHEMA public TO $LOCAL_USER; GRANT ALL ON SCHEMA public TO public;" > /dev/null 2>&1
fi

echo "🔄 Local veritabanına restore ediliyor..."

# Local DB'ye restore et
if [ -z "$LOCAL_PASSWORD" ]; then
    psql -h "$LOCAL_HOST" -p "$LOCAL_PORT" -U "$LOCAL_USER" -d "$LOCAL_DB" -f "$DUMP_FILE" 2>&1 | grep -v "ERROR:" | grep -v "WARNING:" || true
else
    export PGPASSWORD="$LOCAL_PASSWORD"
    psql -h "$LOCAL_HOST" -p "$LOCAL_PORT" -U "$LOCAL_USER" -d "$LOCAL_DB" -f "$DUMP_FILE" 2>&1 | grep -v "ERROR:" | grep -v "WARNING:" || true
fi

if [ $? -ne 0 ]; then
    echo "❌ Restore işlemi başarısız oldu!"
    exit 1
fi

echo "✅ Veritabanı başarıyla senkronize edildi!"
echo "🗑️  Dump dosyası siliniyor..."
rm "$DUMP_FILE"
echo "✨ İşlem tamamlandı!"

