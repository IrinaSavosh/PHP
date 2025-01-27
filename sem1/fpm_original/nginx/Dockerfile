# на чем и какой версии будем работать
FROM nginx:latest 

#копируем файл по пути ./hosts/mysite.local.conf в контейнер по пути /etc/nginx/conf.d/mysite.local.conf
COPY ./hosts/mysite.local.conf /etc/nginx/conf.d/mysite.local.conf

WORKDIR /data  

VOLUME /data  

EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]