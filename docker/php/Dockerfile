FROM php:8.1.0-alpine3.15

# Установка bcmath
RUN docker-php-ext-install bcmath

# Замена uid и gid пользователя www-data на 1000
RUN apk add --no-cache shadow && \
    usermod -u 1000 www-data && \
    groupmod -g 1000 www-data && \
    apk del shadow


# Установка composer
COPY --from=composer:2.2.4 /usr/bin/composer /usr/bin/composer
