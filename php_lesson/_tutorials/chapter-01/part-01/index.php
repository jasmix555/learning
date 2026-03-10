
<?php

$books = [
    [
        "name" => "Diary of a Wimpy Kid",
        "author" => "Jeff Kinney",
        "releaseYear" => 2007,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "Rodrick Rules",
        "author" => "Jeff Kinney",
        "releaseYear" => 2008,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "The Last Straw",
        "author" => "Jeff Kinney",
        "releaseYear" => 2009,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "Harry Potter and the Sorcerer's Stone",
        "author" => "J.K. Rowling",
        "releaseYear" => 1997,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "Harry Potter and the Chamber of Secrets",
        "author" => "J.K. Rowling",
        "releaseYear" => 1998,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "The Hobbit",
        "author" => "J.R.R. Tolkien",
        "releaseYear" => 1937,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "The Lord of the Rings",
        "author" => "J.R.R. Tolkien",
        "releaseYear" => 1954,
        "purchaseUrl" => "https://example.com"
    ],
    [
        "name" => "To Kill a Mockingbird",
        "author" => "Harper Lee",
        "releaseYear" => 1960,
        "purchaseUrl" => "https://example.com"
    ]
];

// 1️⃣ Get selected author from URL (GET request)
// If user selected an author, store it.
// If nothing selected, set it to null.
$selectedAuthor = $_GET['author'] ?? null;



// 2️⃣ Extract all authors from the $books array

// array_column pulls ONLY the "author" values
// Example result: ["Jeff Kinney", "Jeff Kinney", "J.K. Rowling", ...]
$authors = array_column($books, "author");


// 3️⃣ Remove duplicate authors
// Example before: ["Jeff Kinney", "Jeff Kinney", "J.K. Rowling"]
// After: ["Jeff Kinney", "J.K. Rowling"]
$authors = array_unique($authors);


// 4️⃣ Sort authors alphabetically
sort($authors);



// 5️⃣ Filter books based on selected author
$filteredBooks = array_filter($books, function ($book) use ($selectedAuthor) {

    // If no author was selected (dropdown is empty),
    // return true for ALL books
    if (!$selectedAuthor) {
        return true;
    }

    // Otherwise, only keep books
    // where book's author matches selected author
    return $book['author'] === $selectedAuthor;
});


require "index.view.php";
