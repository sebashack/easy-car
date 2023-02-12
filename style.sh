#!/bin/bash
export ROOT="$( readlink -f "$( dirname "${BASH_SOURCE[0]}" )" )"
export SRC_DIR="$ROOT/src"
export PINT_BIN="$ROOT/src/vendor/bin/pint"

if [[ $1 == "fix" ]]; then
    cd $SRC_DIR
    $PINT_BIN
fi

if [[ $1 == "check" ]]; then
    cd $SRC_DIR
    $PINT_BIN --test
fi
