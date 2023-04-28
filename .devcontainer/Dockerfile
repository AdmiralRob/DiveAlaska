FROM wordpress

COPY ../. /var/www/html/wp-content/themes/divealaska
RUN mkdir -p /var/www/html/wp-content/themes/theme-dev;

USER root

RUN apt update
RUN apt install git -y

RUN chown -R www-data:www-data /var/www/html/
RUN chmod g+w -R /var/www/html/
RUN find /var/www/html/ -type d -exec chmod g+s {} \;