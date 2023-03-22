<?php ob_start(); ?>
<div class="container justify-content-center">
    <h1 class="text-center"> CREATION RÉUSSIT </h1>
    <h2 class="text-center"> Redirigé dans : <span id="compteur">5</span> </h2>

    <p class="text-center"> Vous pouvez patienter le temps que l'on vous transfert.</p>

</div>
<script>
    $(document).ready(function () {
        let x = 4;

        let compteur = setInterval(function () {
            if (x == 0) stop();
            $('#compteur').html(x);
            x--;

        }, 1000);

        function stop() {
            clearInterval(compteur);
            window.location.href = "?login";
        }
    });
</script>

<?php
$content = ob_get_clean();
require("_layout.php");
?>