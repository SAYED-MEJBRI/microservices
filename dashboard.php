<?php
if(!isset($_SESSION)){
  header("location:index.php");
}
include 'functions.php';
?>
<?php

include 'functions.php';
include 'inc/head.php';
?>


<body>
    <?php
    include('inc/header.php')
    ?>

<body>
  <main>
    <div class="container">
      <div class="row">
        <div>
          <h1>Microservices</h1>
          <a class="btn btn-primary" href="index.php"><i class="bi bi-house"></i> Accueil</a>
        </div>
      </div>
      <div class="row">
        <?php
        displayTable('microservices');
        ?>
        <div class="row">
          <div>
            <a class="btn btn-primary" href="ajouter-un-microservice.php"><i class="bi bi-plus-square"></i> Ajouter</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>