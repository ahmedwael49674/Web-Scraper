FROM nginx:1.10

ADD etc/nginx/vhost.conf /etc/nginx/conf.d/default.conf