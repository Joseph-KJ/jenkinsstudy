FROM php:8.0-apache
RUN docker-php-ext-install mysqli
COPY index.php /var/www/html/
EXPOSE 8081
CMD ["apache2-foreground"]

