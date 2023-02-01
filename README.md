

# Task Board (Kanban Style)

## Introducción

<div><img src="https://i.imgur.com/5hQPees.png" style="zoom:33%;" /></div>

Task Board un proyecto que tiene como objetivo proporcionar una solución a la organización y finalización de tareas individuales o grupales.

## Requisitos

Los siguientes programas y herramientas son necesarias para ejecutar Proyecto:
- PHP 7.4.10 o superior
- MariaDB 10.4.14
- Apache 2.4.46
- Bootstrap 4.3.x
- Composer 2.5.1

## Instalación

1. Clonar el repositorio:

   ```
   git clone https://github.com/your_username_/Project-Name.git
   ```

2. Instalar la base de datos:

   ```
   php ./config/install.php
   ```

3. Introduce tus variables de entorno `.env`

   ```
   DB_HOST= ""
   DB_USER= ""
   DB_PASS= ""
   DB_NAME= ""
   ADMIN_USER = ""
   ADMIN_PASS = ""
   ```

4. Descargar dependencias:

   ```
   composer install
   ```

## Uso

Para usar la aplicación, siga estos pasos:
1.  Nos registramos

   ![](https://i.imgur.com/2KIte9c.png)

2. Iniciamos sesión

   ![](https://i.imgur.com/ULjpLbp.png)

3. Creamos tareas

   ![](https://i.imgur.com/QN3kf9t.png)

## Licencia
Bajo Licencia Mit