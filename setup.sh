#!/bin/bash

export ROOT="$( readlink -f "$( dirname "${BASH_SOURCE[0]}" )" )"
export INSTALL_DIR="$ROOT/_install"
export COMPOSER_HOME="$INSTALL_DIR/composer"
export COMPOSER_BIN="php $INSTALL_DIR/composer/composer.phar"

cd $ROOT/src
mkdir -p bootstrap/cache
$COMPOSER_BIN install
