<?php
/**
*
* @author: Sergi Triadó <s.triado@sapalomera.cat>
*
*/
    ini_set('session.gc_maxlifetime', 1800);
    session_set_cookie_params(1800);
    session_start();

    if (isset($_SESSION['username'])) {

        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        $url = $environment->protocol . $environment->baseUrl;

        
        setcookie(session_name(),'',0,'/');
        session_destroy();
        session_write_close();

        header('Location: ' . $url);
    } else {
        if (!empty($_POST['login'])) {
            
            $errors = array();

            (empty($_POST['identifier'])) ? $errors['identifier']['missing'] = true : "";

            (empty($_POST['pwd'])) ? $errors['pwd']['missing'] = true : "";
        }

        include "login.view.php";

        if (isset($_SESSION['tries']) && $_SESSION['tries'] > 2) {
            include "recaptcha.php";
        }

        if(!empty($_POST['login']) && empty($errors)){

            include "../../model/http.request.php";
            $_SESSION['tries'] ??= 0;

            $http = new HttpRequest("../../environment/environment.json");
            $environment = $http->getEnvironment();
            $url = $environment->protocol . $environment->baseUrl . $environment->dir->modules->api->usuari->read;

            $data = array(
                'login' => true,
                'identifier' => $_POST['identifier']
            );
            
            $res = $http->makePostRequest($url, $data);
            
            if ($res !== null) {
                if($res->auth){
                    if(password_verify($_POST['pwd'], $res->phash)){

                        session_regenerate_id(true);
                        $_SESSION = array();
                        $_SESSION['username'] = ucwords(strtolower($res->username));
                        
                        header("Location: " . $environment->protocol . $environment->baseUrl);
                    } else {
                        $_SESSION['tries']++;
                        print "<h1 class='text-danger' style='text-align:center'>Contrasenya incorrecta</h1>";
                    }

                } else {
                    print "<h1 class='text-danger' style='text-align:center'>" . $res->missatge . "</h1>";
                }
            } else {
                print "<h1 class='text-danger' style='text-align:center'>Hi ha hagut un error amb el procés d'autenticació</h1>";
            }
        }
    }
