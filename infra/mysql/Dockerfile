FROM mysql

# ENV MYSQL_DATABASE=Rase-api \
#   MYSQL_USER=administrator \
#   MYSQL_ROOT_PASSWORD=Ryuna6337 \
#   TZ=Asia/Tokyo

ENV MYSQL_DATABASE=rase-api \
  MYSQL_USER=root \
  MYSQL_ROOT_PASSWORD=ryuna6337 \
  TZ=Asia/Tokyo

COPY ./my.cnf /etc/my.cnf
RUN chmod 644 /etc/my.cnf