<?php

    require_once "../../config/database.php";
    require_once "../../../model/user.php";
    require_once "../../control/control_usuaris.php";

    $data = $_POST;

    if (!empty($data['username']) && !empty($data['pwd']) && !empty($data['email'])) {
        if (!ControlUsuaris::user_exists($data['username'],$data['email'])) {
            $user = new Usuari($data['username'], $data['pwd'], $data['email']);

            $res = $user->create();

            $missatge = ($res) ? "Usuari creat" : "Alguna cosa ha fallat, és possible que l'usuari ja existeixi";
        }
    } else {
        $missatge = "Les dades no són vàlides";
    }

    echo json_encode(array(
        'message' => $missatge
    ));
?>