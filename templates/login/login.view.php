<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../public/styles/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="../../public/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="../../public/fontawesome/css/brands.css" rel="stylesheet">
    <link href="../../public/fontawesome/css/solid.css" rel="stylesheet">
    <link href="../../public/styles/estils.css" rel="stylesheet">
    <title>Log In</title>
</head>
<body>
    <?php 
        $env = json_decode(file_get_contents("../../environment/environment.json"));
        $environment = $env->environment;
        
        define('BASE_URL', $environment->protocol . $environment->baseUrl);

        include "../../public/navbar.php"; 
    ?>
    <div class="container bg-light rounded" style="max-width: 30%;">
        <h1>Log In</h1>
        <div class="form-inline justify-content-center">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="container">
                <div class="form-group row mb-1">
                    <label class="col align-self-center">Introdueix el teu nom d'usuari o email: </label>
                    <input type="text" class="form-control col-12 <?php echo (isset($errors['identifier']['missing'])) ? 'is-invalid' : '' ?>" name="identifier" placeholder="Nom d'usuari o email" 
                        value="<?php echo (empty($_POST['identifier'])) ? '' : $_POST['identifier'] ?>">
                </div>
                <div class="form-group row mb-1">
                    <label class="col align-self-center">Introdueix la teva contrasenya: </label>
                    <input type="password" class="form-control col-12 <?php echo (isset($errors['pwd']['missing'])) ? 'is-invalid' : '' ?>" name="pwd" placeholder="Password">
                </div>
                    <ul style="list-style-type: none;">
                        <small class="<?php echo
                            (isset($errors['identifier']['missing']) || 
                            isset($errors['pwd']['missing'])) ? 'text-danger' : 'text-info' ?>"><li class="col">*Els camps que es posin vermells són obligatoris.</li></small>
                    </ul>
                <div class="container d-inline-flex justify-content-start mb-3">
                    <a href="../pwd_recover.php" class="align-self-center">No recordes la contrasenya? Recupera-la</a>
                </div>
                <div class="container d-inline-flex justify-content-between mb-3">
                    <a href="signup.php" class="align-self-center">No tens compte? Registra't!</a>
                    <input type="submit" class="btn btn-dark align-self-center" name="login " value="Entrar">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>