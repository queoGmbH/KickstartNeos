# KickstartNeos



For instructions how to use docker-compose, see [this Link](https://docs.neos.io/cms/installation-development-setup/docker-and-docker-compose-setup#docker-compose-cheat-sheet)

composer install with docker

```
docker run -v %cd%:/app --rm --interactive composer install

docker-compose build

docke´-compose up -d
```

after that, go to locolhost:8081

to get the password, type
```
docker-compose exec neos cat /app/Data/SetupPassword.txt
```


after that comes mariadb config stuff


then there is an error and you type
```
docker-compose exec neos /app/flow doctrine:create
```

after that go back to localhost and change the url to step=2 (#Hackerman)

straight forward from there on
