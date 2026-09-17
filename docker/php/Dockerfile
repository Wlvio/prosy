# Используем базовый образ PHP 8.2-fpm
FROM php:8.2-fpm-bookworm

# Установите необходимые системные зависимости
RUN apt-get update && \
    apt-get install -y apt-transport-https ca-certificates && \
    
# Добавьте репозиторий с корректными ключами
RUN echo "deb [arch=amd64] https://deb.debian.org/debian bookworm main" > /etc/apt/sources.list.d/bookworm.list && \
    echo "deb [arch=amd64] https://deb.debian.org/debian-security/ bookworm-security main" >> /etc/apt/sources.list.d/bookworm-security.list

# Добавьте ключ репозитория
RUN apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0x112ABCDEF && \
    apt-key adv --keyserver keyserver.ubuntu.com --recv-keys 0x12345678

# Обновите систему и установите необходимые пакеты
RUN apt-get update && \
    apt-get install -y htop nano vim procps net-tools && \
    rm -rf /var/lib/apt/lists/*

# Установите Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Установите дополнительные зависимости
RUN apt-get update && \
    apt-get install -y zip unzip wget libpq-dev libssl-dev && \
    rm -rf /var/lib/apt/lists/*

RUN apt-get update && \
    apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev && \
    docker-php-ext-configure gd --with-freetype=/usr/include/ --with-jpeg=/usr/include/ && \
    docker-php-ext-install gd

RUN apt-get update && \
    apt-get install -y git && \
    rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/project/current

# Установите пользователя
USER $USER

CMD ["php-fpm"]
