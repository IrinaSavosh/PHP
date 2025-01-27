FROM nginx:latest

COPY ./hosts/mysite.local.conf /etc/nginx/conf.d/mysite.local.conf

WORKDIR /data

VOLUME /data

EXPOSE 80

CMD [ "nginx", "-g", "deamon off;" ]

# 127.0.0.1 mysite.local