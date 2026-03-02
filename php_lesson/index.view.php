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
    <form method="GET">
      <select name="author" id="">
        <option value="">All Authors</option>

        <?php foreach ($authors as $authorOption) : ?>
          <option
            value="<?= $authorOption ?>"
            <?= ($selectedAuthor === $authorOption) ? 'selected' : '' ?>>
            <?= $authorOption ?>
          </option>

        <?php endforeach; ?>
      </select>

      <button type="submit">Filter</button>
    </form>

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