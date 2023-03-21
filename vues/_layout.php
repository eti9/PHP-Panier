<!-- THIS IS A PHP PROJECT TO SELECT ITEM AND --
  --    SAVE THEM IN A SHOPPING CART WITH     --
  --        AUTHENTIFICATION.                 -->






<!DOCTYPE html>
<html>


<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="style/style.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
    crossorigin="anonymous"></script>
</head>

<body class="d-flex m-5">
  <div class="container bg-light card mx-auto">
    <nav class="navbar navbar-dark navbar-expand-lg my-2 bg-dark">
      <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><span
            class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon"><svg
              class="bi bi-battery-charging" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
              fill="currentColor" viewBox="0 0 16 16">
              <path
                d="M9.585 2.568a.5.5 0 0 1 .226.58L8.677 6.832h1.99a.5.5 0 0 1 .364.843l-5.334 5.667a.5.5 0 0 1-.842-.49L5.99 9.167H4a.5.5 0 0 1-.364-.843l5.333-5.667a.5.5 0 0 1 .616-.09z">
              </path>
              <path d="M2 4h4.332l-.94 1H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h2.38l-.308 1H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z">
              </path>
              <path
                d="M2 6h2.45L2.908 7.639A1.5 1.5 0 0 0 3.313 10H2V6zm8.595-2-.308 1H12a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H9.276l-.942 1H12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-1.405z">
              </path>
              <path
                d="M12 10h-1.783l1.542-1.639c.097-.103.178-.218.241-.34V10zm0-3.354V6h-.646a1.5 1.5 0 0 1 .646.646zM16 8a1.5 1.5 0 0 1-1.5 1.5v-3A1.5 1.5 0 0 1 16 8z">
              </path>
            </svg></span><span>USB-CableNet</span></a>

        <div id="navcol-5" class="collapse navbar-collapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link active" href="?liste">Liste de produit</a></li>
          </ul>
          <?php if (isset($_SESSION['Username'])) { ?>

            <a class="btn btn-primary ms-md-2" role="button" href="?logout">Se deconnecter</a>
            <?php
          } else {
            ?>
            <a class="btn btn-primary ms-md-2" role="button" href="?login">Se connecter</a>
          <?php } ?>
        </div>
      </div>
    </nav>


    <?= $content ?>


    <footer class="p-2 m-2">
      <p>Copyright &copy; 2023 - Créer par Étienne Robert a l'aide de Bootstrap et JQUERY - Version 1.0</p>
    </footer>
  </div>

</body>
<script>

  $('document').ready(function () {
    <?php if (isset($_COOKIE['success'])) {
      if ($_COOKIE['success'] != '')
        echo 'alert("' . $_COOKIE['success'] . '");';
    }
    if (isset($_COOKIE['erreurSQL'])) {
      if ($_COOKIE['erreurSQL'] != '')
        echo 'alert("' . $_COOKIE['erreurSQL'] . '");';
    } ?>


  });

</script>


<html>