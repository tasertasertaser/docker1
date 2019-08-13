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

# || EXPOSE PORT ||
ONBUILD EXPOSE 3000

# || MOVE & SETUP PROJECT ||
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
# TO TEST : visit http://[machine ip]:3000
