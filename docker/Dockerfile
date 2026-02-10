FROM ubuntu:latest

# Update and install packages
RUN apt-get update && apt-get full-upgrade -y
RUN apt-get install apache2 apache2-utils mysql-server php libapache2-mod-php -y
RUN apt clean
EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]