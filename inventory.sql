CREATE DATABASE book_inventory;

USE book_inventory;

CREATE TABLE Inventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    author VARCHAR(255) NOT NULL,
    genre VARCHAR(100) NOT NULL,
    publication_date DATE NOT NULL,
    isbn VARCHAR(13) NOT NULL UNIQUE
);
