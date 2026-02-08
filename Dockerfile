FROM php:8.3-fpm
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    git zip unzip libpq-dev supervisor curl \
    && docker-php-ext-install pdo pdo_pgsql

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer update --no-dev

RUN rm -f public/storage && php artisan storage:link

RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 777 /var/www/html/public \
    && chmod -R 777 /var/www/html/bootstrap/cache \
    && chmod -R 777 /var/www/html/storage

COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

RUN curl -o /usr/local/bin/wait-for-it.sh https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh \
    && chmod +x /usr/local/bin/wait-for-it.sh

CMD ["supervisord", "-n"]
