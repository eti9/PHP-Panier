<?php


require("modeles/FactureModel.php");


function transferPanierToFacture()
{
    if (!isset($_SESSION['Username'])) {
        header('Location:?');
        die();
    }
    $factureModel = new FactureModel();
    try {
        $factureModel->transferPanierToFacture();
        setcookie('success', 'La facture a été créer!', time() + 10000);
    } catch (Exception $e) {
        setcookie('erreurSQL', $e->getMessage(), time() + 10000);
    }
    header("Location:?cart");
    die();
}