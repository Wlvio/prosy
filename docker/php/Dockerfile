FROM php:8.2-fpm

RUN apt-get update && \
  apt-get install -y htop nano vim procps net-tools && \
  rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN apt-get update && \
    apt-get install zip unzip && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y wget && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y libpq-dev libssl-dev && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd

# RUN docker-php-ext-install \
#     pdo \
#     pdo_mysql \
#     pdo_pgsql \
#     sockets \
#     bcmath \
#     fileinfo \
#     gettext \
#     pcntl
#    gmp

RUN apt-get update && \
    apt-get install -y git && \
    rm -rf /var/lib/apt/lists/*

# Xdebug
# RUN pecl install xdebug && \
#     rm -rf /tmp/pear

# # Xhprof
# RUN pecl install xhprof && \
#     rm -rf /tmp/pear

WORKDIR /var/www/project/current

# USER www-data
USER $USER

CMD php-fpm
