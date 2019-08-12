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

# FROM ruby:latest
# RUN apt-get update -y && apt-get install -y \
# 	build-essential \
# 	libpq-dev \
# 	nodejs \
# 	sqlite3 \
# 	gem
# RUN gem install bundler --no-document
# RUN gem install rails --no-document
# RUN gem install rake -v 12.3.2 --no-document
# 
# # Run on ft-rails:on-build
# ONBUILD COPY app /opt/app
# ONBUILD WORKDIR /opt/app
# ONBUILD EXPOSE 3000
# ONBUILD RUN bundle install
# ONBUILD RUN rake db:migrate
# ONBUILD RUN rake db:seed
# ONBUILD RUN rake


FROM ruby:2.6.2

# || INSTALL REQUIRED PACKAGES ||
#	sqlite3
#	gem
#	rails
RUN apt-get update && apt-get install -y \
	nodejs \
	sqlite3 \
	gem 

# || INSTALL REQUIRED GEMS ||
RUN gem install bundler
RUN gem install rake -v 12.3.2
RUN gem install rails

# || CREATE APP DIRECTORY ||
# RUN mkdir -p /opt/app

# || EXPOSE PORT ||
ONBUILD EXPOSE 3000
# || MOVE PROJECT ||
#	runs any migrations it finds 
#	more info on rake at https://dev.to/neshaz/how-to-use-rake-db-commands-in-the-correct-way--50o2
ONBUILD COPY app /opt/app
ONBUILD WORKDIR /opt/app
ONBUILD RUN bundle install
ONBUILD RUN rake db:migrate
ONBUILD RUN rake db:seed
ONBUILD RUN rake

#------
# USAGE
#------

# TO BUILD : docker build -t ft-rails:on-build -f ft-rails/Dockerfile .
#          : docker build -t scones .
# TO LAUNCH : docker run -it --rm -p 3000:3000 scones
# TO TEST : 