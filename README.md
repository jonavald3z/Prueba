*********************************************
Datos Personales
*********************************************
Nombre Completo: I.S.C Jonathan Valdez Martinez
Nivel de conocimiento en lenguajes
** PHP .- 80 %
 ** Javascript .- 80%
 ** MySQL .- 90%
 ** MVC .- 100 %
 
Correo de contacto: jvaldez_2610@hotmail.com
Ultimo empleo: Grupo Lahe
Nivel que elegi para resolver la prueba: Basico, Medio y Avanzado

*********************************************
Instrucciones de instalacion
*********************************************

Paso 1: Instalar Xampp
Paso 2: clonar el repositorio dentro de la carpeta C:\xampp
https://github.com/jonavald3z/prueba.git

Paso 3: Crear un Virtual Host para ejecutar el proyecto
3.1 Ir a la carpeta C:\xampp\apache\conf\extra y abrir el archivo httpd-vhosts
3.2 Copiar las siguientes lineas al final del archivo  y guardamos el archivo

<VirtualHost *:8086>
  ServerName localhost
  ServerAlias localhost
  DocumentRoot "C:/xampp/Prueba/public_html/"
  <Directory "C:/xampp/Prueba/public_html/">
    Options +Indexes +Includes +FollowSymLinks +MultiViews
    AllowOverride All
    #Require local
    #Order allow,deny
    Require all granted
  </Directory>
</VirtualHost>

Paso 3.3 nos vamos a dirigir a Xampp Control Panel y daremos clic en el boton 
config de apache, clic en httpd.conf

Paso 3.3.1 En la linea 60 daremos clic dos veces y pegaremos las sigueintes lineas y guardamos el archivo

Paso Listen 0.0.0.0:8086
Paso Listen [::0]:8086

Paso 3.4 Base de Datos
Paso 3.4.1 Ejecutar los servicios de MYSQL desde el Xampp Control Panel
y acceder a phpmyadmin desde el navegador  http://localhost/phpmyadmin/

Paso 3.4.2 Crear una nueva base de datos desde el boton de cuentas de usuario
Paso 3.4.3 Clic en agregar cuenta de usuario

Nombre de usuario: assessment
Nombre del host: %
contraseña: assessment

****La base de datos se debera llamar assessment****

Habilitamos las casilla siguiente
* Crear base de datos con el mismo nombre de usuario
Privilegios Globales
* Seleccionar todo
___________________________________
Paso 3.4.4 Daremos clic del lado izquierdo sobre el nombre de nuestra base de datos
Paso 3.4.5 clic sobre Importar, seleccione el archivo que tendra que descargar en este proyecto que se llama assessment.sql
Paso 3.4.6 clic en importar

Paso 4: dirigirnos a Xampp  Control Panel y reiniciar los servicios Apache y MySQL

Abrir el proyecto en cualquier navegador web, con la siguiente ruta 

http://localhost:8086/

*********************************************
Listado de Actividades que logre completar
*********************************************
 1.-Nivel Basico
 Se requiere un script que deberá contener la creación de un mínimo de 3 tablas donde se
 guardará la información del producto, comentarios y categoría del producto. Deberá
 Última actualización 13/07/22
 guardarse como mínimo el modelo, especificaciones y precio del producto; para los
 comentarios se deberán guardar mínimo texto, nombre y clasificación. Y para las categorías
 deberán tener la capacidad de estar anidadas.
 2. Cada tabla deberá tener un código para insertar no menos de 10 registros por cada una y no
 hay limitación en las columnas
 *********************************************
 2. Nivel Intermedio
 1. Crear una vista de los productos con sus comentarios, ordenados por mejor calificación
 promedio.
 2. Cada tabla debe de tener sus índices, llaves foráneas y constraints.
 3. Crear una tabla de accesorios asociados a la categoría del producto.
 4. Como parte del script agregar el código para modificar la tabla de productos existente
 agregando una nueva columna con la cantidad de visitas a cada producto.
 *********************************************
 Archivo de configuracion
 
 BÁSICO
 1. Deberá utilizar PDO para conectarse con la base de datos y hacer un script en el nivel básico
 que agregue otros 10 registros a cada tabla. El script deberá generar un log donde reporte
 los errores y la cantidad de registros insertados.
 INTERMEDIO
 1. Hacer un código donde genere 200 productos de forma aleatoria con especificaciones,
 marcas y modelos utilizando términos técnicos y precios en un rango de 10,000 hasta
 60,000 MXN.
 AVANZADO
 5. En la carpeta PHP deberán estar todas las clases tanto controladoras como modelos,
 organizadas en espacios de nombres, así como un class loader que se incluirá en las vistas
 para utilizar las clases respectivas
 *********************************************
 CARPETA PUBLIC_HTML
 1.- En la carpeta de public_html deberá contener un htaccess configurado para permitir únicamente la
 visualización de las vistas públicas apropiadas.
