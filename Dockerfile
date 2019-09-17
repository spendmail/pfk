FROM mattrayner/lamp
RUN apt-get update && apt-get install -y inetutils-ping net-tools nano mc nmap sqlite3 php7.3-sqlite3
COPY config/apache/000-default.conf /etc/apache2/sites-available/
