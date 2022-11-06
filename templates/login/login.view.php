<?php

    $errors = array();
    include "../../model/validator.php";
    
    if(!empty($_POST['registrar'])){
        if(empty($_POST['username'])){
            $errors['username']['missing'] = true;
        } else {
            (Validator::usernameExists($_POST['username'])) ? $errors['username']['exists'] = true : "";
        }

        if(empty($_POST['pwd'])){
            $errors['pwd']['missing'] = true;
        } else {
            $pattern = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])(?=\S*[\W])\S*$/';

            (!preg_match($pattern, $_POST['pwd'])) ? $errors['pwd']['invalid'] = true : "";
            (empty($_POST['pwdRepeat'])) ? $errors['pwdR']['missing'] = true : "";
            (!empty($_POST['pwdRepeat']) && ($_POST['pwd'] !== $_POST['pwdRepeat'])) ? $errors['pwd']['unmatch'] = true : "";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label>Introdueix un nom d'usuari: </label><br>
        <input type="text" name="username" placeholder="Username"><br>
        <label>Introdueix la teva contrasenya: </label><br>
        <input type="password" name="pwd"><br>
        <label>Torna a escriure la contrasenya: </label><br>
        <input type="password" name="pwdRepeat">
        <ul>
            <small style="<?php echo empty($errors['pwd']) ? 'color:green' : 'color:red' ?>">
                <li>Ha de tenir 8 caràcters mínim.</li>
            </small>    
            <small style="<?php echo empty($errors['pwd']) ? 'color:green' : 'color:red' ?>">
                <li>Ha de combinar números, lletres i símbols.</li>
            </small>
        </ul>
        <input type="submit" name="registrar" value="Enregistrar">
    </form>
</body>
</html>