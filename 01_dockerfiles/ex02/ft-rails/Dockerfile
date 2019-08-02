# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cschulle <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/07/30 16:36:52 by cschulle          #+#    #+#              #
#    Updated: 2019/07/30 16:36:54 by cschulle         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM ruby:2.2

ONBUILD COPY app /opt/app

# Install dependencies required to run Rails & RubyGems,
# including SQL client, 
# Use apt-get since Ruby image is based on a Debian image
RUN apt-get update && \
    apt-get install -y mysql-client sqlite3 --no-install-recommends && \
    build-essential nodejs && \
    gem install rails --version 4.2.4

# Expose port 3000 to Docker host for outside access
EXPOSE 3000