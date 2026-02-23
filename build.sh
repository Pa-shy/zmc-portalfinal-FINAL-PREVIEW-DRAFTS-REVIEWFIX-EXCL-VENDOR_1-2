#!/bin/bash
set -e

echo "==> Creating storage directories..."
mkdir -p storage/framework/sessions
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/views
mkdir -p storage/logs

echo "==> Running migrations..."
php artisan migrate --force 2>&1 || echo "Migration skipped (DB may not be available during build)"

echo "==> Seeding database..."
php artisan db:seed --force 2>&1 || echo "Seeding skipped"

echo "==> Caching routes..."
php artisan route:cache

echo "==> Caching views..."
php artisan view:cache

echo "==> Clearing config cache..."
php artisan config:clear

echo "==> Build complete!"
