<?php
    session_start();
    if ($_SESSION) {

        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        $url = $environment->protocol . $environment->baseUrl;

        header('Location: ' . $url);
    } else {
        include "signup.php";
    }
?>