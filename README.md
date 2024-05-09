# SQL Injection

En este repositorio mostramos el codigo desarrollado para la practica de SQL Injection.

## Pasos a seguir

Los pasos a seguir para tener el proyecto funcionando son los siguientes:

*Paso 1.-* Tener instaladas las herramientas necesarias para realizar la practica, las cuales son:

1. Un servidor Apache, en este caso se recomienda XAMPP.
2. Un servidor de base de datos MySQL, en este caso el que viene con XAMPP esta bien.
3. Tener `composer instalado`, si no lo tienen lo pueden descargar del siguiente enlace [Pagina Oficial de Composer](https://getcomposer.org/).
4. Editor de codigo. Recomendado VS Code.

*Paso 2.-* En la carpeta `htdocs` de XAMPP clonar el repositorio usando el siguiente comando:

```bash
git clone https://github.com/Congal-Club/sqlinjection-starter.git sqlinjection
```

*Paso 3.-* Crear una base de datos llamada _sqlinjection_ en su sistema gestor de base de datos con una codificacion recomendada de `utf8_general_ci`.

*Paso 4.-* En el archivo _classes/Config.php_ configurar los valores de acceso a la base de datos dependiendo de tu configuracion.

*Paos 5.-* Instalar las dependencias con el siguiente comando:

```bash
composer install
```

*Paso 6.-* Abrir la pagina en el navegador con el siguiente enlace <http://localhost/sqlinjection> y comprobar que todo esta funcionando.
