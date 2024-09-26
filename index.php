<?php
require './inc/header.php';
include './inc/database.php';

$filter = '';

// Check if the filter form is submitted
if (isset($_GET['filter'])) {
    $filter = $_GET['filter'];
}

// Modify the SQL query to include a WHERE clause for filtering by title
$sql = "SELECT * FROM Inventory WHERE title LIKE '%$filter%'";

$result = $conn->query($sql);
?>
<div class="container">
    <h1>Book Inventory Management</h1>
    
    <form action="addBook.php" method="POST" id="addBookForm">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>

        <div class="form-group">
            <label for="author">Author:</label>
            <input type="text" id="author" name="author" required>
        </div>

        <div class="form-group">
            <label for="genre">Genre:</label>
            <input type="text" id="genre" name="genre" required>
        </div>

        <div class="form-group">
            <label for="publication_date">Publication Date:</label>
            <input type="date" id="publication_date" name="publication_date" required>
        </div>

        <div class="form-group">
            <label for="isbn">ISBN:</label>
            <input type="text" id="isbn" name="isbn" required>
        </div>

        <input type="submit" value="Add Book">
    </form>

    <div class="filter-section">
        <form id="filterForm">
            <input type="text" name="filter" id="filter" placeholder="Filter by Title">
            <button type="submit">Filter</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Genre</th>
                <th>Publication Date</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody id="booksTableBody">
        <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['author']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['genre']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['publication_date']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['isbn']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No books found in the inventory.</td></tr>";
            }
        ?>
        </tbody>
    </table>
    
    <a href="exportcsv.php"><center><button class="export-button" type="button">Export to CSV</button></center></a>
</div>
<?php
$conn->close();
require './inc/footer.php';
?>
