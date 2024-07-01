#!/bin/sh
# Update this script according to the needs of your Laravel app

# Install dependencies
npm install
# Make sure webpack is available
npm install webpack --save-dev

# Run Laravel Mix
npm run prod

# Copy necessary files
cp .env.example .env
php artisan key:generate
