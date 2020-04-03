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

        $getProducts = getProductsByFilter($args);
        $categories_table = 'tbl_categories';
        $getCategories = getAll($categories_table);
    }elseif(isset($_GET['submit'])){
        $searchq_trim = trim($_GET['search']);
        $searchq = filter_var($searchq_trim, FILTER_SANITIZE_STRING);

        $args = array(
            'tbl'=>'tbl_products',
            'tbl2'=>'tbl_categories',
            'tbl3'=>'tbl_products_categories',
            'col'=>'product_id',
            'col2'=>'category_id',
            'col3'=>'category_name',
            'search'=>$searchq
        );
        $getProducts = getProductsBySearch($args);

        if(!$getProducts){
            $message = 'No items found. Check your spelling?';
        }else{
            $message = 'You searched for: "'.$searchq.'"';
        }

        $categories_table = 'tbl_categories';
        $getCategories = getAll($categories_table);
    }else{
        $products_table = 'tbl_products';
        $categories_table = 'tbl_categories';
        $getProducts = getAll($products_table);
        $getCategories = getAll($categories_table);
    }
?>


<?php include 'templates/header.php';?>
    <p><?php echo !empty($message)?$message:'';?></p>
    <main>
        <?php if($getProducts): ?>
            <?php while($row = $getProducts->fetch(PDO::FETCH_ASSOC)):?>
                <div class="product d-flex flex-column align-center border p-4 mt-5 mx-3">
                    <h2 class="h4"><?php echo $row['product_name'];?></h2>
                    <h4 class="h6"><?php echo $row['product_price']; ?></h4>
                    <img src="images/<?php echo $row['product_image'];?>" width="250px" alt="<?php echo $row['product_image'];?>"/>
                    <a class="mt-auto mt-2" href="details.php?id=<?php echo $row['product_id'];?>">View Product</a>
                </div>
            <?php endwhile;?>
        <?php endif; ?>
    </main>
</body>
<?php include 'templates/footer.php';?>
</html>