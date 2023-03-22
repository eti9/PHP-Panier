<?php ob_start() ?>
<!-- Design comes from  : https://bbbootstrap.com/snippets/bootstrap-ecommerce-category-product-list-page-93685579 -->
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <div class="d-flex justify-content-center">
                <h3 class="">Liste de nos super cables imbattables !</h3>
            </div>
            <tbody>
                <?php
                while ($produit = $req->fetch()) { ?>
                    <div class="row p-2 bg-white border rounded mb-2">
                        <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                src=<?= "./images/" . $produit['Image'] ?>></div>
                        <div class="col-md-6 mt-1">
                            <h5>
                                <?= $produit['Nom'] ?>
                            </h5>
                            <p class="text-justify para mb-0">
                                <?= $produit['Description'] ?><br><br>
                            </p>
                        </div>
                        <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                            <div class="d-flex flex-row align-items-center">
                                <h4 class="mr-1">
                                    <?= $produit['PrixUnitaire'] ?>$
                                </h4>
                            </div>
                            <span>
                                <?= $produit['NbDisponible'] . " en stock." ?>
                            </span>
                            <h6 class="text-success">Free shipping</h6>
                            <div class="d-flex flex-column mt-4">



                                <!-- Form to add  product to shopping card, not availaible if not connected -->
                                <?php if (isset($_SESSION['Username']) && $produit['NbDisponible'] > 0) { ?>
                                    <form class="form" action="" method="post">
                                        <div class="inline-block">
                                            <input type="hidden" name="action" value="add" />
                                            <input type="hidden" name="produitId" value=<?= $produit['ProduitID'] ?> />
                                            <label for="quantite" class="form-label">Quantité:</label>
                                            <input id="quantite" class="ml-2" name="nbItems" style="width:47px;" type="number"
                                                min="1" max=<?= $produit['NbDisponible'] ?> value="1"></input>
                                        </div>
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="submit">Ajouter au panier
                                        </button>
                                    </form>
                                    <?php
                                } ?>
                            </div>
                        </div>
                    </div>


                    <?php
                }
                $req->closeCursor();
                ?>
        </div>
    </div>
</div>
<div class="mb-3 ml-2 mr-3 d-flex justify-content-between font-weight-bold" style="font-size: 20px">
    <a href="?" class="active  text-md-left text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left pb-1"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg> Home
    </a>
    <?php if (isset($_SESSION['Username'])) { ?>
        <a href="?cart" class="active  text-md-right text-decoration-none">
            Panier
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-right"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z" />
            </svg>
        </a>
    <?php } ?>
</div>
<div class="mb-3 ml-2  text-md-right font-weight-bold" style="font-size: 20px">

</div>
<?php

$content = ob_get_clean(); ?>

<?php require('_layout.php'); ?>