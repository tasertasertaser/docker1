# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cschulle <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/07/30 16:16:10 by cschulle          #+#    #+#              #
#    Updated: 2019/07/30 16:16:15 by cschulle         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian

WORKDIR /home/teamspeak

# Expose correct ports (guesses based on https://forum.teamspeak.com/threads/46486-Teamspeak-3-Server-Ports)
# 9987 default voice (udp for speed optimization)
# 10011 server query
# 30033 file transport

EXPOSE 9987/udp 10011 30033

# basic system update & upgrade
# install bzip2 to decompress files
# get Teamspeak server tar from teamspeak
# get the linux one ... obviously
# decompress Teamspeak tar

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y wget bzip2 && \
    wget https://files.teamspeak-services.com/releases/server/3.9.1/teamspeak3-server_linux_amd64-3.9.1.tar.bz2 && \
    tar -xvf teamspeak3-server_linux_amd64-3.9.1.tar.bz2

# get inside Teamspeak download folder
WORKDIR teamspeak3-server_linux_amd64

# create license-accepted file to accept teamspeak license
RUN touch .ts3server_license_accepted

# set entrypoint to run shell
ENTRYPOINT sh ts3server_minimal_runscript.sh

#TO BUILD docker build -t pancakes .
#TO LAUNCH docker run --rm -p 9987:9987/udp -p 10011:10011 -p 30033:30033 pancakes
#TO TEST download and install https://files.teamspeak-services.com/releases/client/3.3.0/TeamSpeak3-Client-macosx-3.3.0.dmg
#go to Connections->Connect
#enter IP of the VM (NOT the container) -- to get IP of VM, run docker-machine ip <VM name>
