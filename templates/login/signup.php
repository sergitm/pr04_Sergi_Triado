<?php

    $errors = array();
    include "../../model/validator.php";

    // var_dump($_POST);
    if(!empty($_POST['registrar'])){
        if(empty($_POST['username'])){
            $errors['username']['missing'] = true;
        } else {
            (Validator::usernameExists($_POST['username'])) ? $errors['username']['exists'] = true : "";
        }

        (empty($_POST['pwdRepeat'])) ? $errors['pwdR']['missing'] = true : "";

        if (empty($_POST['email'])) {
            $errors['email']['missing'] = true;
        } else {
            $emailPattern = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
            (!preg_match($pattern, $_POST['email'])) ? $errors['email']['invalid'] = true : "";
            (Validator::emailExists($_POST['email'])) ? $errors['email']['exists'] = true : "";
        }

        if(empty($_POST['pwd'])){
            $errors['pwd']['missing'] = true;
        } else {
            $pattern = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/';

            (!preg_match($pattern, $_POST['pwd'])) ? $errors['pwd']['invalid'] = true : "";
            (!empty($_POST['pwdRepeat']) && ($_POST['pwd'] !== $_POST['pwdRepeat'])) ? $errors['pwd']['unmatched'] = true : "";
            
            echo $_POST['pwdRepeat'];
            echo $_POST['pwd'];
        }
    }

    include "signup.view.php";

    if(!empty($_POST['registrar']) && empty($errors)){
        $http = new HttpRequest();
        $environment = $http->getEnvironment();

        $data = array(
            'username' => $_POST['username'],
            'pwd' => password_hash($_POST['pwd'], PASSWORD_BCRYPT));

        $url = $environment->protocol . $environment->baseUrl . $environment->dir->modules->api->usuari->create;
        $res = $http->makePostRequest($url, $data);
    }
?>

