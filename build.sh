#!/bin/bash
set -e

echo "==> Creating storage directories..."
mkdir -p storage/framework/sessions
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/views
mkdir -p storage/logs

echo "==> Running migrations..."
php artisan migrate --force 2>&1 || echo "Migration warning (continuing...)"

echo "==> Fixing database constraints..."
php artisan db:fix-constraints 2>&1 || echo "Constraint fix warning (continuing...)"

echo "==> Seeding database..."
php artisan db:seed --force 2>&1 || echo "Seeding skipped"

echo "==> Creating storage link..."
php artisan storage:link 2>&1 || true

echo "==> Clearing caches..."
php artisan route:clear
php artisan view:clear
php artisan config:clear
php artisan cache:clear 2>&1 || true

echo "==> Build complete!"
