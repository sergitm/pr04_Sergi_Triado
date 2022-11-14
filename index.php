<?php
/**
*
* @author: Sergi Triadó <s.triado@sapalomera.cat>
*
*/
session_start();

$env = json_decode(file_get_contents("environment/environment.json"));
$environment = $env->environment;

define('BASE_URL', $environment->protocol . $environment->baseUrl);

// Barra de navegació 

include "public/navbar.php";

// Controlador d'articles

include "templates/articles/articles.php";

?>