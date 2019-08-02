# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: cschulle <marvin@42.fr>                    +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2019/07/13 20:09:35 by cschulle          #+#    #+#              #
#    Updated: 2019/07/13 20:18:33 by cschulle         ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM alpine

RUN apk update && apk add vim

CMD ["vim"]

#TO BUILD: docker build --tag=waffles -f <filepath> .
#TO LAUNCH: docker run -it waffles