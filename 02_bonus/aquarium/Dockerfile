###############################################
#   A containerized version of Asciiquarium   #
#                 That's all                  #
###############################################

FROM debian:latest

RUN apt-get update && apt-get upgrade -y \
	&& apt-get install -y \
	libcurses-perl \
	wget \
	bzip2 \
	ca-certificates \
	make

RUN wget http://search.cpan.org/CPAN/authors/id/K/KB/KBAUCOM/Term-Animation-2.4.tar.gz

RUN tar -zxvf Term-Animation-2.4.tar.gz

WORKDIR Term-Animation-2.4

RUN perl Makefile.PL && make && make test && make install

WORKDIR /tmp

RUN wget --no-check-certificate http://www.robobunny.com/projects/asciiquarium/asciiquarium.tar.gz

RUN tar -zxvf asciiquarium.tar.gz

RUN cp asciiquarium_1.1/asciiquarium /usr/local/bin

RUN chmod 0755 /usr/local/bin/asciiquarium

ENTRYPOINT perl /usr/local/bin/asciiquarium

#------
# USAGE
#------
# TO BUILD : docker build -t fishies_img .
# TO TEST : docker run --rm -it --name fishies_cont fishies_img