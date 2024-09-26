<?php
include './inc/database.php'; 

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $publication_date = $_POST['publication_date'];
    $isbn = $_POST['isbn'];

    // SQL query to insert a new book into the database
    $sql = "INSERT INTO Inventory (title, author, genre, publication_date, isbn)
            VALUES ('$title', '$author', '$genre', '$publication_date', '$isbn')";

    if ($conn->query($sql) === TRUE) {
        echo "New book added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();

header("Location: index.php");
?>
