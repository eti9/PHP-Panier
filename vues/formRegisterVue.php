<?php ob_start(); ?>
<div class="d-flex justify-content-center">
    <h1 class="title">
        Créer un nouvel utilisateur
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
        <form class="form m-2" id="register" action="" method="post">

            <!-- Username input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Nom d'utilisateur</label>
                <input type="text" id="username" name="Username" class="form-control" required />
            </div>

            <!-- Prenom input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Prenom</label>
                <input type="text" id="prenom" name="Prenom" class="form-control" required />
            </div>

            <!-- Nom input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="username">Nom</label>
                <input type="text" id="nom" name="Nom" class="form-control" required />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Email</label>
                <input type="email" id="email" name="Email" class="form-control" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Mot de passe</label>
                <input type="password" id="password" name="Password" class="form-control" required />
            </div>

            <!-- Confirm Password input -->
            <div class="form-outline mb-4">
                <label class="form-label" for="password">Confirmer le mot de passe</label>
                <input type="password" id="confirmPassword" class="form-control" name="cPassword" />
                <div class="invalid-feedback">
                    Le mot de passe n'est pas indentique!
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" id="btnRegister" class="btn btn-primary btn-block mb-4" name="action"
                value="register">Créer un nouveau
                compte</button>

        </form>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('#btnRegister').on('click', function (e) {
            if ($('#confirmPassword').hasClass('is-invalid')) e.preventDefault();
        });
        $('#confirmPassword').on('keyup', function (e) {
            let mdp = $('#password').val();
            let cmdp = $('#confirmPassword').val();

            if (mdp != cmdp) {
                $('#confirmPassword').addClass('is-invalid');
            }
            else {
                $('#confirmPassword').removeClass('is-invalid');
            }
        });

    });
</script>
<?php
$content = ob_get_clean();
require("_layout.php");

?>