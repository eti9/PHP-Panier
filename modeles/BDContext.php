<?php
class BDContext
{
    function connexionBD()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=php-panier;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}