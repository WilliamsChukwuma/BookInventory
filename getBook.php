<?php
include './inc/database.php';

$sql = "SELECT * FROM Inventory";
$result = mysqli_query($conn, $sql);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($books);

mysqli_close($conn);
?>
