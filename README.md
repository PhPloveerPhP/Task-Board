

# Task Board (Kanban Style)

## Introducción

<div><img src="C:\Users\thund\OneDrive\Desktop\Logo.PNG" style="zoom:33%;" /></div>

Task Board un proyecto que tiene como objetivo proporcionar una solución a la organización y finalización de tareas individuales o grupales.

## Requisitos

Los siguientes programas y herramientas son necesarias para ejecutar Proyecto:
- PHP 7.4.10 o superior
- MariaDB 10.4.14
- Apache 2.4.46
- Bootstrap 4.3
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
   ```

4. Descargar dependencias:

   ```
   composer require vlucas/phpdotenv
   ```

## Uso

Para usar la aplicación, siga estos pasos:
1.  Nos registramos

   ![](C:\Users\thund\OneDrive\Desktop\register.PNG)

2. Iniciamos sesión

   ![](C:\Users\thund\OneDrive\Desktop\login.PNG)

3. Creamos tareas

   ![](C:\Users\thund\OneDrive\Desktop\board.PNG)

## Licencia
Bajo Licencia Mit