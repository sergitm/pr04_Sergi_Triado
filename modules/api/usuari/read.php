<?php 
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, X-Requested-With');
    header('Content-Type: application/json');

    require_once "../../config/database.php";
    require_once "../../../model/user.php";
    require_once "../../control/control_usuaris.php";

    if (!empty($_POST['identifier']) && !empty($_POST['pwd'])) {
        if(ControlUsuaris::user_auth($_POST['identifier'], $_POST['pwd'])){
            $res = array(
                'auth' => true,
                'username' => $_POST['username']
            );
        } else {
            $res = array(
                'auth' => false,
                'missatge' => "Identificador o contrasenya incorrecte/a"
            );
        }

    } else {
        $res = array(
            'missatge' => "Falten dades per autenticar l'usuari"
        );
    }

    echo json_encode($res);
?>