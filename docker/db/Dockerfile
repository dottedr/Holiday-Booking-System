FROM centos:7

#Update the base system
RUN yum update -y && yum clean all

#Setup Repos
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
COPY mariadb.repo /etc/yum.repos.d/mariadb.repo

RUN yum install -y mariadb-server && yum clean all && rm -rf /var/lib/mysql && mkdir -p /var/lib/mysql && chown -R mysql:mysql /var/lib/mysql
RUN mkdir -p /tmp/initsql

# comment out a few problematic configuration values
RUN sed -Ei 's/^(bind-address|log)/#&/' /etc/my.cnf

VOLUME /tmp/initsql
VOLUME /var/lib/mysql

COPY docker-entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT ["/entrypoint.sh"]

EXPOSE 3306
USER mysql
CMD ["/usr/sbin/mysqld","--skip-name-resolve"]
