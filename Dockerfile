FROM registry.gitlab.com/cloudyfox/devops/generic-docker-images/runtime/php7.2-apache-stretch

WORKDIR /var/www/html

COPY composer.json ./

COPY .env.example .env

COPY database ./database

RUN composer install --prefer-dist --no-ansi --no-interaction --no-progress --no-scripts --no-plugins --no-suggest --optimize-autoloader

COPY . .

RUN chown -R www-data:www-data /var/www