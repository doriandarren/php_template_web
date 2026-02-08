# Project

## Run server:

```sh
php -S localhost:8888
php -S localhost:8888 -t public
```




## Herramienta de DEBUG

```sh

## Funcion
function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}


## Llamada
dd($_SERVER);

```


# Composer

```sh

composer init                                       ## Iniciarlizar el composer

composer install                                    ## Instalar dependencias

composer dump-autoload                              ## Recargar ficheros



composer require illuminate/collections             ## Package collections laravel
composer require pestphp/pest                       ## Package test


## Crear carpeta "tests"
./vendor/bin/pest --init                            ## Iniciarlizar 
./vendor/bin/pest                                   ## Ejecutar


```