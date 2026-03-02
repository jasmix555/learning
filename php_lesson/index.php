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
            'name' => "book 1",
            "author" => "author 1",
            "purchaseUrl" => "https://example.com"
        ],

        [
            'name' => "book 2",
            "author" => "author 2",
            "purchaseUrl" => "https://example.com"
        ],

        [
            'name' => "book 3",
            "author" => "author 3",
            "purchaseUrl" => "https://example.com"
        ]
    ];
    ?>


<div class="container">
    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <strong><?= $book["name"]; ?></strong>
                by <?= $book["author"] ?>
                <br>
                <a href="<?= $book['purchaseUrl'] ?>">Purchase Here</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
</body>

</html>