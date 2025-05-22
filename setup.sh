#!/bin/bash
composer install --working-dir=backend
php -d variables_order=EGPCS backend/artisan migrate --seed || true
npm install --prefix frontend-app
npm run build --prefix frontend-app
