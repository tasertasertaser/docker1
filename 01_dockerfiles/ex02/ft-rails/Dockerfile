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

FROM ruby:2.3.0

ONBUILD COPY app /opt/app

# Install dependencies required to run Rails & RubyGems,
# including SQL client, 
# Use apt-get since Ruby image is based on a Debian image
RUN apt-get update
RUN apt-get install -y mysql-client sqlite3 --no-install-recommends
RUN gem install rails --version 4.2.4
RUN mkdir -p /opt/app

WORKDIR /opt/app

ONBUILD ADD app /opt/app
# makes sure all dependencies in your Gemfile are available in your app
ONBUILD RUN bundle install
# runs any migrations it finds 
# more info on rake at https://dev.to/neshaz/how-to-use-rake-db-commands-in-the-correct-way--50o2
ONBUILD RUN rake db:migrate
ONBUILD RUN rake db:schema:load
ONBUILD RUN rake db:seed

# Expose port 3000 to Docker host for outside access
ONBUILD EXPOSE 3000

# TO BUILD : docker build -t ft-rails:on-build .
# use this from INSIDE the ft_rails folder, otherwise access is denied
# TO LAUNCH : docker run -it --rm ft-rails:on-build
# TO TEST : ????