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
    <div class="header-top">
        <img src="images/logo.png" alt="logo">
        <a href="admin/index.php" class="btn btn-dark text-white">Admin Area</a>
    </div>
    <nav class="filterNav">
        <ul class="d-flex justify-content-between mx-3 py-4 list-unstyled">
        <li><a class="text-white mx-1" href="index.php">All</a></li>
        <?php while($row = $getCategories->fetch(PDO::FETCH_ASSOC)):?>
            <li>
                <a class="text-white mx-1" href="index.php?filter=<?php echo $row['category_name']; ?>">
                    <?php echo $row['category_name']; ?>
                </a>
            </li>
        <?php endwhile;?>
        </ul>
    </nav>
    <form action="index.php" method="get">
        <input type="text" name="search" placeholder="Enter a product category..." required/>
        <button type="submit" name="submit">Search</button>
    </form>
</header>