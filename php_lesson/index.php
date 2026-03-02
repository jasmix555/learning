<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
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

    // function filter($items, $fn)
    // {
    //     $filteredItems = [];

    //     foreach ($items as $item) {
    //         if ($fn($item)) {
    //             $filteredItems[] = $item;
    //         }
    //     }

    //     return $filteredItems;
    // };

    $filteredBooks = array_filter($books, function ($book) {
        return $book["releaseYear"] < 1950 || $book["author"] === "J.K. Rowling";
    });
    ?>


    <div class="container">


        <ul>
            <?php foreach ($filteredBooks as $book) : ?>
                <li>
                    <strong><?= $book["name"]; ?></strong>
                    by <?= $book["author"] ?> (<?= $book["releaseYear"] ?>)
                    <br>
                    <a href="<?= $book['purchaseUrl'] ?>">Purchase Here</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>