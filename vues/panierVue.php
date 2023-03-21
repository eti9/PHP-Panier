<?php ob_start(); ?>
<link rel="stylesheet" href="style/shopping-cart.css" />
<!-- https://bootstraptor.com/snippets/bootstrap-4-snippet-shopping-cart/ -->
<!-- 
  Bootstrap docs: https://getbootstrap.com/docs
  Get more snippet on https://bootstraptor.com/snippets
-->

<section class="pt-5 pb-5">
    <div class="container">
        <div class="row w-100">
            <div class="col-lg-12 col-md-12 col-12">
                <h3 class="display-5 mb-2 text-center">Panier d'achat</h3>
                <p class="mb-5 text-center">
                    <i class="text-info font-weight-bold">
                        <?= $produitCount ?>
                    </i> produit dans votre panier
                </p>
                <?php if ($produitCount > 0) { ?>

                    <table id="shoppingCart" class="table table-condensed table-responsive">
                        <thead>
                            <tr>
                                <th style="width:60%">Produit</th>
                                <th style="width:12%">Sous-total</th>
                                <th style="width:10%">Quantité</th>
                                <th style="width:16%"></th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php while ($produit = $reqAllProduit->fetch()) { ?>


                                <!-- TEMPLATE PRODUIT -->
                                <tr>
                                    <td data-th="Produit" style="width:60%">
                                        <div class="row">

                                            <!-- IMAGE -->
                                            <div class="col-md-3 text-left">
                                                <img src=<?= "./images/" . $produit['Image'] ?> alt=""
                                                    class="img-fluid d-none d-md-block rounded mb-2 shadow ">
                                            </div>

                                            <!-- NOM -->
                                            <div class="col-md-9 text-left mt-sm-2">
                                                <h4>
                                                    <?= $produit['Nom'] ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </td>

                                    <!-- TOTAL -->
                                    <td data-th="Sous-total" style="width:12%">
                                        <?= $produit['sous_total'] ?>$
                                    </td>

                                    <!-- FORM MODIFICATION NOMBRE -->
                                    <td data-th="Quantité" style="width:10%">
                                        <form class="formModify" method="post">
                                            <input type="hidden" name="produitId" value=<?= $produit['ProduitID'] ?>>
                                            <input type="number" class="form-control form-control-lg text-center p-1"
                                                value=<?= $produit['NbItem'] ?> min=1 max=<?= $produit['NbItem'] + $produit['NbDisponible'] ?> name="nbItems">
                                            <button id=<?= "btnModif" . $produit['ProduitID'] ?> type="submit" name="action"
                                                value="modify" class="btn btn-warning m-2 p-2" hidden>Confirmer</button>
                                        </form>
                                    </td>

                                    <!-- FORM SUPPRESSION -->
                                    <td class="actions" data-th="" style="width:16%">
                                        <div class="text-right">
                                            <form method="post">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="produitId" value=<?= $produit['ProduitID'] ?>>
                                                <button type="submit"
                                                    class="btn btn-white border-secondary bg-white btn-lg mb-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>



                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>


                    <!-- TOTAL DE TOUT LES PRODUITS -->
                    <div class="float-right text-right">
                        <h4>Total</h4>
                        <h1>
                            <?= $total ?>$
                        </h1>
                    </div>
                <?php } ?>



            </div>
        </div>
        <?php if ($produitCount > 0) { ?>
            <div class="row mt-4 d-flex align-items-center">

                <!-- CONFIRMER LES ACHATS -->
                <div class="col-sm-6 order-md-2 text-right">
                    <a href="?" class="btn btn-primary mb-4 btn-lg pl-5 pr-5">Confirmer les achats</a>
                </div>


                <!-- RETOUR A A LA LISTE -->
                <div class="col-sm-6 mb-3 mb-m-1 order-md-1 text-md-left font-weight-bold" style="font-size: 20px">
                    <a href="?liste" class="active text-decoration-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-arrow-left pb-1" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg> Continuer de
                        magasiner
                    </a>
                </div>

            </div>
        <?php } ?>
    </div>
</section>
<script>
    $('document').ready(function () {
        //$('.formModify button').attr('hidden', true);

        $('.formModify input[name="nbItems"]').on('change', function () {
            if ($(this).parent().children('button').is(':hidden')) {
                $(this).parent().children('button').attr('hidden', false);
            }
        });
    });
</script>

<?php
$content = ob_get_clean();

require("_layout.php"); ?>