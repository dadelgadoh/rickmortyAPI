# API de Rick & Morty
Verison 1.0

El presente proyecto corresponde a una API desarrolalda en Laravel v9.10.0 (PHP v8.1.5), que busca ofrecer 
una alternativa frente a la Api existente e implementada en https://rickandmortyapi.com/, 
además de que busca reemplazar esta en el explorador de Api de https://gitlab.com/jjyepez/rick-y-morty-api.
Se pone a disposión 3 endpoints:

- /api/character
- /api/episode
- /api/location

## Requerimientos
- Composer

## Instalación

- Clonar repositorio
- cd rickmortyAPI

- ### DB

- El proyecto ya cuenta con una db de sqlite en \rickmortyAPI\database\rickandmorty_v2.sqlite, previamente cargada. 
En caso de cambiar configuraciones o de trabajar en otra base, modificar \rickmortyAPI\.env , y además:

	- php artisan migrate
	- php artisan artisan db:seed (Puede tomar tiempo, precarga información de api existente)
 
## Ejecución
-php artisan serve

## FEATURES
- Tres Endpoint, para Personajes(/api/character), Episodios(/api/episode) y Lugares(/api/location).
- Soporte para peticiones GET, POST, PUT y DELETE, para cada endpoint.
- Base Sqlite incorporada.

## Utilización

- GET: Envio petición a /api/ENDPOINT para obtener retorno de primera pagina, o indicar la pagina como un query (?page={n pag}).
Si requiere un único registro, enviar petición /api/ENDPOINT/{n reg} .
Los registros son retornados en JSON. La información se encuentra en json[results][data].

- POST:  Content-Type: application/json con los siguientes campos requeridos para cada caso:
	- /api/character: name, status, species, type(opcional), gender, origin, location, image, episode, url
	- /api/episode: name, air_date, episode, characters, url
	- /api/location: name, type, dimension, residents, url

- PUT:  Content-Type: application/json con los siguientes campos requeridos para cada caso:
	- /api/character/{personaje id}: name, status, species, type(opcional), gender, origin, location, image, episode, url
	- /api/episode/{episodio id}: name, air_date, episode, characters, url
	- /api/location/{lugar id}: name, type, dimension, residents, url

- DELETE:  /api/character/{personaje id} ó /api/episode/{episodio id} ó /api/location/{lugar id}


## KNOWN ISSUES

- URLs se almacenan en DB con escape a '/'.
- La relación entre tablas no ha sido definida.
- Falta definición de excepciones.

## STACK UTILIZADO
- Laravel
- SQLite

## AUTOR
- Diego Delgado (@dadelgadoh)

## CONCLUSIONES
Se cumple con el requerimiento prinsipal, que refiere a API en Laravel que pueda reemplazar API en línea, 
y que permita al CRUD de la entidad Characters leer y escribir en la DB de SQLite. En cuanto a los endpoint para
las entidades Episodes y Locations, han sido implementados, aunque las relaciones entre las tablas no han sido definidas.

## FECHA DE ÚLTIMA ACTUALIZACIÓN
28/04/2022
@dadelgadoh