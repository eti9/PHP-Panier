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
}