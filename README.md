# Easy-Car WEB dealership

## Operating system

This project's scripts and setup have been crafted for Linux Debian distros, and currently has only been run on
Ubuntu 22.04 operating systems.


## Install project dependencies + Composer

Run:

```
./first-time-install.sh
```

This script installs php-8.1 + extensions, docker + docker-compose and php Composer.


## Docker container with MySQL database

To run the data base execute:


```
cd docker
./service up
```

If you want to launch a bash session with `laravel_mysql` container execute:

```
cd docker
./bash.sh
```

To stop the database container execute:

```
cd docker
./service down
```


## Install LARAVEL dependencies

Run:

```
./setup
```

## Run local server

Run:

```
cd src
./artisan serve
```

Make sure the `laravel_mysql` container is running, otherwise the app will fail to launch.


## Fix code style

To check if current code has valid styling run:

```
./style check
```

To fix the current code style run:

```
./style fix
```


## Local storage for images

```
cd src && ./artisan storage:link
```


## Run migrations

```
cd src && ./artisan migrate
```

## Run tests

```
cd src && ./artisan test
```
