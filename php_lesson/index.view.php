<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./css/style.css">
</head>

<body>

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