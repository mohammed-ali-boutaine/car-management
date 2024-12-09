<?php
include "../db/db.php";
include "../functions/helpers.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $name = sanitize_input($_POST["name"]);
    $email = sanitize_input($_POST["email"]);

    if (empty($name) || empty($email)) {
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
