FROM php:8.2-fpm

# php.ini のコピー
COPY php.ini /usr/local/etc/php/

# 必要なパッケージのインストール
RUN apt update \
    && apt install -y default-mysql-client zlib1g-dev libzip-dev unzip \
    && docker-php-ext-install pdo_mysql zip

# Composer のインストール
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer self-update

# 作業ディレクトリの設定
WORKDIR /var/www
