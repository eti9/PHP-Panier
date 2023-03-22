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

        $allProductFromCart = $panierModel->getAllProductPanier()->fetchAll();
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
        $req = $bdd->prepare('DELETE FROM panier WHERE Username=:username ');
        $req->execute(array('username' => $_SESSION['Username']));
    }
}