#!/bin/bash

echo "========================================="
echo "🚀 Starting Production Optimization..."
echo "========================================="

# Membersihkan cache lama yang mungkin tersisa
echo "1. Clearing old caches..."
php artisan optimize:clear

# Melakukan caching konfigurasi (Sangat penting di Production)
echo "2. Caching configurations..."
php artisan config:cache

# Melakukan caching route (Mempercepat waktu load routing)
echo "3. Caching routes..."
php artisan route:cache

# Melakukan caching file Blade (Mempercepat render HTML)
echo "4. Caching views..."
php artisan view:cache

# Melakukan caching event dan listener
echo "5. Caching events..."
php artisan event:cache

# Melakukan caching khusus untuk Filament & Blade Icons
echo "6. Caching Filament & Icons..."
php artisan filament:cache-components
php artisan icons:cache

echo "========================================="
echo "✅ Optimization Complete! Starting server..."
echo "========================================="

# Meneruskan perintah utama (Start Apache)
exec apache2-foreground
