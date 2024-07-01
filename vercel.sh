#!/bin/bash

# Debugging lines
echo "Installing Composer"
curl -sS https://getcomposer.org/installer | php
php composer.phar install --no-dev --optimize-autoloader

# Debugging lines
echo "Running NPM Install"
npm install

# Install Laravel Mix globally
npm install -g laravel-mix

# Debugging lines
echo "Building assets"
npm run production

# Moving built assets
echo "Moving built assets"
cp -r public/* /vercel/path0/public

# Copying other necessary files
echo "Copying .env and vendor"
cp .env /vercel/path0/.env
cp -r vendor /vercel/path0/vendor
