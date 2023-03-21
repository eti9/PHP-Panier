<?php
require("modeles/ProduitModel.php");
function afficherListeProduit()
{
    $ProduitBD = new ProduitModel();
    $req = $ProduitBD->getListProduit();
    require("vues/listeProduitVue.php");
}
function afficherFormLoggin()
{
    require("vues/formLogin.php");
}