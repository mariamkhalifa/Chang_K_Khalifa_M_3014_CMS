<?php
    ini_set('display_errors', 1);
    require_once 'load.php';
    
    if(isset($_GET['id'])){
        $products_table = 'tbl_products';
        $id = $_GET['id'];
        $col = 'product_id';

        $getProduct = getSingleProduct($products_table, $col, $id);
        $categories_table = 'tbl_categories';
        $getCategories = getAll($categories_table);
    }
?>

<?php include 'templates/header.php';?>
    <?php while($row = $getProduct->fetch(PDO::FETCH_ASSOC)):?>
    <div class="product-item mt-5 mx-5">
        <a class="h3 text-body" href="index.php"><</a>
        <h2 class="h4 mt-3"><?php echo $row['product_name'];?></h2>
        <h4 class="h6"><?php echo $row['product_price'];?></h4>
        <img src="images/<?php echo $row['product_image'];?>" width="300px" alt="<?php echo $row['product_image'];?>"/>
        <p><?php echo $row['product_description'];?></p>
        <?php if(isset($row['product_specifications'])) {
            echo '<p>Specifications:</p>';
            echo '<ul>
                <li>' . $row['product_specifications'] . '</li>
            </ul>';
            }?>
        
        <button class="btn btn-dark mt-3">Add to Cart</button>
    </div>
    <?php endwhile;?>
</body>
<?php include 'templates/footer.php';?>
</html>