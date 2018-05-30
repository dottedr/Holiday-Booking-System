FROM centos:7

#Update the base system
RUN yum update -y && yum clean all

#Setup Repos
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
RUN rpm -ivh http://rpms.remirepo.net/enterprise/remi-release-7.rpm
RUN yum-config-manager --enable remi-php71

#COPY tideways.repo /etc/yum.repos.d/tideways.repo
#RUN yum install -y tideways-php php-pecl-mongodb httpd php php-tcpdf php-cli php-pecl-memcache php-pecl-memcached php-pecl-imagick poppler-utils php-pecl-xdebug php-pecl-imagick php-pear-Mail-Mime php-pear-Mail php-gd php-mcrypt php-mysql php-mbstring php-devel php-pear php-xml php-pear-Net-SMTP && yum clean all

RUN yum install -y httpd php php-tcpdf php-cli php-pecl-memcache php-pecl-memcached php-pecl-imagick poppler-utils php-pecl-xdebug php-pecl-imagick php-pear-Mail-Mime php-pear-Mail php-gd php-mcrypt php-mysqlnd php-mbstring php-devel php-pear php-xml php-pear-Net-SMTP && yum clean all
RUN rm -rf /var/www && mkdir -p /var/run/httpd /var/log/httpd /var/www && chown -R apache:apache /var/www /var/run/httpd /var/log/httpd

COPY php.ini /etc/php.d/
COPY httpd.conf /etc/httpd/conf/
COPY launch.sh /

RUN chmod +rx /launch.sh
VOLUME /var/www
WORKDIR /var/www

#RUN yum install -y libreoffice ImageMagick && yum clean all

EXPOSE 80
CMD ["/bin/bash", "/launch.sh"]
