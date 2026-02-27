<?php

$numbers = [1, 2, 3, 4, 5];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <ul>
        <?php foreach ($numbers as $num): ?>
            <?php if ($num % 2 === 0): ?>
                <li style="color:green;"><?php echo $num; ?> is even</li>
            <?php else: ?>
                <li style="color:red;"><?php echo $num; ?> is odd</li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</body>

</html>