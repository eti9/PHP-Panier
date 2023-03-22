<?php
require_once("BDContext.php");
require_once("PanierModel.php");
class FactureModel extends BDContext
{
    function transferPanierToFacture()
    {
        $bdd = $this->connexionBD();
        $factureID = $bdd->query('SELECT COUNT(FactureID) as count FROM facture group by FactureID')->rowCount() + 1;
        $panierModel = new PanierModel();

        //Get an array of all the product from the user connected
        $allProductFromCart = $panierModel->getAllProductPanier()->fetchAll();

        //Then transfer it into facture
        foreach ($allProductFromCart as $panier) {
            $req = $bdd->prepare('INSERT INTO facture (FactureID, ProduitID, Username, NbItem, DateAchat) VALUES (:factureID, :produitID, :username, :nbItem, now())');
            $req->execute(
                array(
                    "factureID" => $factureID,
                    "produitID" => $panier['ProduitID'],
                    "username" => $panier['Username'],
                    "nbItem" => $panier['NbItem']
                )
            );
        }

        //Then delete them from facture
        $req = $bdd->prepare('DELETE FROM panier WHERE Username=:username ');
        $req->execute(array('username' => $_SESSION['Username']));
    }
}