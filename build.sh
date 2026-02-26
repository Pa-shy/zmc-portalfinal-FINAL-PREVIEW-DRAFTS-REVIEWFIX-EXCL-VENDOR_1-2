#!/bin/bash
set -e

echo "==> Creating storage directories..."
mkdir -p storage/framework/sessions
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/views
mkdir -p storage/logs

echo "==> Running idempotent deploy migration..."
php artisan db:deploy-migrate 2>&1

echo "==> Seeding database..."
php artisan db:seed --force 2>&1 || echo "Seeding skipped"

echo "==> Creating storage link..."
php artisan storage:link 2>&1 || true

echo "==> Caching for production..."
php artisan config:cache 2>&1 || true
php artisan route:cache 2>&1 || echo "Route caching skipped"
php artisan view:cache 2>&1 || true

echo "==> Build complete!"
