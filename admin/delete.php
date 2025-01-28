<?php
include 'db_connection.php';
$id_pengungsi = $_GET['id'];

$sql = "DELETE FROM pengungsi WHERE id_pengungsi='$id_pengungsi'";

if ($conn->query($sql) === TRUE) {
    header('Location: admin_dashboard.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
