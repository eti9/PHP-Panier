<?php
require("modeles/ProduitModel.php");
function afficherListeProduit()
{
    $ProduitBD = new ProduitModel();
    $req = $ProduitBD->getListProduit();
    require("vues/listeProduitVue.php");
}