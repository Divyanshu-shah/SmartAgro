#!/usr/bin/env bash
set -e

composer install --no-interaction --prefer-dist --no-progress --optimize-autoloader --no-dev
npm install
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
