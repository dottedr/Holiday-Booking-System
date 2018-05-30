FROM centos:7

#Update the base system
RUN yum update -y && yum clean all

#Install required applications
RUN curl -Lso /usr/bin/mailhog https://github.com/mailhog/MailHog/releases/download/v1.0.0/MailHog_linux_amd64 && chmod +x /usr/bin/mailhog
RUN useradd mailhog

USER mailhog
CMD ["/usr/bin/mailhog", "-ui-bind-addr", "0.0.0.0:1080", "-api-bind-addr", "0.0.0.0:1080", "-smtp-bind-addr", "0.0.0.0:1025"]

#Mail catcher web interface, smtp
EXPOSE 1080 1025

