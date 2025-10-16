FROM richarvey/nginx-php-fpm:latest

COPY . /var/www/html

ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV REAL_IP_HEADER 1

ENV APP_ENV production
ENV APP_DEBUG false
ENV LOG_CHANNEL stderr
ENV COMPOSER_ALLOW_SUPERUSER 1

COPY config/nginx.conf /etc/nginx/sites-available/default.conf
COPY scripts/00-laravel-deploy.sh /usr/local/bin/00-laravel-deploy.sh
RUN chmod +x /usr/local/bin/00-laravel-deploy.sh

CMD ["/start.sh"]
