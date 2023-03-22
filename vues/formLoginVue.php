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
                <?php if (isset($_COOKIE['erreurCreate']))
                    echo $_COOKIE['erreurCreate']; ?>
            </span>
        </div>
        <form class="form m-2 needs-validation" action="" method="post">
            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="Username" class="form-control" required />

            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="Password" class="form-control" required />

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
<div class="mb-3 ml-2  text-md-left font-weight-bold" style="font-size: 20px">
    <a href="?" class="active text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left pb-1"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg> Home
    </a>
</div>
<?php
if (isset($_COOKIE['erreurLogin']))
    setcookie('erreurLogin', '', 1);
$content = ob_get_clean();
require("_layout.php");

?>