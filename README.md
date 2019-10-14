# KickstartNeos
## Setup
For instructions how to use docker-compose, see [this Link](https://docs.neos.io/cms/installation-development-setup/docker-and-docker-compose-setup#docker-compose-cheat-sheet)

composer install with docker

```
docker run -v %cd%:/app --rm --interactive composer install
```


build and start the docker image (prepare a Dockerfile from your local Dockerfile dealer)
```
docker-compose build

docker-compose up -d
```

Wait 2 - 3 Minutes for the database setup to complete. Otherwise the db connection will not work.


After that, go to locolhost:8081, which will lead you to a passwort prompt. To get the password, type
```
docker-compose exec neos cat /app/Data/SetupPassword.txt
```


After that comes some mariadb config shizzle. Fill in the following:
```
username: root
password: db

host: db
database: flow
```


Then there is an error and you go into your hackerman mode and type:
```
docker-compose exec neos /app/flow doctrine:create
```
After the command finishes, go back to localhost and change the url to `step=2` (#Hackerman)



The rest is pretty much straight forward from there on:
Create a Username + Password
Click 'Next' a few times

Tadaa, your now at your local Neos back-end

## Test usage
To run tests, execute the following command: 
```
docker-compose run --rm codecept run
```

This is the normal codecept CLI, so you can you all options
```
docker-compose run --rm codecept run [acceptance|functional|...] [--steps|...]
```
