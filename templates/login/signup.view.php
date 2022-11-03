<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../public/styles/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../public/styles/bootstrap/js/bootstrap.bundle.min.js"></script>
    <link href="../../public/styles/estils.css" rel="stylesheet">
    <title>Sign Up</title>
</head>
<body>
<?php include "../../public/navbar.php"; ?>
    <div class="container bg-light rounded">
        <h1>Formulari de registre</h1>
        <div class="form-inline justify-content-center">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div>
                <div class="form-group row mb-1">
                    <label class="col-7 justify-content-end">Introdueix un nom d'usuari: </label>
                    <input type="text" class="form-control col-5 <?php echo (isset($errors['username']['missing'])) ? 'is-invalid' : '' ?>" name="username" placeholder="Username" 
                        value="<?php echo (empty($_POST['username'])) ? '' : $_POST['username'] ?>">
                </div>
                <div class="form-group row mb-1">
                    <label class="col-7 justify-content-end">Introdueix el teu email: </label>
                    <input type="text" class="form-control col-5 <?php echo (isset($errors['email']['missing'])) ? 'is-invalid' : '' ?>" name="email" placeholder="Adreça electrònica"
                        value="<?php echo (empty($_POST['email'])) ? '' : $_POST['email'] ?>">
                </div>
                <div class="form-group row mb-1">
                    <label class="col-7 justify-content-end">Introdueix la teva contrasenya: </label>
                    <input type="password" class="form-control col-5 <?php echo (isset($errors['pwd']['missing'])) ? 'is-invalid' : '' ?>" name="pwd" placeholder="Password">
                </div>
                <div class="form-group row mb-1">
                    <label class="col-7 justify-content-end">Torna a escriure la contrasenya: </label>
                    <input type="password" class="form-control col-5 <?php echo (isset($errors['pwdR']['missing'])) ? 'is-invalid' : '' ?>" name="pwdRepeat" placeholder="Repeteix la password">
                </div>
                    <ul style="list-style-type: none;">
                        <?php if(isset($errors['pwd']['invalid'])) : ?>
                                <small class="text-danger"><li class="col-10">La contrasenya no compleix els requisits.</li></small>
                        <?php endif; ?>
                        <?php if(isset($errors['pwd']['unmatched'])) : ?>
                                <small class="text-danger"><li class="col-10">La contrasenya no coincideix.</li></small>
                        <?php endif; ?>
                        <small class="<?php echo
                            (isset($errors['username']['missing']) ||
                            isset($errors['email']['missing']) || 
                            isset($errors['pwd']['missing']) || 
                            isset($errors['pwdR']['missing'])) ? 'text-danger' : 'text-info' ?>"><li class="col-10">Els camps que es posin vermells són obligatoris.</li></small> 
                    
                        <small class="<?php echo empty($errors['pwd']['invalid']) ? 'text-info' : 'text-danger' ?>">
                            <li class="col-10">La contrasenya ha de tenir 8 caràcters mínim.</li>
                        </small>  
                        <small class="<?php echo empty($errors['pwd']['invalid']) ? 'text-info' : 'text-danger' ?>">
                            <li class="col-10">La contrasenya ha de combinar números, lletres i símbols.</li>
                        </small>
                    </ul>
                <div class="d-flex">
                    <a href="login.php" class="mr-auto align-self-center">Ja tens compte? Entra!</a>
                    <input type="submit" class="btn btn-primary align-self-center" name="registrar" value="Enregistrar-se">
                </div>
            </div>
            </form>
        </div>
    </div>
</body>
</html>