#!/bin/bash

export ROOT="$( readlink -f "$( dirname "${BASH_SOURCE[0]}" )" )"
export INSTALL_DIR="$ROOT/../_install"
export SRC_DIR="$ROOT/../src"
export COMPOSER_HOME="$INSTALL_DIR/composer"
export COMPOSER_BIN="php $INSTALL_DIR/composer/composer.phar"

rm -rf ${ROOT}/app/dist

cd ${SRC_DIR}
mkdir -p bootstrap/cache
${COMPOSER_BIN} install

cp -a ${SRC_DIR} ${ROOT}/app/dist
rm -rf ${ROOT}/app/dist/public/storage
rm -f ${ROOT}/app/dist/storage/app/public/images/*

cd -
