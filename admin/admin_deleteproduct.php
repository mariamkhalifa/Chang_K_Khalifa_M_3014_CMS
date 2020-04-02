<?php 
    require_once '../load.php';
    confirm_logged_in();
    
    $products = getAllProducts();
    if(!$products){
        $message = 'Failed to get products list!';
    }

    if(isset($_GET['id'])){
        $product_id = $_GET['id'];
        $delete_product_result = deleteProduct($product_id);

        if(!$delete_product_result){
            $message = 'Failed to delete product!';
        }
    }
?>

<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Edit Products</h3>

   <?php echo !empty($message)?$message:'';?>
   <?php if($products):?>
    <table class="border mt-5 mx-auto products-edit-tbl">
            <thead class="border">
                <tr>
                    <td class="border-right p-2">Product Picture</td>
                    <td class="border-right p-2">Name</td>
                    <td class="border-right p-2">Price</td>
                    <td class="border-right p-2">Description</td>
                    <td class="border-right p-2">Specifications</td>
                    <td class="border-right p-2">Update</td>
                    <td class="border-right p-2">Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php while($product = $products->fetch(PDO::FETCH_ASSOC)):?>
                    <tr class="border-bottom">
                        <td class="border-right p-2"><img src="../images/<?php echo $product['product_image'];?>" class="product-image-thumb" alt="Product Image"></td>
                        <td class="border-right p-2"><?php echo $product['product_name'];?></td>
                        <td class="border-right p-2"><?php echo $product['product_price'];?></td>
                        <td class="border-right p-2"><?php echo $product['product_description'];?></td>
                        <td class="border-right p-2"><?php echo $product['product_specifications'];?></td>
                        <td class="border-right p-2"><a href="admin_updateproduct.php?id=<?php echo $product['product_id'];?>">Update</a></td>
                        <td class="border-right p-2"><a href="admin_deleteproduct.php?id=<?php echo $product['product_id'];?>">Delete</a></td>
                    </tr>
                <?php endwhile;?>
            </tbody>
    </table>
   <?php endif;?>

<?php include 'nav.php'; ?>

</body>
</html>