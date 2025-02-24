<?php include('header.php'); ?>
<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM `etudiants` WHERE `id` = '$id'"; 
    $result = mysqli_query($connection, $query);

    if (!$result) { 
        die("La requête a échoué : " . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
        
        if (!$row) {
            echo "Aucun étudiant trouvé avec cet ID.";
            exit;
        }
    }
} else {
    echo "ID non spécifié.";
    exit;
}
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['id'])) {
        $id = $_POST['id'];
    } else {
        echo "ID non spécifié.";
        exit;
    }

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = $_POST['age'];


    $query = "UPDATE `etudiants` SET `prenom` = '$prenom', `nom` = '$nom', `age` = '$age' WHERE `id` = '$id'";

    if (mysqli_query($connection, $query)) {
        header('location:index.php?modifier_msg=Les données sont modifiées avec succès.');
        exit;
    } else {
        die("La requête a échoué : " . mysqli_error($connection));
    }
}
?>

<form action="modifier_page_1.php?id=<?php echo $id; ?>" method="post"> 
    <div class="modal-body">
        <div class="form-group">
            <label for="prenom">Prenom</label>
            <input type="text" class="form-control" name="prenom" value="<?php echo htmlspecialchars($row['prenom']); ?>">
        </div>
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" name="nom" value="<?php echo htmlspecialchars($row['nom']); ?>">
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control" name="age" value="<?php echo htmlspecialchars($row['age']); ?>">
        </div>
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- Ajoutez un champ caché pour l'ID -->
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-success">Modifier</button>
    </div>
</form> 

<?php include('footer.php'); ?>