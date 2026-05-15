## PRACTICAS PRIMER TRIMESTRE ##
Este proyecto contiene la estructura para las prácticas que se irán realizando a lo largo del primer trimestre del módulo de DWS  
Para el desarrollo/depuración de las mismas se usará un contenedor docker preconfigurado con Apache-PHP-xDebug para el que acompaño un fichero para la carga  
La estructura inicial del repositorio es:  
* Carpeta web: Raíz del sitio
* docker-compose.yml: Fichero para la generación del contenedor.

### PASOS A SEGUIR PARA LA PUESTA EN MARCHA Y DEPURACIÓN ###
1. Crear en nuestro github propio un Fork de este repositorio
2. Clonar el repositorio localmente en nuestro ordenador.  
```git clone ruta_vuestro_repositorio```
3. Añadir una configuración de depuración para PHP  
Se debe configurar para que enlace xDebug con el contenedor.
Para ello, modificar el archivo para que quede:  
```
    {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings":{
                "/var/www/html":"${workspaceRoot}/web"
            }
        },
```
OJO: Para que funcione la depuración, debemos abrir en Visual Studio la carpeta base. ${workspaceRoot} hace referencia a la carpeta que hemos abierto en Visual Studio. Si vamos a usar otra estructura, debemos cambiar la línea para que haga correctamente el enlace.  
  
4. Depurar el código.
Desde una terminal ejecutar el siguiente comando que activa el contenedor.  
```docker compose -f docker-compose.yml up```
   
