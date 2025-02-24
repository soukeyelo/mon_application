
<?php
include 'db.php';

if (isset($_POST['ajouter_etudiants'])) {

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $age = $_POST['age'];

    
    if (empty($prenom)) {
        header('location:index.php?message=Vous devez remplir le prénom!');
        exit; 
    }

   
    if (!is_numeric($age) || $age <= 0) {
        header('location:index.php?message=Veuillez entrer un âge valide!');
        exit;
    }


    $query = "INSERT INTO `etudiants` (`prenom`, `nom`, `age`) VALUES ('$prenom', '$nom', '$age')";
    $result = mysqli_query($connection, $query);

    
    if (!$result) {
        die("Query Failed: " . mysqli_error($connection)); 
    } else {
        header('location:index.php?insert_msg=Vos données sont ajoutées avec succès');
        exit; 
    }
}
?>