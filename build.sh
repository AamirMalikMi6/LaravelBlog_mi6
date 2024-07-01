#!/bin/bash

# Install Composer and dependencies
composer install --optimize-autoloader --no-dev

# Run Laravel commands
php artisan config:cache
php artisan route:cache
php artisan view:cache
