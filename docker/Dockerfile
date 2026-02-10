FROM ubuntu:latest

# Update and install packages
RUN apt get update && apt get full-upgrade -y
RUN apt install apache2 apache2-utils mysql php libapache-mod-php -y
RUN apt clean
EXPOSE 80
CMD ["apachectl", "-D", "FOREGROUND"]