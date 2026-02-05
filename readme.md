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