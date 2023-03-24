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
                    <h1>Microservices  </h1>
        
                </div>
            </div>
            <div class="row">
                <?php
                include 'functions.php';
                $encoded_id = $_GET['id']; // get the encoded ID value from the URL query parameter
$decoded_id = base64_decode($encoded_id); 

// decode the ID value from base64 format
                user_Posts('microservices', 'utilisateurs',$decoded_id );
                // REVIEW Préparer une requête pour récupérer les auteurs des microservices
                ?>

            </div>
        </div>
    </main>
    <?php require_once('inc/footer.php') ?>
</body>

</html>