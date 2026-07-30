#!/bin/sh
set -e

echo "=== Clearing config ==="
php artisan config:clear

echo "=== Running migrations ==="
php artisan migrate --force

echo "=== Storage link ==="
php artisan storage:link --force

echo "=== Starting server on port ${PORT:-10000} ==="
php artisan serve --host=0.0.0.0 --port=${PORT:-10000}
