FROM php:8.2-fpm

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug
RUN docker-php-ext-install pdo pdo_mysql

# Copy custom php.ini file
COPY php.ini /usr/local/etc/php/conf.d/custom.ini