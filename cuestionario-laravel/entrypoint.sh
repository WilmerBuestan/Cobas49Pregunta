#!/bin/sh

echo "🔄 Ejecutando migraciones en Supabase..."
php artisan migrate --force || { echo "❌ Error al ejecutar migraciones"; exit 1; }

echo "✅ Migraciones completadas. Iniciando Laravel..."
exec php artisan serve --host=0.0.0.0 --port=8080
