<?php include('header.php'); ?>
<?php include('db.php'); ?>



<div class="box1">
<h2>TOUT LES ETUDIANTS</h2>
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  AJOUTER ETUDIANTS</button>
</div>
<table class="table table-hover table-bordered table-striped">
   <thead>
    <tr>
        <th>ID</th>
        <th>PRENOM</th>
        <th>NOM</th>
        <th>Age</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
   </thead>
   <tbody>
        <?php 
            $query = "SELECT * FROM `etudiants`"; // Utilisez des backticks
            
            $result = mysqli_query($connection, $query);

            if (!$result) { 
                die("La requête a échoué : " . mysqli_error($connection));
            } else {
                while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['prenom']; ?></td>
            <td><?php echo $row['nom']; ?></td>
            <td><?php echo $row['age']; ?></td>
            <td><a href="modifier_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Modifier</a></td>
            <td><a href="supprimer_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Supprimer</a></td>
        </tr>
        <?php
                }
            }
            ?>
   </tbody>
</table>
    <?php
        if(isset($_GET['message'])){
            echo "<h6>".$_GET['message']."</h6>";
        }

    ?>
<?php
        if(isset($_GET['insert_msg'])){
            echo "<h6>".$_GET['insert_msg']."</h6>";
        }
    ?>
<?php
        if(isset($_GET['modifier_msg'])){
            echo "<h6>".$_GET['modifier_msg']."</h6>";
        }
    ?>

<?php
        if(isset($_GET['supprimer_msg'])){
            echo "<h6>".$_GET['supprimer_msg']."</h6>";
        }
    ?>

<form action="insert_data.php" method="POST">
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">AJOUTER ETUDIANTS</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
            </div>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom">
            </div>
            <div class="form-group">
                <label for="age">Age</label>
                <input type="text" class="form-control" id="age" name="age">
            </div>    
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="ajouter_etudiants" value="AJOUTER">
      </div>
    </div>
  </div>
</div>
</form>
<?php include('footer.php') ;?>