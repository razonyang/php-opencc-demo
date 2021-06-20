FROM yiisoftware/yii2-php:8.0-apache

RUN apt update

RUN apt install -y git libopencc-dev

RUN git clone https://github.com/NauxLiu/opencc4php --depth 1 /tmp/opencc4php && \
    cd /tmp/opencc4php && phpize && ./configure && make && make install && docker-php-ext-enable opencc

ENV APACHE_DOCUMENT_ROOT /app/public

RUN sed -ri -e 's!/app/web!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf

COPY --chown=www-data:www-data . /app

RUN composer install --prefer-dist --no-dev --optimize-autoloader

RUN chown -R www-data:www-data /app/runtime
