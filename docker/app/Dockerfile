FROM ubuntu:16.04

MAINTAINER Dutch <anhtuan3996@gmail.com>

RUN apt-get update \
    && apt-get install --no-install-recommends -y software-properties-common locales supervisor \
    && apt-get update \
    && locale-gen en_US.UTF-8

ENV LANG=en_US.UTF-8
ENV LANGUAGE=en_US:en
ENV LC_ALL=en_US.UTF-8

#path composer
ENV COMPOSER_HOME /composer
ENV PATH ./vendor/bin:/composer/vendor/bin:$PATH
ENV COMPOSER_ALLOW_SUPERUSER 1

RUN add-apt-repository ppa:nginx/stable \
    && add-apt-repository ppa:ondrej/php \
    && apt-get update \
    && apt-get install --no-install-recommends -y \
        nginx \
        php7.2-fpm \
        php7.2-cli \
        php7.2-xdebug \
        php7.2-pdo \
        php7.2-pdo-mysql \
        php7.2-pgsql \
        php7.2-sqlite3 \
        php7.2-xml \
        php7.2-mbstring \
        php7.2-tokenizer \
        php7.2-zip \
        php7.2-gd \
        php7.2-curl \
        curl \
    && mkdir /run/php \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && version=$(php -r "echo PHP_MAJOR_VERSION.PHP_MINOR_VERSION;") \
    && curl -A "Docker" -o /tmp/blackfire-probe.tar.gz -D - -L -s https://blackfire.io/api/v1/releases/probe/php/linux/amd64/$version \
    && tar zxpf /tmp/blackfire-probe.tar.gz -C /tmp \
    && mv /tmp/blackfire-*.so $(php -r "echo ini_get('extension_dir');")/blackfire.so \
    && printf "extension=blackfire.so\nblackfire.agent_socket=tcp://blackfire:8707\n" > /etc/php/7.2/mods-available/blackfire.ini \
    && phpenmod blackfire \
    && apt-get remove -y --purge software-properties-common curl \
    && apt-get clean \
    && apt-get autoremove -y \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY default /etc/nginx/sites-enabled/default
COPY php.ini /etc/php/7.2/fpm/php.ini
COPY php-fpm.conf /etc/php/7.2/fpm/php-fpm.conf
COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

COPY laravel.ini /etc/php/7.2/fpm/conf.d/laravel.ini
#COPY disabled-xdebug.ini /etc/php/7.2/mods-available/xdebug.ini
COPY enabled-xdebug.ini /etc/php/7.2/mods-available/xdebug.ini

RUN /etc/init.d/php7.2-fpm restart

# Install PHP_CodeSniffer
RUN composer global require "squizlabs/php_codesniffer=*"

RUN mkdir /tmp/certgen
WORKDIR /tmp/certgen
RUN openssl genrsa -des3 -passout pass:x -out server.pass.key 2048 \
    && openssl rsa -passin pass:x -in server.pass.key -out server.key \
    && rm server.pass.key \
    && openssl req -new -key server.key -out server.csr -subj "/CN=asgardcms.com" \
    && openssl x509 -req -days 365 -in server.csr -signkey server.key -out server.crt \
    && cp server.crt /etc/ssl/certs/ \
    && cp server.key /etc/ssl/private/ \
    && rm -rf /tmp/certgen

EXPOSE 80
EXPOSE 443

WORKDIR /var/www/html

CMD ["supervisord"]
