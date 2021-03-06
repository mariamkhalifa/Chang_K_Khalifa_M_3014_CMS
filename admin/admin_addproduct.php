<?php
require_once '../load.php';
confirm_logged_in();

$categories_table = 'tbl_categories';
$categories = getAll($categories_table);

if (isset($_POST['submit'])) {
    $product = array(
        'image'   => $_FILES['image'],
        'name'   => trim($_POST['name']),
        'price'    => trim($_POST['price']),
        'description'     => trim($_POST['description']),
        'specifications'   => trim($_POST['specifications']),
        'category' => trim($_POST['categoryList'])
    );

    $result  = addProduct($product);
    $message = $result;
}

?>

<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Add Product</h3>

    <?php echo !empty($message) ? $message : ''; ?>
    <form class="border mx-auto p-4 mt-4 mb-5 d-flex flex-column" action="admin_addproduct.php" method="post" enctype="multipart/form-data">
        <label>Product Image:</label>
        <input class="p-1" type="file" name="image" value="" required>

        <label class="mt-2">Product Name:</label>
        <input class="p-1" type="text" name="name" value="" required>

        <label class="mt-2">Product Price:</label>
        <input class="p-1" type="text" name="price" value="" required>

        <label class="mt-2">Product Description:</label>
        <input class="p-1" type="text" name="description" value="" required>

        <label class="mt-2">Product Specifications</label>
        <input class="p-1" type="text" name="specifications" value="">

        <label class="mt-2">Product Category:</label>
        <select name="categoryList" required>
            <option>Please select a product category..</option>
            <?php while ($row = $categories->fetch(PDO::FETCH_ASSOC)): ?>
                <option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']; ?></option>
            <?php endwhile;?>
        </select>
        
        <button class="btn btn-dark mt-4 p-3" type="submit" name="submit">Add Product</button>
    </form>

    <?php include 'nav.php'; ?>
</body>
</html>