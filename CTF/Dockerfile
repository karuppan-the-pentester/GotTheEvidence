# Use the official Ubuntu base image
FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y apache2 php php-mysql mysql-server libapache2-mod-php curl wget unzip

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

RUN a2enmod rewrite

WORKDIR /var/www/html/
RUN rm index.html
RUN service apache2 start
COPY Code /var/www/html/
COPY gottheevidence.sql /var/www/html/

EXPOSE 80

CMD service mysql start && apachectl -D FOREGROUND
