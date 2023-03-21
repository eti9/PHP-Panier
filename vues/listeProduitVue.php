<?php ob_start() ?>
<!-- Design comes from  : https://bbbootstrap.com/snippets/bootstrap-ecommerce-category-product-list-page-93685579 -->
<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-center row">
        <div class="col-md-10">
            <tbody>
                <?php
                while ($produit = $req->fetch()) { ?>
                    <div class="row p-2 bg-white border rounded">
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
                                <?php if (isset($_SESSION['Username'])) { ?>
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
                                <?php } ?>
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

<?php

$content = ob_get_clean(); ?>

<?php require('_layout.php'); ?>