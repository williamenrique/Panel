<?php
const BASE_URL = "http://panel.lat/";
const HEAD = "src/include/head.php";
const FOOTER = "src/include/footer.php";
//const BACK_URL = $_SERVER['REQUEST_URI'];
const LIBS = "system/core/Libraries/";
const VIEWS = "system/app/Views/";
const titulo = "Tienda Virtual en construccion";
date_default_timezone_set('America/Caracas');

//rutas de assets
const CSS = BASE_URL."src/css/";
const JS = BASE_URL."src/js/";
const IMG = BASE_URL."src/images/";
//constantes del template admin
const PLUGINS = BASE_URL."src/plugins/";

const CONTROLLER = BASE_URL."system/core/Libraries/Controllers.php";
const LOAD = BASE_URL."system/core/Libraries/Load.php";

//constantes de base de datos
const DB_HOST = "localhost";
const DB_USER = "root";
const DB_PASS = "";
const DB_NAME = "db_personal";
const DB_CHARSET = "charset=utf8";
//constantes de encriptacion
define('METHOD','AES-256-CBC');
define('SECRET_KEY','$P@n3lP3r50n@l');
define('SECRET_IV','101712');