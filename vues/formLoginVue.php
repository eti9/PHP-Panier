<!-- Login form bootstrap from https://mdbootstrap.com/docs/standard/extended/login/ -->
<?php ob_start(); ?>
<div class="d-flex justify-content-center">
    <h1 class="title">
        Bienvenue!
    </h1>
</div>
<div class="d-flex justify-content-center">
    <div class="card m-5 center-card" style="width: 50%">
        <div class="d-flex justify-content-center">
            <span class="text-danger">
                <?php if (isset($_COOKIE['erreurLogin']))
                    echo $_COOKIE['erreurLogin']; ?>
            </span>
        </div>
        <form class="form m-2" action="" method="post">
            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="Username" class="form-control" />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="Password" class="form-control" />

            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Se connecter</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Pas encore membre? <a href="?register">S'inscrire</a></p>
            </div>
        </form>
    </div>
</div>
<?php
if (isset($_COOKIE['erreurLogin']))
    setcookie('erreurLogin', '', 1);
$content = ob_get_clean();
require("_layout.php");

?>