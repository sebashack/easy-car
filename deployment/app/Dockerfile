FROM ubuntu:22.04

RUN  apt-get update \
  && DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends tzdata \
  && echo "en_US UTF-8" > /etc/locale.gen

RUN apt-get update && apt-get install -y php8.1-mbstring php8.1 php8.1-mysql php8.1-curl \
                      net-tools php-xmlwriter apt-transport-https ca-certificates curl software-properties-common

RUN mkdir -p /opt/easycar
ADD ./dist/ /opt/easycar/
COPY ./entrypoint.sh /opt/easycar/

WORKDIR /opt/easycar
RUN /opt/easycar/artisan storage:link

ENTRYPOINT "/opt/easycar/entrypoint.sh"
