<?php
// define('IMAGES_ROOT', '/crud/uploads/images/');

require_once 'Database.php';


// ANCHOR READ Afficher tous les utilisateurs
function getAll($table)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "SELECT * FROM $table";
        $req = $connexion->query($sql);
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
function user_Posts($table1,$table2,$id){
  
   $rows= getuser($table1, $table2, $id);
  
   
    echo "<div class='d-flex  flex-wrap '>";
    echo "<div class='col-4 '>";
    echo "<h2>  </h2>";
 
    echo " </div>";
    echo "<div class='col-8  '>";
    echo "<h2>   </h2>";
  


        echo "<div class='card mb-3 shadow p-3 mb-5 bg-white rounded'>";
        echo "<div class='card-body '>";
        // echo " <div class='d-flex  flex-wrap' id='myDiv' >";
        $chemin_image_complet = 'uploads/images/'  . $rows['Image'];
        echo " <img class=' shadow-1-strong me-3'
      src='$chemin_image_complet'  width='100'
      height='100' />";
        echo '<br>';
        echo "<h5 class='card-title'>" . $rows['Titre'] . "</h5>";
        echo "  <span class='small btn  btn-danger'>" . $rows['Prix'] . "</span><br>";


        echo " <div class='flex-grow-1 flex-shrink-1'>";
        echo " <div>";
        echo "<div class='d-flex justify-content-start p-2 align-items-center' >";

        echo "  </div>
        <p class='small mb-0'>" .
            $rows["Contenu"] .
            " </p>
      </div></div>";
        echo " <div class='d-flex p-2 justify-content-center' id='myDiv'>";
        echo '<p><a class=" small btn  btn-info" href="edit.php?id=' . urlencode($rows['microservice_id']) . '">edit </a></p>';
        echo '<p><a class=" small btn  btn-success" href="update.php?id=' . urlencode($rows['microservice_id']) . '">update </a></p>';
      
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

function admin_Posts($table)
{
    $rows = getAll($table);
    echo "<div class='d-flex  flex-wrap '>";
    echo "<div class='col-4 '>";
    echo "<h2>  </h2>";
    echo '<p><a class=" small btn  btn-info" href="ajouter-un-microservice.php">Ajouter Microservice</a></p>';
    // echo '<p><a class=" small btn  btn-danger" href="deleteAll.php">Supprimer Tous </a></p>';
    echo " </div>";
    echo "<div class='col-8  '>";
    echo "<h2>   </h2>";
    foreach ($rows as $row) {


        echo "<div class='card mb-3 shadow p-3 mb-5 bg-white rounded'>";
        echo "<div class='card-body '>";
        // echo " <div class='d-flex  flex-wrap' id='myDiv' >";
        $chemin_image_complet = 'uploads/images/'  . $row['Image'];
        echo " <img class=' shadow-1-strong me-3'
      src='$chemin_image_complet'  width='100'
      height='100' />";
        echo '<br>';
        echo "<h5 class='card-title'>" . $row['Titre'] . "</h5>";
        echo "  <span class='small btn  btn-danger'>" . $row['Prix'] . "</span><br>";


        echo " <div class='flex-grow-1 flex-shrink-1'>";
        echo " <div>";
        echo "<div class='d-flex justify-content-start p-2 align-items-center' >";

        echo "  </div>
        <p class='small mb-0'>" .
            $row["Contenu"] .
            " </p>
      </div></div>";
        echo " <div class='d-flex p-2 justify-content-center' id='myDiv'>";
        echo '<p><a class=" btn btn-outline-success  " href="edit.php?id=' .  $row['microservice_id']. '">EDIT </a></p>';
     
         
           
        // echo '<p><a class=" btn btn-outline-success" href="edit.php?id=' . urlencode($row['microservice_id']) . '">update </a></p>';
        // echo '<p><a class=" btn btn-outline-danger" href="delete.php?id=' . urlencode($row['microservice_id']) . '">delete </a></p>';
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}


//ANCHOR - ETABLIR CONNEXION
function Verif_connexion($name, $pass)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $stmt = $connexion->prepare('SELECT * FROM utilisateurs WHERE Nom = :name AND Password= :pass');
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':pass', $pass, PDO::PARAM_STR);
        $stmt->execute();
        $row = $stmt->fetch();
        echo "resultat du formulaire ";
        var_dump($name);
        var_dump($pass);
        echo "resultat de la base";
        var_dump($row['Nom']);
        var_dump($row['Password']);
        if ($row !== false && ($pass === $row['Password'])) {
            // Nom d'utilisateur et mot de passe valides
            session_start();
            $_SESSION['username'] = $row['Nom'];
            $_SESSION['lastname'] = $row['Prénom'];
            $_SESSION['Rôle'] = $row['Rôle'];
            $_SESSION['status'] = true;
            echo  $_SESSION['username'];
            if ($row['Rôle'] === 'admin') {
                $_SESSION['username'] = $row['Nom'];
                $_SESSION['lastname'] = $row['Prénom'];
                $_SESSION['Rôle'] = $row['Rôle'];
                $_SESSION['status'] = true;
                header('Location: admDash.php');
                exit();
            } else {
                header('Location: userDash.php?id=' . base64_encode($row['user_id']));
                exit();
            }

            // header('Location: header.php');

        } else {
            // Identifiants incorrects
            echo 'Identifiants incorrects';
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}


// header('location: control_login.php');


// ANCHOR READ Afficher
function getSingle($table, $id)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "SELECT * FROM $table WHERE microservice_id = :id";
        $req = $connexion->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetchAll();

        if (!empty($row)) {
            return $row[0];
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

function getuser($table1, $table2, $id){
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "SELECT * FROM $table1 INNER JOIN $table2 ON $table1.microservice_id = $table2.user_id WHERE $table2.user_id = :id";
        $req = $connexion->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetchAll();

        if (!empty($row)) {
            return $row[0];
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR CREATE Créer utilisateur
function createuser($table, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "INSERT INTO $table (Titre, Contenu, Prix, Image, user_id) VALUES (:titre, :contenu, :prix, :image, :userID)";
        $req = $connexion->prepare($sql);
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':image', $image, PDO::PARAM_STR);
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
// ANCHOR CREATE Créer microservives
function create($table, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "INSERT INTO $table (Titre, Contenu, Prix, Image, user_id) VALUES (:titre, :contenu, :prix, :image, :userID)";
        $req = $connexion->prepare($sql);
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
        $req->bindParam(':image', $image, PDO::PARAM_STR);
        $req->bindParam(':userID', $userID, PDO::PARAM_INT);
        $req->execute();
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR UPDATE Modifier
function update($table, $id, $titre, $contenu, $prix, $image, $userID)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        if (!empty($image)) {
            $sql = "UPDATE $table SET Titre = :titre, Contenu = :contenu, Prix = :prix, Image = :image, user_id = :userID WHERE microservice_id = :id ";
            $req = $connexion->prepare($sql);
            $req->bindParam(':titre', $titre, PDO::PARAM_STR);
            $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $req->bindParam(':prix', $prix, PDO::PARAM_INT);
            $req->bindParam(':image', $image, PDO::PARAM_STR);
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
            $req->execute();
            var_dump(  $req->execute());
        } else {
            $sql = "UPDATE $table SET Titre = :titre, Contenu = :contenu, Prix = :prix, user_id = :userID WHERE microservice_id = :id ";
            $req = $connexion->prepare($sql);
            $req->bindParam(':titre', $titre, PDO::PARAM_STR);
            $req->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $req->bindParam(':prix', $prix, PDO::PARAM_INT);
            $req->bindParam(':userID', $userID, PDO::PARAM_INT);
            $req->bindParam(':id', $id, PDO::PARAM_INT);
           
            var_dump(  $req->execute());
       
        }
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}


// ANCHOR DELETE Supprimer

function delete($table, $id)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        $sql = "DELETE FROM $table WHERE microservice_id = :id";
        $req = $connexion->prepare($sql);
        $req->bindParam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        var_dump( $id, $table);
      
        
       
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}

// ANCHOR Afficher l'en-tête de la table

function getHeaderTable($table)
{
    try {
        $db = new Database();
        $connexion = $db->getPDO();
        // ANCHOR BBD et TABLE
        $sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='microservices' AND TABLE_NAME = :table_name ORDER BY ORDINAL_POSITION";
        $req = $connexion->prepare($sql);
        $req->bindParam(':table_name', $table, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetchAll();
        return $row;
    } catch (PDOException $e) {
        echo "Erreur: " . $e->getMessage();
    }
}
// ANCHOR DASHBOARD | Afficher un tableau

function displayTable($table)
{
    $headers = getHeaderTable($table);
    $rows = getAll($table);
?>
    <table class="table table-hover">
        <thead>
            <tr>
                <?php
                foreach ($headers as $header) :
                ?>
                    <th scope="col"><?= $header['COLUMN_NAME'] ?></th>
                <?php
                endforeach;
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $row) :
                // var_dump(array_key_first($row) ? 'yes' : $row);
            ?>
                <tr class="position-relative">

                    <td scope="col">
                        <a class="btn btn-link stretched-link text-decoration-none" href="ajouter-un-microservice.php?id=<?= $row['microservice_id'] ?>"><i class="bi bi-pencil-square"></i> <?= $row['microservice_id'] ?></a>
                    </td>
                    <td scope="col">
                        <?= $row['Titre'] ?>
                    </td>
                    <td scope="col">
                        <?= $row['Contenu'] ?>
                    </td>
                    <td scope="col">
                        <?= $row['Prix'] ?>
                    </td>
                    <td scope="col text-center">
                        <img src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Contenu'] ?>" width="120">
                    </td>
                    <td scope="col">
                        <?= $row['user_id'] ?>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </tbody>

    </table>
    <?php
}

// ANCHOR Afficher les articles
function displayPosts($table)
{
    $rows = getAll($table);

    foreach ($rows as $row) :
    ?>
        <article class="col-md-4 p-2">
            <div class="border border-dark h-100">
                <div class="text-center">
                    <img class="img-fluid" src="<?= 'uploads/images/' . $row['Image'] ?>" alt="<?= $row['Contenu'] ?>">

                </div>
                <div class="p-2">
                    <h3><?= $row['Titre'] ?></h3>
                    <p class="fw-bolder"><i class="bi bi-person-circle"></i>
                        <?php
                        if (!empty($row['Prénom']) && !empty($row['Nom'])) {
                            echo $row['Prénom'] . ' ' . $row['Nom'];
                        } else {
                            echo 'Anonymous';
                        }
                        ?>
                    </p>
                    <p><?= $row['Contenu'] ?></p>
                    <p>
                        <a class="btn btn-light" href="#">À partir de <strong><?= $row['Prix'] ?> €</strong></a>
                        <!-- READ MORE -->
                        <a class="link-secondary" href="post.php?id=<?= $row['microservice_id'] ?>">En savoir plus </a>
                    </p>
                </div>
            </div>
        </article>
<?php endforeach;
}



// ANCHOR Contrôler si l'image est valide
function moveImage($image)
{
    if (isset($image) and $image['error'] == 0) {

        echo "====> Fichier reçu 👍<br>";

        // Testons si le fichier n'est pas trop gros
        if ($image['size'] <= 5000000) {
            echo "====> Taille Fichier < 5Mo 👍<br>";

            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($image['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

            if (in_array($extension_upload, $extensions_autorisees)) {
                echo "====> Extension Autorisée 👍<br>";

                // On peut valider le fichier et le stocker définitivement

                move_uploaded_file($image['tmp_name'], 'uploads/images/' . basename($image['name']));
                //  FIXME Attention la même image peut pas être téléversée 2 fois
                echo "====> Téléversement de <strong>" . $image['name'] . "</strong> terminé 👍<br>";
                return $image['name'];
            } else {
                echo "⚠ Erreur: Ce format de fichier n'est pas autorisé";
            }
        } else {
            echo "⚠ Erreur: le fichier dépasse 1 Mo";
        }
    } else {
        echo "⚠ Erreur: Aucune photo reçue";
        return "";
    }
}

// ANCHOR SECURITY

function safeguard($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>