# ejercicio_mDevz

Ejercicio basado en PHP y MySQL

Requisitos del sistema:

-Servidor Apache
-MySQL Server

Configuración:
Clonar el repositorio del proyecto en su carpeta raiz del servidor.
En el archivo Conexion.php están los datos de conexión a la base de datos. Si es necesario deben ser cambiados desde allí ubicado en \clases\Conexion.php
Ejecutar el script en la base de datos para crear la tabla "Historial" que luego nos permitirá recuperar las búsquedas del usuario.

Una vez acabado esto, el sistema ya se encuentra en condiciones de utilizar.
El archivo de la página principal es busqueda.php

## Aclaracion ##

Notarán que hay una segunda consulta a otro web service que se llama Random_user, recurrí a dicho servicio porque se me hizo imposible capturar la imagen que viene en el Json otorgado por Twitter.
Verán en el el archivo "extraer_datos.php" linea 8, que obtengo la URL pero a la hora de mostrar la imagen no lo hace.



