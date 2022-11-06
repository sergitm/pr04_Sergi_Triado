<nav class="navbar navbar-dark bg-dark">
    <ul class="nav navbar-nav">
        <li class="nav-items">
            <a class="nav-link active mx-5" href="<?php echo BASE_URL ?>">Home</a>
        </li>
    </ul>
    <ul class="nav navbar-nav">
        <li class="nav-item">
            <?php if(isset($_SESSION['username'])) : ?>
                <div class="nav-link active mx-5">Hola, <?php echo $_SESSION['username'] ?> (<a href="templates/login/login.php?logout=true">Surt</a>)</div>
            <?php else : ?>
                <a class="nav-link active mx-5 fa-solid fa-user" href="templates/login/login.php">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>