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
<div class="mb-3 ml-2  text-md-left font-weight-bold" style="font-size: 20px">
    <a href="?" class="active text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-arrow-left pb-1"
            viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
        </svg> Home
    </a>
</div>
<?php
$content = ob_get_clean();
require("_layout.php");
?>