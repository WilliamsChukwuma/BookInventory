<?php
include './inc/database.php';

$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

$sql = "SELECT * FROM Inventory WHERE title LIKE '%$filter%'";

$result = mysqli_query($conn, $sql);

$books = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo json_encode($books);

mysqli_close($conn);
?>
