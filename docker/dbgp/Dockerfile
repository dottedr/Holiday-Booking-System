FROM centos:7

#Update the base system
RUN yum update -y && yum clean all

#Setup Repos
RUN rpm -ivh https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm

#Install Python
RUN yum install -y python-debug && yum clean all

#Download Komodo python remote debugging
RUN curl -o /tmp/kmd-rdbg.tgz -l http://downloads.activestate.com/Komodo/releases/9.3.2/remotedebugging/Komodo-PythonRemoteDebugging-9.3.2-88191-linux-x86_64.tar.gz
RUN cd /tmp && tar zxf kmd-rdbg.tgz && mv Komodo*/pythonlib /usr/ && mv Komodo*/pydbgp* /usr/bin/ && rm -rf /tmp/kmd-rdbg.tgz /tmp/Komodo*

RUN useradd -u 10000 -d /var/python-app -M python 
USER python

WORKDIR /tmp
ENV TZ="/usr/share/zoneinfo/Europe/London"
CMD ["/usr/bin/pydbgpproxy", "-i 0.0.0.0:9001", "-d 0.0.0.0:9000"]
EXPOSE 9001