<?php ob_start() ?>
<div class="container d-flex justify-content-center m-5">
    <div class="card card-center p-3" style="width: 60%">
        <h3>Êtes-vous sûr de vouloir vous déconnecter?</h3>
        <form action="" method="post" class="form">
            <input type="hidden" name="confirmedLogout" value="true" />
            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-primary m-2" value="Oui" />
                <a class="btn btn-primary m-2" href="/">Non</a>
            </div>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require("_layout.php");
?>