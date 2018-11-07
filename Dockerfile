FROM zzcomzz/php-apache-composer


WORKDIR /var/www/html/Lomba-IT/E-Perpus/

COPY . .

RUN composer install


EXPOSE 80

CMD ["apache2-foreground"]