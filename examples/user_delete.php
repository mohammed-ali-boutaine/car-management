<?php
include "../db/db.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "DELETE FROM users WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "User deleted successfully. <a href='user_list.php'>View users</a>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
