# SociDoc ITSMT
Este sistema es una plataforma diseñada para facilitar la generación de reportes de servicio social para los estudiantes del Instituto Tecnológico Superior de Martínez de la Torre.

## Caracteristicas
- Gestión de carreras.
- Gestión de Jefes de Carrera.
- Gestión de fechas de reportes.
- Generación de Solicitud para el Servicio Social.
- Generación de Carta Compromiso.
- Generación de Plan de Trabajo.
- Generación de Reportes Bimestrales (Anexos XXII, XXIII, XXIV y XXV)

## Tecnologías implementadas
El desarrollo del proyecto fue realizado mediante el framework Laravel, implementando los estilos de [Bootstrap 5](https://getbootstrap.com/ "Bootstrap 5"). El sistema hace uso de funciones nativas de PHP para la generación de los documentos sin necesidad de librerías de terceros.

### Instalación
Tras descargar o clonar el repositorio, es necesario ejecutar el comando `composer install` desde la terminal. Es importante asegurarse de estar dentro del directorio que contiene el proyecto y de tener Composer instalado previamente.

Copiar el archivo `.env.example` y reenombrarlo simplemente como `.env`. Buscar las variables de entorno para la conexión a la base de datos:

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=servicio_reportes
	DB_USERNAME=root
	DB_PASSWORD=

Ejecutar el comando: `php artisan migrate --seed` para correr las migraciones.

## ANEXO XVIII
El estudiante podrá llenar la información del formulario, comenzando por sus datos personales: nombre, sexo, número de teléfono, correo institucional y dirección de su domicilio. En sus datos escolares, se le solicitará el número de control y la carrera a la cual pertenece. Los datos del servicio social son: nombre de la dependencia, titular de la dependencia, puesto que ocupa el titular, nombre del programa, breve descripción de las actividades a realizar, modalidad y tipo de programa. En caso de que el tipo de programa no esté en la lista, deberá especificarlo.

![Interfaz para llenar Anexo 18](https://github.com/HLBrandon/servicio-social-itsmt-doc-generador/blob/9cd3eb032c1ab32f48e64db0740375be30c6c767/screenshots/captura-anexo-xviii.jpeg)

## ANEXO XX
El estudiante podrá llenar la información del formulario, comenzando por sus datos estudiantiles: nombre completo, número de control, teléfono, dirección de domicilio del estudiante y su carrera. Se deberán llenar los datos de la dependencia donde se realizará el servicio social: nombre de la dependencia, dirección de su domicilio y nombre del responsable del programa.

![Interfaz para llenar Anexo 20](https://github.com/HLBrandon/servicio-social-itsmt-doc-generador/blob/9cd3eb032c1ab32f48e64db0740375be30c6c767/screenshots/captura-anexo-xx.jpeg)

## Plan de Trabajo

El estudiante podrá llenar la información del formulario, comenzando por sus datos personales: nombre completo, carrera, número de control y nombre del programa de servicio social. En la sección de datos de la institución, deberá proporcionar: nombre de la institución, dirección de su domicilio, nombre del contacto, puesto del contacto, área dentro de la institución o empresa, correo electrónico del contacto, teléfono del contacto y horarios de trabajo en los que se puede ser contactado.

![Interfaz para llenar Plan de trabajo](https://github.com/HLBrandon/servicio-social-itsmt-doc-generador/blob/9cd3eb032c1ab32f48e64db0740375be30c6c767/screenshots/captura-plan-trabajo.jpeg)

## Reportes Bimestrales

(Aún no implementado)

### Credenciales del Administrador
(Aún no implementado)
- Correo: programador@example.com
- Contraseña: Admin123