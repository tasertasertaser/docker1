FROM ubuntu:latest

# || INSTALL REQUIRED PACKAGES ||
# packages needed for gitlab:
#	ca-certificates - allow SSL-based apps to check connections
#	 https://packages.debian.org/buster/ca-certificates
#	openssh-server - portable version of openssh
#	 https://packages.debian.org/buster/openssh-server
#	wget - get stuff from urls
#	 https://packages.debian.org/jessie/wget
#	postfix - mail transport agent
#	 https://packages.debian.org/jessie/postfix
# DEBIAN_FRONTEND set to noninteractive because it's optimized for automation
# 	https://bit.ly/31sRVrY
RUN apt-get update && apt-get upgrade -y && \
    DEBIAN_FRONTEND=noninteractive apt-get install -y \
      ca-certificates \
      openssh-server \
      wget \
      postfix

# || GET AND INSTALL GITLAB ||
# wget the files from the URL
# edit permissions to rwx
# run script
# install gitlab
RUN wget https://packages.gitlab.com/install/repositories/gitlab/gitlab-ce/script.deb.sh && \
	chmod 777 script.deb.sh && \
	./script.deb.sh
RUN apt-get install -y gitlab-ce

# || TIMEZONE INFO ||
RUN apt update && apt install -y tzdata

# || CREATE FILE TO TAIL AFTER BUILD ||
RUN echo "Build complete. Gitlab may still take >10min to respond in browser." > complete.txt

# || EXPOSE PORTS ||
EXPOSE 443 80 22

# || RUN IN SUBSHELL ON ENTRY ||
ENTRYPOINT (/opt/gitlab/embedded/bin/runsvdir-start &) && \
	gitlab-ctl reconfigure && \
	tail -f complete.txt
# tail creates a loop that keeps the container running.

#-------------
# REQUIREMENTS
#-------------

# THIS FILE NEEDS TO:
# 	get the development version of Gitlab - Community Edition
# 	install it with all the dependencies and the necessary configurations
# 	launch the application
# 	all as it builds.

# ONCE RUN, USER MUST BE ABLE TO:
# 	access the web client
# 	create users
# 	interact via GIT with this container (HTTPS and SSH)

#------
# NOTES
#------

# This build takes a long time - somewhere in the range of 10-20 minutes.
# Even after the build appears complete, Gitlab can take >10 minutes to
#	start responding to browser queries.

# Here are some ways to make it take less time.

# Make sure you create a symbolic link/goinfre setup as it says in the PDF before doing this
# This will make the build faster

# Setting more RAM for the VM will make the build faster.
# 	To set memory when you spawn the machine use the --virtualbox-memory flag.
# 	1024 is the default.
# 	>	docker-machine create -d virtualbox --virtualbox-memory 2048 machine_name

# You can also assign more virtual CPU cores to the docker machine. 
# 	>	docker-machine create -d virtualbox --virtualbox-cpu-count "2" machine_name

# You can even change this after you have created the machine
# 	>	docker-machine stop machine_name
# 	>	VBoxManage modifyvm machine_name --cpus 2
# 	>	VBoxManage modifyvm machine_name --memory 4096
# 	>	docker-machine start machine_name

#------
# USAGE
#------

# TO BUILD : docker build -t frenchtoast .
# TO LAUNCH : docker run -it --rm -p 8080:80 -p 8022:22 -p 8443:443 --privileged frenchtoast
#	--privileged gives container all capabilities and access to host's devices.
#	https://medium.com/lucjuggery/docker-tips-mind-the-privileged-flag-d6e2ae71bdb4
# TO TEST : create new user
#	initialize a repo
#	clone with HTTP(S) : replace gitlab.example.com with ip:8080
