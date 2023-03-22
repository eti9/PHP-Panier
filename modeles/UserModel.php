<?php
require_once("BDContext.php");
class UserModel extends BDContext
{
    function authenticate($username, $password)
    {
        $bdd = $this->connexionBD();
        $req = $bdd->prepare('SELECT Username, Nom, Prenom FROM user WHERE username =:username AND password =:password');
        $req->execute(
            array(
                "username" => $username,
                "password" => $password
            )
        );
        return $req;
    }
    function addUser($username, $password, $prenom, $nom, $email)
    {
        if ($this->userExist($username))
            throw new Exception("Utilisateur déjà existant");

        $bdd = $this->connexionBD();

        $req = $bdd->prepare("INSERT INTO  user (Username, Password, Prenom, Nom, Email) Values (:username, :password,:prenom, :nom, :email)");
        $req->execute(
            array(
                "username" => $username,
                "password" => $password,
                "prenom" => $prenom,
                "nom" => $nom,
                "email" => $email
            )
        );
        if ($req->rowCount() == 0)
            throw new Exception("Erreur pendant la création de l'utilisateur");
    }
    function userExist($username)
    {
        $bdd = $this->connexionBD();
        $req = $bdd->prepare("SELECT Username FROM user WHERE username =:username");
        $req->execute(
            array(
                "username" => $username
            )
        );
        return $req->rowCount() > 0;
    }
}