#SISTEMA DE RECURSOS HUMANOS.
Version 1.0
fase beta

observaciones: faltó el desarrollo de filtrado y consulta para generar los listados.
La tabla de empleados se recomienda partirla en varias (normalizarla) es muy grande.
La tabla de accion de personal contiene un campo tinyint numerica y se persigue que se refleje el usuario que realiza la accion, lo recomendable es un campo varchar, que se autogenera con la variable $__SESSION[usrname]. 
Examen muy largo, porque se tubo que arrancar de cero y se invirtió cuatro dias de desarrollo.
Tiene pulgas, falta optimizar y generar algunas pantallas de usuario normal.

Las pantallas de gestor, estan completas, pero falta algunas mejoras.

