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
    <div class="container bg-light rounded">
        <h1>Formulari de registre</h1>
        <div class="form-inline justify-content-center">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div>
                <div class="form-group row mb-1">
                    <label class="col">Introdueix un nom d'usuari: </label>
                    <input type="text" class="form-control col-5" name="username" placeholder="Username" 
                        value="<?php echo (empty($_POST['username'])) ? '' : $_POST['username'] ?>">
                    <?php if(isset($errors['username']['missing'])) : ?>
                        <small class="text-danger">*</small>
                    <?php endif; ?>
                </div>
                <div class="form-group row mb-1">
                    <label class="col">Introdueix el teu email: </label>
                    <input type="text" class="form-control col-5" name="email" placeholder="Adreça electrònica"
                        value="<?php echo (empty($_POST['email'])) ? '' : $_POST['email'] ?>">
                </div>
                <div class="form-group row mb-1">
                    <label class="col">Introdueix la teva contrasenya: </label>
                    <input type="password" class="form-control col-5" name="pwd" placeholder="Password">
                    <?php if(isset($errors['pwd']['missing'])) : ?>
                        <small class="text-danger">*</small>
                    <?php endif; ?>
                </div>
                <div class="form-group row mb-1">
                    <label class="col">Torna a escriure la contrasenya: </label>
                    <input type="password" class="form-control col-5" name="pwdRepeat" placeholder="Repeteix la password">
                    <?php if(isset($errors['pwdR']['missing'])) : ?>
                            <small class="text-danger">*</small>
                    <?php endif; ?>
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
                            isset($errors['pwdR']['missing'])) ? 'text-danger' : 'text-info' ?>"><li class="col-10">Els camps amb * són obligatoris.</li></small> 
                    
                        <small class="<?php echo empty($errors['pwd']) ? 'text-info' : 'text-danger' ?>">
                            <li class="col-10">La contrasenya ha de tenir 8 caràcters mínim.</li>
                        </small>  
                        <small class="<?php echo empty($errors['pwd']) ? 'text-info' : 'text-danger' ?>">
                            <li class="col-10">La contrasenya ha de combinar números, lletres i símbols.</li>
                        </small>
                    </ul>
                <input type="submit" class="btn btn-primary float-right" name="registrar" value="Enregistrar-se">
            </div>
            </form>
        </div>
    </div>
</body>
</html>