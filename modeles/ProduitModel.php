<?php
require_once("BDContext.php");

class ProduitModel extends BDContext
{
    function getListProduit()
    {
        $bdd = $this->connexionBD();
        $req = $bdd->query('SELECT * FROM produit ORDER BY Nom ');
        return $req;
    }
}