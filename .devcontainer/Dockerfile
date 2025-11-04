FROM php:8.4-cli

# Instala utilitários e extensões PHP necessárias para Laravel
RUN apt-get update \
  && export DEBIAN_FRONTEND=noninteractive \
  && apt-get install -y git zip unzip libpng-dev libonig-dev libxml2-dev default-mysql-client curl \
  && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd \
  && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instala Composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
  && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
  && rm composer-setup.php

ENV COMPOSER_ALLOW_SUPERUSER=1

WORKDIR /workspace/laravel-noticias

CMD ["bash"]
