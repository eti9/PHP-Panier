<?php
require("modeles/PanierModel.php");

function ajoutPanier($produitID, $nombreItem)
{
    //Erreur handling
    if (!isset($_SESSION['Username'])) {
        header('Location:?liste');
        die();
    }
    if ($nombreItem < 0) {
        header('Location:?liste');
        die();
    }
    $panier = new PanierModel();
    try {
        $panier->addItemToCart($produitID, $nombreItem);
        setcookie('success', "L'ajout a été effectué", time() + 10000);
    } catch (Exception $e) {
        setcookie('erreurSQL', $e->getMessage(), time() + 1000000);
    }
    header('Location:?liste');
    die();

}

function afficherPanier()
{
    if (!isset($_SESSION['Username'])) {
        header('Location:?');
        die();
    }
    $panier = new PanierModel();
    $reqAllProduit = $panier->getAllProductPanier();
    $produitCount = $reqAllProduit->rowCount();
    $total = $panier->getPrixTotalPanier()->fetch()['total'];
    require("vues/panierVue.php");
}