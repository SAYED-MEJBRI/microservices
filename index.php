<?php


include 'inc/head.php'; ?>
<body>
    <?php
    include('inc/header.php');
    include 'functions.php';
    ?>
    <main>
        <div class="container">
            <div class="row">
                <div>
                    <h1>Microservices</h1>
                    <a class="btn btn-primary" href="dashboard.php"><i class="bi bi-pencil-square"></i> Admin</a>
                </div>
            </div>
            <div class="row">
                <?php
                
                displayPosts('microservices');
                // REVIEW Préparer une requête pour récupérer les auteurs des microservices
                ?>

            </div>
        </div>
    </main>
    <?php require_once('inc/footer.php') ?>
</body>

</html>