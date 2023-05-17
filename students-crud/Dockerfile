FROM ubuntu:22.04

LABEL maintainer="Taylor Otwell"

ARG WWWGROUP=1000
ARG NODE_VERSION=16
ARG POSTGRES_VERSION=14

WORKDIR /var/www/html

ENV DEBIAN_FRONTEND noninteractive
ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update \
    && apt-get install software-properties-common -y \
    && add-apt-repository ppa:ondrej/php \
    && apt-get install -y gnupg gosu curl ca-certificates zip unzip git supervisor sqlite3 libcap2-bin libpng-dev python2 \
    && apt-get install -y nginx php8.1-fpm gettext \
    && mkdir -p ~/.gnupg \
    && chmod 600 ~/.gnupg \
    && echo "disable-ipv6" >> ~/.gnupg/dirmngr.conf \
    && apt-key adv --homedir ~/.gnupg --keyserver hkps://keyserver.ubuntu.com --recv-keys 0x14AA40EC0831756756D7F66C4F4EA0AAE5267A6C \
    && echo "deb https://ppa.launchpadcontent.net/ondrej/php/ubuntu impish main" > /etc/apt/sources.list.d/ppa_ondrej_php.list \
    && apt-get update \
    && apt-get install -y php8.1-cli php8.1-dev \
       php8.1-pgsql php8.1-sqlite3 php8.1-gd \
       php8.1-curl \
       php8.1-imap php8.1-mysql php8.1-mbstring \
       php8.1-xml php8.1-zip php8.1-bcmath php8.1-soap \
       php8.1-intl php8.1-readline \
       php8.1-ldap \
       php8.1-msgpack php8.1-igbinary php8.1-redis php8.1-swoole \
       php8.1-memcached php8.1-pcov php8.1-xdebug \
    && php -r "readfile('https://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && curl -sL https://deb.nodesource.com/setup_$NODE_VERSION.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" > /etc/apt/sources.list.d/yarn.list \
    && echo "deb http://apt.postgresql.org/pub/repos/apt jammy-pgdg main" > /etc/apt/sources.list.d/pgdg.list \
    && curl --silent -o - https://www.postgresql.org/media/keys/ACCC4CF8.asc | apt-key add - \
    && apt-get update \
    && apt-get install -y yarn \
    && apt-get install -y mysql-client \
    && apt-get install -y postgresql-client \
    && apt-get -y autoremove \
    && apt-get clean \
    && apt-get install -y wget \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* 

RUN apt-get update && apt-get install -y \
    git \
    libc6-dev \
    libsasl2-dev \
    libsasl2-modules \
    libssl-dev \
    sudo

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install
RUN setcap "cap_net_bind_service=+ep" /usr/bin/php8.1

RUN groupadd --force -g $WWWGROUP sail
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 sail

COPY docker/8.1/start-container /usr/local/bin/start-container
COPY docker/8.1/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/8.1/php.ini /etc/php/8.1/cli/conf.d/99-sail.ini
# COPY docker/8.1/nginx.conf /etc/nginx/conf.d/nginx.conf
RUN chmod +x /usr/local/bin/start-container
RUN chmod -R 777 /var
# RUN touch /var/log/php8.1-fpm.log
# RUN chmod -R 777 /var/log/php8.1-fpm.log
# RUN mkdir -p /run/php
# RUN chmod -R 777 /run/php
# RUN sed -i "s/listen = \/run\/php\/php8.1-fpm.sock.*/listen = 127.0.0.1:9000/g" /etc/php/8.1/fpm/pool.d/www.conf

RUN composer require laravel/sail --dev
RUN php artisan sail:install
RUN ./vendor/bin/sail up


EXPOSE 8000
EXPOSE 9000

ENTRYPOINT ["start-container"]
