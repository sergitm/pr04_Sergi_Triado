<?php
    if (isset($_GET['logout'])) {
        
        ($_GET['logout'] === 'true') ? session_destroy() : "";

        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        $url = $environment->protocol . $environment->baseUrl;

        header('Location: ' . $url);
    }
    if (isset($_SESSION['username'])) {

        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        $url = $environment->protocol . $environment->baseUrl;

        header('Location: ' . $url);
    } else {
        
        include "login.view.php";
    }
?>