FROM mattrayner/lamp
RUN apt-get update && apt-get install -y inetutils-ping net-tools nano mc nmap sqlite3 php7.3-sqlite3
RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer
COPY config/apache/000-default.conf /etc/apache2/sites-available/
WORKDIR /var/www/pfk