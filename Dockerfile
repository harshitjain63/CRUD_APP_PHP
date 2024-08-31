# Use the official PHP image with Apache
FROM php:8.1-apache

# Install necessary PHP extensions and tools (e.g., MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql && \
    docker-php-ext-enable mysqli

RUN echo "ServerName 206.1.53.92" >> /etc/apache2/apache2.conf

# Set working directory inside the container
WORKDIR /var/www/html

# Copy all files from the current directory to the container's web directory
COPY . /var/www/html/

# Set the necessary permissions
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 to the outside world
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
