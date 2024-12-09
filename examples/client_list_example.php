<?php
include ".db/db.php";

$sql = "SELECT * FROM clients";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Clients List</h2>";
    echo "<table border='1'>
            <tr>
                <th>Cin</th>
                <th>Nom</th>
                <th>Adress</th>
                <th>Tel</th>
                <th>Actions</th>
            </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["idn"] . "</td>
                <td>" . $row["nom"] . "</td>
                <td>" . $row["adress"] . "</td>
                <td>" . $row["tel"] . "</td>
                <td><a href='user_edit.php?id=" . $row["id"] . "'>Edit</a> | <a href='user_delete.php?id=" . $row["id"] . "'>Delete</a></td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "No users found.";
}
?>
