<?php
include "./config.php";
include "./db/conn.php";
include "./functions/helpers.php";

// Authentication function
requireAuth();

?>

<!DOCTYPE html>
<html lang="en"  data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    .data-holder {
      display: none; 
      margin-top: 20px;
    }
    .data-holder.d-block {
      display: block; 
    }
    .toggle-btn.active {
      font-weight: bold;
    }

    nav{
        background: #000;
    }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container">
      <!-- Logo/Name -->
      <a class="navbar-brand" href="/dashboard.php">Dashboard - <span class="h6 text-primary"><u> <?php echo htmlspecialchars($_SESSION["user_name"]); ?></u></span> </a>
      
      <!-- Toggle button for mobile -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Navigation links -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item  ms-4">
            <button class=" btn mr-4 toggle-btn btn-outline-primary" id="client"> Clients</button>
          </li>
          <li class="nav-item  ms-4">
            <button class=" btn btn-outline-primary mr-4  toggle-btn"  id="voiture"> Voitures</button>
          </li>
          <li class="nav-item  ms-4">
            <button class=" btn btn-outline-primary  mr-4  toggle-btn"  id="contrat"> Contrats</button>
          </li>
          <li class="nav-item  ms-4">
            <a class="nav-link text-danger  mr-4" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<div class="container">








<!-- ---------------------------------  -->
<!-- ---------------------------------  -->
<!-- --------       Clients   --------  -->

    <div class="client data-holder  d-block">
        <h2>Clients</h2>

        <?php  

             $result = $conn->query("SELECT * FROM clients");
if ($result->num_rows > 0) {
    echo "<table class='table table-dark  table-striped table-hover'>
    <thead>
      <tr>
        <th scope='col'>Cin</th>
        <th scope='col'>Nom</th>
        <th scope='col'>Adress</th>
        <th scope='col'>Tel</th>
        <th scope='col'>Actions</th>
      </tr>
    </thead>
    <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["cin"] . "</td>
                <td>" . $row["nom"] . "</td>
                <td>" . $row["adress"] . "</td>
                <td>" . $row["tel"] . "</td>
                <td><a href='pages/user_edit.php?cin=" . $row["cin"] . "'>Edit</a> | <a href='pages/user_delete.php?cin=" . $row["cin"] . "'>Delete</a></td>
              </tr>";
    }
    echo "</table>";

} else {
    echo "No users found.";
}

        
        ?>










<!-- ---------------------------------  -->
<!-- ---------------------------------  -->
<!-- --------       Voitures   --------  -->



    </div>
    <div class="voiture  data-holder">

<h2>voitures</h2>

    

        <?php  

             $result = $conn->query("SELECT * FROM voitures");
if ($result->num_rows > 0) {
    echo "<table class='table table-dark  table-striped table-hover'>
    <thead>
      <tr>
        <th scope='col'>Matricule</th>
        <th scope='col'>Marque</th>
        <th scope='col'>Modele</th>
        <th scope='col'>annnee</th>
        <th scope='col'>Actions</th>
      </tr>
    </thead>
    <tbody>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["matricule"] . "</td>
                <td>" . $row["marque"] . "</td>
                <td>" . $row["modele"] . "</td>
                <td>" . $row["annee"] . "</td>
                <td><a href='pages/voiture_edit.php?matricule=" . $row["matricule"] . "'>Edit</a> | <a href='pages/voiture_edit.php?matricule=" . $row["matricule"] . "'>Delete</a></td>
              </tr>";
    }
    echo "</table>";

} else {
    echo "No users found.";
}

        
        ?>










<!-- ---------------------------------  -->
<!-- ---------------------------------  -->
<!-- --------       Contrat   --------  -->


    </div>
    <div class="contrat data-holder">

    <h2>Contrat</h2>


    <?php  

$result = $conn->query("SELECT 
                            contrats.id,
                            contrats.date_debut,
                            contrats.date_fin,
                            contrats.dure,
                            contrats.cin_client AS cin,
                            clients.nom,
                            clients.adress,
                            voitures.matricule,
                            voitures.marque,
                            voitures.modele,
                            voitures.annee
                        FROM contrats
                        JOIN clients ON clients.cin = contrats.cin_client
                        JOIN voitures ON voitures.matricule = contrats.id_matric");

if ($result->num_rows > 0) {
  echo "<table class='table table-dark table-striped table-hover'>
          <thead>
              <tr>
                  <th scope='col'>ID</th>
                  <th scope='col'>Date Debut</th>
                  <th scope='col'>Date Fin</th>
                  <th scope='col'>Dure</th>
                  <th scope='col'>Client CIN</th>
                  <th scope='col'>Nom</th>
                  <th scope='col'>Adress</th>
                  <th scope='col'>Matricule</th>
                  <th scope='col'>Marque</th>
                  <th scope='col'>Modele</th>
                  <th scope='col'>Annee</th>
                  <th scope='col'>Actions</th>
              </tr>
          </thead>
          <tbody>";
          while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["date_debut"] . "</td>
                    <td>" . $row["date_fin"] . "</td>
                    <td>" . $row["dure"] . "</td>
                    <td>" . $row["cin"] . "</td>
                    <td>" . $row["nom"] . "</td>
                    <td>" . $row["adress"] . "</td>
                    <td>" . $row["matricule"] . "</td>
                    <td>" . $row["marque"] . "</td>
                    <td>" . $row["modele"] . "</td>
                    <td>" . $row["annee"] . "</td>
                    <td>
                        <a href='pages/user_edit.php?id=" . $row["id"] . "'>Edit</a> | 
                        <a href='pages/user_delete.php?id=" . $row["id"] . "'>Delete</a>
                    </td>
                  </tr>";
        }
        echo "</tbody></table>";

} else {
echo "No users found.";
}

?>









    
    </div>


















</div>

<script src="./app.js">

</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>