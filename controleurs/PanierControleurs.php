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
function removeProduitFromPanier($produitID)
{
    if (!isset($_SESSION['Username'])) {
        header('Location:?');
        die();
    }
    $panier = new PanierModel();
    try {
        $panier->deleteProduitFromPanier($produitID);
        setcookie('success', 'La suppression a bien été executé', time() + 10000);
    } catch (Exception $e) {
        setcookie('erreurSQL', $e->getMessage(), time() + 10000);
    }
    header('Location:?cart');
    die();
}
function modifyNumberOfAProductInCart($produitID, $nbItem)
{
    if (!isset($_SESSION['Username'])) {
        header('Location:?');
        die();
    }
    if ($nbItem <= 0) {
        header('Location:?cart');
        die();
    }
    $panier = new PanierModel();
    try {
        $panier->modifyNumberOfOneItemInCart($produitID, $nbItem);
        setcookie('success', 'La modification a bien été executé', time() + 10000);
    } catch (Exception $e) {
        setcookie('erreurSQL', $e->getMessage(), time() + 10000);
    }
    header('Location:?cart');
    die();
}