FROM mysql

ENV MYSQL_DATABASE=rase-api \
  MYSQL_USER=root \
  MYSQL_ROOT_PASSWORD=ryuna6337 \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf