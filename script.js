document.getElementById('filterForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    let filterValue = document.getElementById('filter').value;

    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'filterBooks.php?filter=' + encodeURIComponent(filterValue), true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            
            let books = JSON.parse(xhr.responseText);

            let booksTableBody = document.getElementById('booksTableBody');
            booksTableBody.innerHTML = '';

            if (books.length > 0) {
                books.forEach(function(book) {
                    let row = `<tr>
                        <td>${book.title}</td>
                        <td>${book.author}</td>
                        <td>${book.genre}</td>
                        <td>${book.publication_date}</td>
                        <td>${book.isbn}</td>
                    </tr>`;
                    booksTableBody.insertAdjacentHTML('beforeend', row);
                });
            } else {
                booksTableBody.innerHTML = '<tr><td colspan="5">No books found.</td></tr>';
            }
        }
    };
    xhr.send();
});

document.getElementById('filter').addEventListener('input', function() {
    let filter = this.value;
    
    fetch(`filterBooks.php?filter=${filter}`)
        .then(response => response.json())
        .then(data => {
            let tableBody = document.querySelector('#books-table tbody');
            tableBody.innerHTML = ''; 
            data.forEach(book => {
                let row = `<tr>
                    <td>${book.title}</td>
                    <td>${book.author}</td>
                    <td>${book.genre}</td>
                    <td>${book.publication_date}</td>
                    <td>${book.isbn}</td>
                </tr>`;
                tableBody.insertAdjacentHTML('beforeend', row);
            });
        });
});
