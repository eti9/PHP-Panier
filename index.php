<?php
require("./controleurs/ProduitControleurs.php");
require("./controleurs/UserControleurs.php");

//This is the base index
if (isset($_POST['Username']) && isset($_POST['Password'])) {
    postLoginAction($_POST['Username'], $_POST['Password']);
} else if (isset($_GET['login'])) {
    afficherFormLoggin();
} else {
    afficherListeProduit();
}