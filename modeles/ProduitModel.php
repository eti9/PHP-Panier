<?php
class ProduitModel extends BDContext
{
    function getListProduit()
    {
        $bdd = connexionBD();
        $req = $bdd->query('SELECT * FROM produit');
        return $req;
    }
}