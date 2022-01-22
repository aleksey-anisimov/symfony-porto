FROM php:8.1-fpm

RUN apt-get update \
    && apt-get install -y \
        git \
        postgresql-client \
        libpq-dev \
        nano \
        librabbitmq-dev \
        libssh-dev \
        libzip-dev \
        zip \
        libicu-dev \
    && apt-get clean \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && docker-php-ext-configure zip \
    && docker-php-ext-configure intl \
    && docker-php-ext-install \
       zip \
       intl \
       pdo \
       pdo_pgsql \
       bcmath \
       opcache \
    && pecl install apcu \
    && pecl install amqp-1.11.0beta \
    && pecl install xdebug \
    && docker-php-ext-enable amqp \
    && docker-php-ext-enable apcu \
    && docker-php-ext-enable xdebug \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* \
\
    && touch /usr/local/etc/php/conf.d/custom.ini \
    && echo "memory_limit=4096M;" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "realpath_cache_size=64M;" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "realpath_cache_ttl=7200;" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "upload_max_filesize=505M;" >> /usr/local/etc/php/conf.d/custom.ini \
    && echo "post_max_size=500M;" >> /usr/local/etc/php/conf.d/custom.ini \
\
    && touch /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.enable=1;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.revalidate_freq=0;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.validate_timestamps=1;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_accelerated_files=300000;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.memory_consumption=512;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.max_wasted_percentage=10;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.interned_strings_buffer=64;" >> /usr/local/etc/php/conf.d/opcache.ini \
    && echo "opcache.fast_shutdown=1;" >> /usr/local/etc/php/conf.d/opcache.ini \
\
    && touch /usr/local/etc/php/conf.d/apcu.ini \
    && echo "apc.enable=1;" >> /usr/local/etc/php/conf.d/apcu.ini \
    && echo "apc.enable_cli=0;" >> /usr/local/etc/php/conf.d/apcu.ini \
    && echo "apc.shm_size=256M;" >> /usr/local/etc/php/conf.d/apcu.ini \
    && echo "apc.mmap_file_mask=/tmp/apc.XXXXXX;" >> /usr/local/etc/php/conf.d/apcu.ini \
\
    && touch /usr/local/etc/php-fpm.conf \
    && echo "pm=ondemand" >> /usr/local/etc/php-fpm.conf \
    && echo "pm.max_children=100" >> /usr/local/etc/php-fpm.conf \
    && echo "pm.process_idle_timeout=10s" >> /usr/local/etc/php-fpm.conf \
    && echo "pm.max_requests=500" >> /usr/local/etc/php-fpm.conf \
    && echo "request_terminate_timeout=900s" >> /usr/local/etc/php-fpm.conf \
\
# install xdebug
    && touch /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "error_reporting=E_ERROR" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_startup_errors=Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "display_errors=Off" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.log_level=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

WORKDIR /var/www/symfony

RUN usermod -u 1000 www-data
RUN chown 1000:www-data /var/www