FROM centos:7

#Update the base system
RUN yum update -y && yum clean all

#Setup Repos
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
RUN yum install -y memcached && yum clean all

EXPOSE 11211
CMD ["/usr/bin/memcached", "-p", "11211", "-u", "memcached", "-m", "64", "-c", "1024", "-l", "0.0.0.0"]

