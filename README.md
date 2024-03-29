# CMS Tienda

Sistema de gestión para tiendas en línea 

## Construido con 🛠️
* [laravel](https://laravel.com/) - El framework web usado

## Autores ✒️
* [Marianabolet](https://github.com/marianabolet)
* [kaizerenrique](https://github.com/kaizerenrique)


### Preparar servidor
_Una vez conectados por ssh al servidor procedemos a ir a la carpeta del servidor web_
```
cd /var/www/html
```
_Ahora podemos copiar el repositorio con el siguiente comando:_
```
git clone https://github.com/kaizerenrique/CMS_Tienda.git
``` 
### Despliegue
_Ingresar a la carpeta raiz_
```
cd CMS_Tienda
```
_Una vez dentro ejecutamos composer_
```
composer install
```
_Luego ejecutamos:_
```
cp .env.example .env
php artisan key:generate
php artisan storage:link
php artisan optimize
```
_NPM:_
```
npm install
npm run build
```

### Base de datos
_Para generar la base de datos desde cero el comando es:_
```
php artisan migrate
php artisan migrate --seed
```