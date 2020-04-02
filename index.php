<?php
    require_once 'load.php';

    if(isset($_GET['filter'])){
        // work around for if you have too many parameters - an array
        // also ensures you don't have to use all the parameters or in the same order
        $args = array(
            'tbl'=>'tbl_products',
            'tbl2'=>'tbl_categories',
            'tbl3'=>'tbl_products_categories',
            'col'=>'product_id',
            'col2'=>'category_id',
            'col3'=>'category_name',
            'filter'=>$_GET['filter']
        );
        //$products_table = 'tbl_products';
        //$getProducts = getAll($products_table);
        $getProducts = getProductsByFilter($args);
        $categories_table = 'tbl_categories';
        $getCategories = getAll($categories_table);
    }else{
        $products_table = 'tbl_products';
        $categories_table = 'tbl_categories';
        $getProducts = getAll($products_table);
        $getCategories = getAll($categories_table);
    }

    if(isset($_POST['submit'])){
        $searchq = trim($_POST['search']);

        if(!empty($searchq)){
            //pass in value
            $message = search($searchq);
        }else{
            $message = 'Please enter a product name';
        }
    }
?>


<?php include 'templates/header.php';?>
    <main>
        <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
        <div class="product d-flex flex-column align-center border p-4 mt-5 mx-3">
            <h2 class="h4"><?php echo $row['product_name'];?></h2>
            <h4 class="h6"><?php echo $row['product_price']; ?></h4>
            <img src="images/<?php echo $row['product_image'];?>" width="250px" alt="<?php echo $row['product_image'];?>"/>
            <a class="mt-auto mt-2" href="details.php?id=<?php echo $row['product_id'];?>">View Product</a>
        </div>
    <?php endwhile;?>
    </main>
</body>
<?php include 'templates/footer.php';?>
</html>