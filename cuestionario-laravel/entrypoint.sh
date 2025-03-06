#!/bin/sh

echo "🔄 Ejecutando migraciones en Supabase..."
php artisan migrate --force

echo "✅ Migraciones completadas. Iniciando Laravel..."
exec "$@"
