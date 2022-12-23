<?php
session_start();
$conn = mysqli_connect("localhost", "bit_academy", "bit_academy", "jarvisvault");
if (!$conn) {
    die('Could not Connect My Sql:');
}
$sql = "DELETE FROM passwordmanager WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql)) {
    header('Location: index.php');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
