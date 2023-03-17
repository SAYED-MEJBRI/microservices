<?php var_dump($_SERVER['DOCUMENT_ROOT']);
define('ROOT',$_SERVER['DOCUMENT_ROOT'].'/microservices-5/');
define('WEB_ROOT','/microservices-5/');
echo ROOT;
echo "<br>";
echo WEB_ROOT;?>
<!-- <?php var_dump($_SERVER['DOCUMENT_ROOT']); var_dump(__DIR__);var_dump($_SERVER)?> -->
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src ="https://api.dicebear.com/5.x/identicon/svg?seed=Mejbrichahin" alt="" height="20">Microservices</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">Disabled</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>