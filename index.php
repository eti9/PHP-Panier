<?php
session_start();
require("./controleurs/ProduitControleurs.php");
$_SESSION['Username'] = 'test';

//This is the base index
if (isset($_POST['Username']) && isset($_POST['Password'])) {

} else if (isset($_GET['login'])) {
    afficherFormLoggin();
} else {
    afficherListeProduit();
}