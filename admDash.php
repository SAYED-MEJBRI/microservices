<?php


include 'inc/head.php'; ?>
<body>
    <?php
    include('inc/header.php')
    ?>
    <main>
        <div class="container">
            <div class="row">
                <div>
                    <h1>Microservices</h1>
  
                </div>
            </div>
            <div class="row">
                <?php
                include 'functions.php';
                admin_Posts('microservices');
                // REVIEW Préparer une requête pour récupérer les auteurs des microservices
                ?>

            </div>
        </div>
    </main>
    <?php require_once('inc/footer.php') ?>
</body>

</html>