<?php 
require_once '../load.php';
confirm_logged_in();

$categories_table = 'tbl_categories';
$categories = getAll($categories_table);

if(isset($_GET['id'])) {
    $selected_product_id = $_GET['id'];
    $current_product = getCurrentProduct($selected_product_id);
    if(!$current_product){
        $message = 'Failed to get product info!';
    }
}


if (isset($_POST['submit'])) {

    $product = array(
        'image'   => $_FILES['image'],
        'name'   => trim($_POST['name']),
        'price'    => trim($_POST['price']),
        'description'     => trim($_POST['description']),
        'specifications'   => trim($_POST['specifications']),
        'category' => trim($_POST['categoryList']),
        'id' => $_POST['id']
    );

    $result  = updateProduct($product);
    $message = $result;
}

?>


<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Update Product</h3>

<?php echo !empty($message)? $message:'';?>
<form class="border mx-auto p-4 mt-4 mb-5 d-flex flex-column" action="admin_updateproduct.php" method="post" enctype="multipart/form-data">
    <?php if ($current_product):?>
        <?php while($product_info = $current_product->fetch(PDO::FETCH_ASSOC)):?>

        <input name="id" value="Product ID - <?php echo $product_info['product_id'];?>" readonly class="product-id">
        
        <img src="../images/<?php echo $product_info['product_image'];?>" alt="Current Product Image" class="product-image-thumb">

        <label>Product Image:</label>
        <input class="p-1" type="file" name="image" value="<?php echo $product_info['product_image'];?>">

        <label class="mt-2">Name:</label>
        <input class="p-1" type="text" name="name" value="<?php echo $product_info['product_name'];?>">

        <label class="mt-2">Price:</label>
        <input class="p-1" type="text" name="price" value="<?php echo $product_info['product_price'];?>">

        <label class="mt-2">Description:</label>
        <input class="p-1" type="text" name="description" value="<?php echo $product_info['product_description'];?>">

        <label class="mt-2">Specifications:</label>
        <input class="p-1" type="text" name="specifications" value="<?php echo $product_info['product_specifications'];?>">

        <label class="mt-2">Product Category:</label>
        <select name="categoryList">
            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)):?>
                <option
                    <?php if($row['category_name'] == $product_info['category_name']){echo("selected");}?> 
                    value="<?php echo $row['category_id'] ?>">
                    <?php echo $row['category_name']; ?>
                </option>
            <?php endwhile;?>
        </select>

        <button class="btn btn-dark mt-4 p-3" type="submit" name="submit">Update Product</button>
        <?php endwhile;?>
    <?php endif;?>
</form>

<?php include 'nav.php'; ?>
    
</body>
</html>