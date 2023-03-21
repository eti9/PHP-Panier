<?php
require("modeles/UserModel.php");
function afficherFormLoggin()
{
    require("vues/formLogin.php");
}

function postLoginAction($username, $password)
{
    $user = new UserModel();
    $req = $user->authenticate($username, $password);
    if ($req->rowCount() == 0) {
        setcookie('erreurLogin', "Nom d'utilisateur ou mot de passe incorrect", time() + 10000000);
        header("Location: ?login");
        die();
    } else {
        $user = $req->fetch();
        $_SESSION['Username'] = $user['Username'];
        $_SESSION['Prenom'] = $user['Prenom'];
        $_SESSION['Nom'] = $user['Nom'];
        header("Location:/");
        die();
    }
}