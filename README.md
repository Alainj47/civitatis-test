# Test de Programación Civitatis

## Autor: Alain Bonilla

### Proyecto realizado en Laravel 7

> Instrucciones:

1) Crear una BD en mysql llamada: civitatis 
2) Editar el archivo .env ubicado en la raiz, cambiando las credenciales de conección:
- DB_HOST (host de la BD, se puede quedar en el valor por defecto)
- DB_USERNAME (usuario de BD de mysql)
- DB_PASSWORD (password del usuario de la BD)

3) Ejecutar los siguientes comands en orden:
- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed
- php artisan key:generate
- php artisan storage:link

4) Probar la aplicación con el comando:
- php artisan serve

La aplicación se levantará en: http://127.0.0.1:8000/
