FROM php:fpm

RUN echo "pm.status_path = /status" >> /usr/local/etc/php-fpm.d/zz-status.conf
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN echo "slowlog = /proc/self/fd/2;\nrequest_slowlog_timeout = 2s" >> /usr/local/etc/php-fpm.d/zz-slowlog.conf