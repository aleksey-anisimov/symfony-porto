FROM debian:jessie

RUN apt-get update \
    && apt-get install -y nginx \
    && apt-get clean \
    && echo "daemon off;" >> /etc/nginx/nginx.conf

ADD default.conf /etc/nginx/sites-available/default

EXPOSE 80

CMD ["nginx"]
