# Pasos para ejecutar el proyeto


## 1. ingrese al directorio del proyecto mediante el siguiente comando:
`cd TestSoho`

## 2. Crear la base de datos, como ayuda se muestran 2 opciones:
   - Por linea de comando :
	    `mysql -u your-user -p`
	sustituir **your-user** por el usuario de mysql, se agrega la clave y ya estamos dentro del promt de mysql
		
	 `create database your-database;`
	 sustituir **your-database** por el nombre que quiera agregar a la Base de datos.
	 `exit;`

- Usando cualquier manejador de base de datos para crear una base de datos.

## 3. Editar archivo .env y agregar los datos de la BBDD creada en el paso anterior
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=your-database
    DB_USERNAME=root
    DB_PASSWORD=your-password



## 4. Instalar las dependencias de node
`npm install`

## 5. Creando las migraciones
`php artisan migrate`

## 6. Comando para ejecutar la web
`npm run dev`

## 7. visualización en el navegador del sitio
`php artisan serve`
este comando mostrará un mensaje como el siguiente: 
> Laravel development server started: http://127.0.0.1:8000

Al ingresar a ese link ya se puede ver el sistema desde el navegador.

# Notas importantes:
1. Para  sincronizar automáticamente los cambios que se realicen en el código se puede ejecutar.
`npm run wacth`
2. Al ingresar por primera vez se verá una tabla vacia sin registros, debe registrarse.
- Al registrarse ya estará logueado y le mostrará la opción de crear un producto.
- Luego de creado un producto, este se puede eliminar y editar.
