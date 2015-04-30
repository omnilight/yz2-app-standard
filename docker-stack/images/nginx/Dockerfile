FROM nginx:1.7

ADD nginx.conf /etc/nginx/nginx.conf

ADD run.sh /root/run.sh
RUN chmod +x /root/run.sh

CMD ["/bin/bash", "/root/run.sh"]