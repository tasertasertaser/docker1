#################################################
#     An isolated MySQL database container      #
#      Designed for 42 PHP Piscine, Day 05      #
#################################################

FROM mysql

VOLUME /data /var/lib/mysql

ENV MYSQL_ALLOW_EMPTY_PASSWORD=yes

#------
# USAGE
#------
# TO BUILD : docker build -t phpd05 .
# TO LAUNCH : docker run -d --restart=always --name practiceDB phpd05
# TO USE : docker exec -it practiceDB mysql -uroot