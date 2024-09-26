<?php
include './inc/database.php';

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=books.csv');


$output = fopen('php://output', 'w');

fputcsv($output, array('ID', 'Title', 'Author', 'Genre', 'Publication Date', 'ISBN'));

$query = "SELECT * FROM Inventory";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($output, $row);
}

fclose($output);

exit;
?>
