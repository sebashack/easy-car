#!/bin/bash

until /opt/easycar/artisan migrate
do
  echo "Retrying DB migrations ..."
  sleep 1s
done

/opt/easycar/artisan serve --host 0.0.0.0 --port 8080
