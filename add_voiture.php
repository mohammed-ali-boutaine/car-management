<?php

// db connection
if( $_SERVER["REQUEST_METHOD"] == "POST"){

     $matricule = $_POST["matricule"];
     $marque = $_POST["marque"];
     $modele = $_POST["modele"];
     $annee = (int)$_POST["annee"];

     // validation 
     if(empty($matricule) || empty($marque) || empty($modele) || empty($annee) || $annee <= 0) {
          echo "All fields are required and annee must be a positive number.";
          exit();
          // header("Location : ../index.php");
     }


     $matricule = htmlspecialchars($matricule);
     $matrimarquecule = htmlspecialchars($marque);
     $modele =  htmlspecialchars($modele);
     $annee = htmlspecialchars($annee);

     $stmt = $conn->prepare("INSERT INTO voitures (matric, marque,modele,annee) VALUES (?, ?,?,?)");

     if ($stmt === false) {
          // Check for preparation errors
          die("Error preparing the statement: " . $conn->error);
      }

     $stmt->bind_param("sssi", $matricule, $marque, $modele, $annee);


       // Bind parameters: "sssi" specifies the types (string, string, string, integer)
    $stmt->bind_param("sssi", $matricule, $marque, $modele, $annee);

    if ($stmt->execute()) {
        echo "ok";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Car Information Form</h2>
        <form action="add_voiture.php" method="POST">
            <div class="mb-3">
                <label for="matricule" class="form-label">Matricule</label>
                <input name="matricule" type="text" class="form-control" id="matricule" placeholder="Enter matricule">
            </div>
            <div class="mb-3">
                <label for="marque" class="form-label">Marque</label>
                <input name="marque"  type="text" class="form-control" id="marque" placeholder="Enter marque">
            </div>
            <div class="mb-3">
                <label for="modele" class="form-label">Modèle</label>
                <input name="modele" type="text" class="form-control" id="modele" placeholder="Enter modèle">
            </div>
            <div class="mb-3">
                <label for="annee" class="form-label">Année</label>
                <input name="annee" type="number" class="form-control" id="annee" placeholder="Enter année">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>