<?php
/*
HOME PAGE THIS IS THE PAGE LOADED BY DEFAULT
*/


ob_start();
?>


<div class="container">
    <div class="card justify-content-center m-5 p-5">
        <h1> Bonjour sur CableNet </h1>
        <h2> Ceci est une démo d'un site où l'on peut ajouter des items au panier et afficher ses items.</h2>
        <p> Ce site a été créer dans le cadre du cours de WEB dans la 4 session <br>
            de l'AEC POO et Technologie Web au cégep Rosemeont </p>

        <p> Action possible :</p>
        <ul>
            <li><a href="?liste" class="link"> Liste des produits</a></li>
            <?php if (isset($_SESSION['Username'])) { ?>
                <li><a href="?logout" class="link"> Se déconnecter</a></li>
                <li><a href="?cart" class="link"> Consulter son panier</a></li>
            <?php } else { ?>
                <li><a href="?login" class="link"> Se connecter</a> ou <a href="?register" class="link"> s'inscrire</a></li>
            <?php } ?>
        </ul>
    </div>
</div>
<?php if (!isset($_COOKIE['theme'])) {
    header('Location:/');
}
if ($_COOKIE['theme'] == "stPat") { ?>
    <div class="col-md-3 text-left">
        <a href="?toNormal"><img src="./images/trefle.webp" alt=""
                class="img-fluid d-none d-md-block rounded mb-2 shadow "></a>
        <p>Cliquez pour changer le thème!</p>
    </div>
<?php } else { ?>
    <div class="col-md-3 text-left">
        <a href="?toStPat"><img src="./images/normal.jpg" alt=""
                class="img-fluid d-none d-md-block rounded mb-2 shadow "></a>
        <p>Cliquez pour changer le thème!</p>
    </div>

<?php }

$content = ob_get_clean();
require("_layout.php");

?>