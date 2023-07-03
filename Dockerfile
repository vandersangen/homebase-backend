FROM php:8.2-fpm as dev

# Install dependencies
RUN apt update && \
    apt upgrade -y && \
    apt install -y \
    apt-transport-https \
    apt-utils \
    build-essential \
    ca-certificates \
    curl \
    dialog \
    dirmngr \
    file \
    git \
    iputils-ping \
    libgmp-dev \
    libicu-dev \
    libmhash-dev \
    libpng-dev \
    libxml2-dev \
    libsodium-dev \
    libzip-dev \
    libonig-dev \
    locales \
    lsb-release \
    openssl \
    procps \
    re2c \
    supervisor \
    unixodbc-dev \
    unzip \
    vim \
    wget \
    zip && \
    apt clean && \
    rm -rf /var/lib/apt/lists/*

# Install and configurate PHP extensions
RUN docker-php-ext-install pdo_mysql mysqli \
      opcache
#RUN docker-php-ext-install phar # needs openssl
#RUN docker-php-ext-install xml-reader
#RUN docker-php-ext-install xml-writer
#RUN docker-php-ext-install curl
#RUN docker-php-ext-install file_info
#RUN docker-php-ext-install zlib # phpize

# Add Redis (latest)
RUN pecl install redis \
    && docker-php-ext-enable redis

# Install compose & packages
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add app user
RUN adduser -u 1001 app \
    && mkdir -p /app /home/app/.composer \
    && chown app /app /home/app/.composer\
    && usermod -a -G www-data app

## Make sure you can run supervisord locally
RUN mkdir -p /var/log/supervisor
RUN ln -s /usr/local/bin/php /usr/bin/php8.2

# Switch to use a non-root user from here on
USER app

# Set working directory
WORKDIR /var/www/homebase-backend

# Setup document root
RUN mkdir -p /var/www/homebase-backend \
    && chmod -R 774 /var/www/homebase-backend \
    && chown app:app /var/www/homebase-backend

COPY --chown=app:app ./ ./

RUN composer install --no-ansi --no-dev \
    --no-interaction --optimize-autoloader --no-scripts

# Expose the port nginx is reachable on
EXPOSE 8080

# Configure a healthcheck to validate that everything is up&running
#HEALTHCHECK --timeout=10s CMD curl --silent --fail http://127.0.0.1:8080/fpm-ping # TODO: move to docker-compose.yml
