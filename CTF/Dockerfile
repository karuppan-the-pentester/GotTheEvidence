# Use the official Ubuntu base image
FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update && apt-get install -y apache2 php php-mysql mysql-server libapache2-mod-php curl wget unzip python3 python3-pip

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

RUN a2enmod rewrite
RUN pip3 install requests
RUN apt install nano vim ssh -y
RUN apt-get install -y openssh-server htop nano neofetch sudo

WORKDIR /var/www/html/
RUN rm -f index.html

COPY Code /var/www/html/

COPY init-db /docker-entrypoint-initdb.d

RUN echo "got_the_evidence{Evidence_found_bhaiya}" > flag.txt
RUN echo "Setting password for: root" 
RUN echo "root:12345678" | chpasswd
RUN echo "Password changed"


WORKDIR /root/
COPY ./script.sh /root/
RUN chmod 777 /root/script.sh


RUN adduser --disabled-password --gecos "" davidgrey && \
    echo "davidgrey:PassCodeXUV" | chpasswd && \
    usermod -aG sudo davidgrey

RUN echo "davidgrey ALL=(ALL) NOPASSWD: /bin/usrchck" >> /etc/sudoers

RUN mkdir /home/davidgrey/.ssh/
COPY ./authorized_keys /home/davidgrey/.ssh/
RUN echo "PasswordAuthentication no" >> /etc/ssh/sshd_config

RUN echo "got_the_evidence{Evidence_found_bhaiya}" > /davidgrey/flag.txt
RUN chmod 700 /davidgrey/flag.txt
# Create the privileged script
RUN echo '#!/bin/bash\ncat /etc/passwd' > /bin/usrchck && \
    chmod 4755 /bin/usrchck

RUN service ssh start

EXPOSE 80 5353 22

CMD [ "/bin/sh"]
ENTRYPOINT ["/root/script.sh"]
