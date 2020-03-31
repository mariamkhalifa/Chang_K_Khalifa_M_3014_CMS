<?php
    require_once 'load.php';

    // if(isset($_GET['filter'])){
    //     // work around for if you have too many parameters - an array
    //     // also ensures you don't have to use all the parameters or in the same order
    //     $args = array(
    //         'tbl'=>'tbl_movies',
    //         'tbl2'=>'tbl_genre',
    //         'tbl3'=>'tbl_mov_genre',
    //         'col'=>'movies_id',
    //         'col2'=>'genre_id',
    //         'col3'=>'genre_name',
    //         'filter'=>$_GET['filter']
    //     );
    //     $getMovies = getMoviesByFilter($args);
    // }else{
    //     $movie_table = 'tbl_movies';
    //     $getMovies = getAll($movie_table);
    // }
    $products_table = 'tbl_products';
    $getProducts = getAll($products_table);
?>

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
    <?php include 'templates/header.php';?>
    <main>
        <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
        <div class="product d-flex flex-column align-center border p-4 mt-5 mx-3">
            <h2 class="h4"><?php echo $row['name'];?></h2>
            <h4 class="h6"><?php echo $row['price']; ?></h4>
            <img src="images/<?php echo $row['image'];?>" width="250px" alt="<?php echo $row['image'];?>"/>
            <a href="details.php?id=<?php echo $row['id'];?>">View Product</a>
        </div>
    <?php endwhile;?>
    </main>
</body>
<?php include 'templates/footer.php';?>
</html>