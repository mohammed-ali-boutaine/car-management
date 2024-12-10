<?php
include "../config.php";
include "../db/conn.php";
include "../functions/helpers.php";

// Authentication function
requireAuth();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $cin = sanitize_input($_POST["cin"]);
    $nom = sanitize_input($_POST["nom"]);
    $adress = sanitize_input($_POST["adress"]);
    $tel = sanitize_input($_POST["tel"]);

    if (empty($cin) || empty($nom)|| empty($adress)|| empty($tel)) {
        echo "All fields are required!";
    } else {
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "User updated successfully. <a href='user_list.php'>View users</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else {
    $id = $_GET["id"];
    $result = $conn->query("SELECT * FROM users WHERE id='$id'");
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
</head>
<body>
    <h2>Edit User</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
        <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
        <button type="submit">Update</button>
    </form>
</body>
</html>
