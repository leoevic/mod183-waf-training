FROM ubuntu:latest

# Update and install packages
RUN apt-get update && apt-get full-upgrade -y
RUN apt-get install apache2 apache2-utils mysql-server php libapache2-mod-php -y
RUN apt clean

# Apache and PHP config
COPY ./config/apache2.conf /etc/apache2/apache2.conf
COPY ./config/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./config/php.ini /etc/php/8.3/apache2/php.ini
RUN a2enmod rewrite

EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]