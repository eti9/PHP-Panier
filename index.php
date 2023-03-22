<?php
session_start();
require("./controleurs/ProduitControleurs.php");
require("./controleurs/UserControleurs.php");
require("./controleurs/HomeControleurs.php");
require("./controleurs/PanierControleurs.php");
require("./controleurs/FactureControleurs.php");

//On unset les cookies d'erreur pour la prochaine requete
if (isset($_COOKIE['erreurSQL']))
    setcookie('erreurSQL', '', 1);
if (isset($_COOKIE['success']))
    setcookie('success', '', 1);


//This is the base index
if (isset($_POST['Username']) && isset($_POST['Password'])) {
    postLoginAction($_POST['Username'], $_POST['Password']);
} else if (isset($_POST['facture'])) {
    transferPanierToFacture();
} else if (isset($_POST['action']) && isset($_POST['produitId'])) {
    //Cart action
    if ($_POST['action'] == 'add' && isset($_POST['nbItems']))
        ajoutPanier($_POST['produitId'], $_POST['nbItems']);
    else if ($_POST['action'] == 'delete') {
        removeProduitFromPanier($_POST['produitId']);
    } else if ($_POST['action'] == 'modify' && isset($_POST['nbItems'])) {
        modifyNumberOfAProductInCart($_POST['produitId'], $_POST['nbItems']);
    } else {
        afficherHomePage();
    }
} else if (isset($_POST['confirmedLogout'])) {
    logoutAction();
} else if (isset($_GET['login'])) {
    afficherFormLoggin();
} else if (isset($_GET['logout'])) {
    afficherFormLogout();
} else if (isset($_GET['liste'])) {
    afficherListeProduit();
} else if (isset($_GET['cart'])) {
    afficherPanier();
} else {
    afficherHomePage();
}