# Use an official PHP runtime as a parent image
FROM php:7.4-cli

# Install dependencies
RUN apt-get update && apt-get install -y libssl1.0.0 libssl-dev unzip

# Set the working directory
WORKDIR /app

# Copy the current directory contents into the container at /app
COPY . /app

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-dev --prefer-dist --optimize-autoloader

# Command to run the Laravel application
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=80"]
