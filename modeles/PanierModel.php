<?php

require_once("BDContext.php");

class PanierModel extends BDContext
{

    function addItemToCart($produitID, $nbItems)
    {
        $username = $_SESSION['Username'];
        $bdd = $this->connexionBD();

        $req = $bdd->prepare('SELECT * FROM produit where ProduitID=:produitID and NbDisponible >= :NbItem');
        $req->execute(
            array(
                "produitID" => $produitID,
                "NbItem" => $nbItems
            )
        );
        if ($req->rowCount() == 0) {
            throw new Exception("Nombre d'item insuffisant ou produit innexistant");
        }


        //Check if panier exist
        $isPanierExist = $this->panierExist($produitID, $nbItems, $username);

        //Si l'item existe déjà dans le panier, on update la table
        if ($isPanierExist) {
            $req = $bdd->prepare("UPDATE panier SET NbItem = NbItem+:nbItem where ProduitID=:produitID and Username=:username");
            $req->execute(
                array(
                    "produitID" => $produitID,
                    "nbItem" => $nbItems,
                    "username" => $username
                )
            );
            if ($req->rowCount() == 0) {
                throw new Exception("Update non effectué");
            }

        } else {
            $req = $bdd->prepare("INSERT INTO panier (ProduitID, Nbitem, Username) VALUES (:produitID, :nbItem, :username)");
            $req->execute(
                array(
                    "produitID" => $produitID,
                    "nbItem" => $nbItems,
                    "username" => $username
                )
            );
            if ($req->rowCount() == 0) {
                throw new Exception("Insertion non effectué");
            }
        }


        $req = $bdd->prepare("UPDATE produit set NbDisponible = NbDisponible - :nbItem WHERE ProduitID =:produitID");
        $req->execute(
            array(
                "produitID" => $produitID,
                "nbItem" => $nbItems
            )
        );
        if ($req->rowCount() == 0) {
            throw new Exception("Update non effectué sur la table produit");
        }
        return;
    }

    function panierExist($produitID, $nbItems, $username)
    {
        $bdd = $this->connexionBD();
        //On regarde si le produit existe déjà dans le panier
        $req = $bdd->prepare('SELECT * FROM panier where ProduitID=:produitID and Username=:username');
        $req->execute(
            array(
                "produitID" => $produitID,
                "username" => $username
            )
        );
        return $req->rowCount() > 0 ? true : false;
    }
    function getAllProductPanier()
    {
        $bdd = $this->connexionBD();
        $req = $bdd->prepare('SELECT pp.ProduitID, pp.NbItem, pp.Username, pr.Nom, pr.Description, pr.NbDisponible, pr.Image, pr.PrixUnitaire, pr.PrixUnitaire*pp.NbItem as sous_total  FROM panier pp INNER JOIN produit pr ON pp.ProduitID = pr.ProduitID where pp.Username =:username');
        $req->execute(
            array(
                "username" => $_SESSION['Username']
            )
        );
        return $req;
    }
    function getPrixTotalPanier()
    {
        $bdd = $this->connexionBD();
        $req = $bdd->prepare('SELECT SUM(pr.PrixUnitaire*pp.NbItem) as total  FROM panier pp INNER JOIN produit pr ON pp.ProduitID = pr.ProduitID where pp.Username =:username');
        $req->execute(
            array(
                "username" => $_SESSION['Username']
            )
        );
        return $req;
    }

    function deleteProduitFromPanier($produitID)
    {
        $username = $_SESSION['Username'];
        $bdd = $this->connexionBD();
        $req = $bdd->prepare('SELECT NbItem from panier where ProduitID=:produitID and Username=:username');
        $req->execute(
            array(
                "produitID" => $produitID,
                "username" => $username
            )
        );
        if ($req->rowCount() == 0)
            throw new Exception("Item introuvable");


        $newReq = $bdd->prepare('UPDATE produit set NbDisponible=NbDisponible + :nbItem where ProduitID=:produitID');
        $newReq->execute(
            array(
                "nbItem" => $req->fetch()['NbItem'],
                "produitID" => $produitID
            )
        );

        $lastReq = $bdd->prepare('DELETE FROM panier where ProduitID=:produitID and Username=:username');
        $lastReq->execute(
            array(
                "produitID" => $produitID,
                "username" => $username
            )
        );
        if ($lastReq->rowCount() == 0)
            throw new Exception("Delete incomplet");

    }

}