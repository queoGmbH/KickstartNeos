# WORKSHOP README

* Go to the *workshop* branch of the repository; and do a `git pull`
* reset your docker-compose environment using:
  ```
  docker-compose down -v
  ```
* start again using
  ```
  docker-compose build
  docker-compose up -d
  ```


* VS Code Plugin: Docker WS
* PHPStorm Plugin: "Neos" installieren, und IM PROJEKT in den Einstellungen vom Neos-Plugin den Haken bei "aktiv" setzen

* Node Type Definition Referenz: https://neos.readthedocs.io/en/stable/CreatingASite/NodeTypes/NodeTypeDefinition.html


## AGENDA

* Erstellen eines "einfachen" Node Types, bspw. basierend auf Bootstrap
    * (optional): Übung 
* Erstellen eines Node Types mit verschachtelten Inhalten
    * (optional): Übung
    * https://neos.readthedocs.io/en/stable/CreatingASite/RenderingCustomMarkup/CustomContentElements.html#creating-nested-content-elements
    * als Node Type: Neos.Neos:ContentCollection
    * zum Rendering in Fusion: Neos.Neos:ContentCollection
* Fusion best practices (AFX)

* weitere cases.

* APIs einbetten



# KickstartNeos



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


After that, go to locolhost:8081, which will lead you to a passwort prompt. To get the password, type
```
docker-compose exec neos cat /app/Data/SetupPassword.txt
```


After that comes some mariadb config shizzle (get config data from your local mariadb config guru).


Then there is an error and you go into your hackerman mode and type:
```
docker-compose exec neos /app/flow doctrine:create
```
After the command finishes, go back to localhost and change the url to `step=2` (#Hackerman)



The rest is pretty much straight forward from there on:
Create a Username + Password
Click 'Next' a few times

Tadaa, your now at your local Neos back-end
