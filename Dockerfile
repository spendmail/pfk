FROM mattrayner/lamp
RUN apt-get update && apt-get install -y inetutils-ping net-tools nano mc nmap
COPY config/apache/000-default.conf /etc/apache2/sites-available/
gitпше