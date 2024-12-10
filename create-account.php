<?php
include "./db/conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];


    // validation 
    if(empty($name) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    }else{
        $name = htmlspecialchars($name);
        $email = htmlspecialchars($email);
        $password = password_hash(htmlspecialchars($password), PASSWORD_BCRYPT); // Hash password

        // Check for email 
        $checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
        $checkStmt->bind_param("s", $email);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $error = "Email is already registered.";
        } else {

  // Insert into database
  $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $password);

  if ($stmt->execute()) {
      $_SESSION["user_id"] = $stmt->insert_id; // Use last insert ID for the session
      $_SESSION["user_name"] = $name;
      header("Location: login.php");
      exit();
  } else {
      $error = "Error: " . $stmt->error;
  }

  $stmt->close();
}
$checkStmt->close();
}
$conn->close();


}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body{
            background-color: #343a40;
            color:#fff;
        }
         form{
            max-width:500px;
            background-color: #171a1c;
            width: 90%;
            margin:50px auto 0px;
            border:1px solid gray;
            padding:50px 20px;
            border-radius: 12px;
        }
        
    </style>
</head>
<body class="dark" >



    <div class="container mt-5">
        <h2 class="mb-4">Create Account</h2>

         <!-- show errors -->
        <?php if (isset($error)): ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>




    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Bootstrap form validation
        (function () {
            'use strict';
            var forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
</body>
</html>
