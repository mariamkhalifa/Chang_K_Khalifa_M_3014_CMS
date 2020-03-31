<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <title>Sportcheck</title>
</head>
<body>
<header>
    <img src="images/logo.png" alt="logo">
    <nav class="filterNav">
        <ul class="d-flex justify-content-between mx-5 py-4 list-unstyled">
        <?php while($row = $getCategories->fetch(PDO::FETCH_ASSOC)):?>
            <li>
                <a class="text-white" href="index.php?filter=<?php echo $row['category_name']; ?>">
                    <?php echo $row['category_name']; ?>
                </a>
            </li>
        <?php endwhile;?>
            <li><a class="text-white" href="index.php">All</a></li>
        </ul>
    </nav>
</header>