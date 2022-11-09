<?php
    if (isset($_SESSION['username'])) {

        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        $url = $environment->protocol . $environment->baseUrl;

        header('Location: ' . $url);
    } else {
        if (!empty($_POST['login'])) {
            
            $errors = array();

            (empty($_POST['identifier'])) ? $errors['identifier']['missing'] = true : "";

            (empty($_POST['pwd'])) ? $errors['pwd']['missing'] = true : "";
        }

        include "login.view.php";

        if(!empty($_POST['login']) && empty($errors)){

            include "../../model/http.request.php";
            $counter ??= 0;

            $http = new HttpRequest();
            $environment = $http->getEnvironment();
            $url = $environment->protocol . $environment->baseUrl . $environment->dir->modules->api->usuari->read;

            $data = array(
                'identifier' => $_POST['identifier'],
                'pwd' => password_hash($_POST['pwd'], PASSWORD_BCRYPT)
            );
            
            $res = $http->makePostRequest($url, $data);

            if ($res !== null) {
                if($res->auth){

                    session_start();
                    $_SESSION['username'] = $res->username;
                    header("Location: " . $environment->protocol . $environment->baseUrl);

                } else {
                    print "<h1 class='text-danger' style='text-align:center'>" . $res->missatge . "</h1>";
                }
            } else {
                print "<h1 class='text-danger' style='text-align:center'>Hi ha hagut un error amb el procés d'autenticació</h1>";
            }
        }
    }
