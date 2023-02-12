#!/bin/bash

set -xeuf -o pipefail

export ROOT="$( readlink -f "$( dirname "${BASH_SOURCE[0]}" )" )"
export INSTALL_DIR=$ROOT/_install

rm -rf  $INSTALL_DIR
mkdir -p $INSTALL_DIR

sudo apt update
sudo apt install -y php8.1-mbstring php8.1 php8.1-mysql php8.1-curl net-tools php-xmlwriter wget \
                    apt-transport-https ca-certificates curl software-properties-common

# Install docker
if ! type "docker" > /dev/null; then
    curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg

    echo "deb [arch=$(dpkg --print-architecture) signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null

    sudo apt update

    apt-cache policy docker-ce

    sudo apt install -y docker-ce
    sudo usermod -aG docker ${USER}
else
    echo 'docker already installed'
fi

# Install docker-compose
if ! type "docker-compose" > /dev/null; then
    sudo curl -SL https://github.com/docker/compose/releases/download/v2.3.3/docker-compose-linux-x86_64 -o /usr/local/bin/docker-compose
    sudo chmod +x /usr/local/bin/docker-compose
else
    echo 'docker-compose already installed'
fi

# Install PHP composer
if [ ! -d "$INSTALL_DIR/composer" ]; then
    rm -rf $INSTALL_DIR/composer
    mkdir -p $INSTALL_DIR/composer

    cd $INSTALL_DIR/composer

    EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

    if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
    then
        >&2 echo 'ERROR: Invalid installer checksum'
        rm composer-setup.php
        exit 1
    fi

    php composer-setup.php --quiet
    RESULT=$?

    rm composer-setup.php

    cd -
fi
