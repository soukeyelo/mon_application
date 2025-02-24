<?php include('db.php'); ?>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

  
    $query = "DELETE FROM `etudiants` WHERE `id` = '$id'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed: " . mysqli_error($connection));
    } else {
        header('Location: index.php?supprimer_msg=Vous avez supprimé l"enregistrement.');
        exit(); 
    }
}
?>
