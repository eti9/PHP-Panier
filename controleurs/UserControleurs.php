<?php
require("modeles/UserModel.php");


//LOGIN
function afficherFormLoggin()
{
    if (isset($_SESSION['Username'])) {
        header('Location:/');
        die();
    }
    require("vues/formLoginVue.php");
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

//LOGOUT
function afficherFormLogout()
{
    if (!isset($_SESSION['Username'])) {
        header('Location:/');
        die();
    }
    require("vues/formLogoutVue.php");
}
function logoutAction()
{
    if (isset($_SESSION['Username']))
        unset($_SESSION['Username']);
    if (isset($_SESSION['Prenom']))
        unset($_SESSION['Prenom']);
    if (isset($_SESSION['Nom']))
        unset($_SESSION['Nom']);
    header("Location:/");
    die();
}