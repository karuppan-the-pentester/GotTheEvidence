# Use the official Ubuntu base image
FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y apache2 php php-mysql mysql-server libapache2-mod-php curl wget unzip python3 

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

RUN a2enmod rewrite
RUN apt install python3-pip -y
RUN pip3 install requests 
WORKDIR /var/www/html/
RUN rm index.html
RUN service apache2 start
COPY Code /var/www/html/
COPY init-db /docker-entrypoint-initdb.d

WORKDIR /root/
COPY ./script.sh /root/

EXPOSE 80

ENTRYPOINT ["/root/script.sh"]
