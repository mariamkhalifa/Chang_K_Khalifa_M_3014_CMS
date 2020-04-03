<?php

function addProduct($product){

    try {
        // 1. Connect to the DB
        $pdo = Database::getInstance()->getConnection();

        // 2. Validate the uploaded file
        $image          = $product['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpg', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        // 3. Move the uploaded file around (move the file from tmp path to the /images)
        $image_path = '../images/';

        // Randomlize/hash the file name before move it over!
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;

        if (!move_uploaded_file($image['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        // 4. Insert into DB
        $insert_product_query = 'INSERT INTO tbl_products(product_image,product_name,product_price,product_description,product_specifications)';
        $insert_product_query .= ' VALUES(:product_image,:product_name,:product_price,:product_description,:product_specifications)';

        $insert_product        = $pdo->prepare($insert_product_query);
        $insert_product_result = $insert_product->execute(
            array(
                ':product_image'     => $generated_filename,
                ':product_name'     => $product['name'],
                ':product_price'      => $product['price'],
                ':product_description'   => $product['description'],
                ':product_specifications' => $product['specifications']
            )
        );

        $last_uploaded_id = $pdo->lastInsertId();

        if ($insert_product_result && !empty($last_uploaded_id)) {
            $update_category_query = 'INSERT INTO tbl_products_categories(product_id, category_id) VALUES(:product_id, :category_id)';
            $update_category       = $pdo->prepare($update_category_query);

            $update_category_result = $update_category->execute(
                array(
                    ':product_id' => $last_uploaded_id,
                    ':category_id'  => $product['category'],
                )
            );
        }

        // 5. If all of above works, redirect user to index.php
        redirect_to('index.php');
    } catch (Exception $e) {
        // Otherwise, return some error message
        $error = $e->getMessage();
        return $error;
    }
}

function getAllProducts(){
    $pdo = Database::getInstance()->getConnection();

    $args = array(
        'tbl'=>'tbl_products',
        'tbl2'=>'tbl_categories',
        'tbl3'=>'tbl_products_categories',
        'col'=>'product_id',
        'col2'=>'category_id',
        'col3'=>'category_name'
    );

    $queryAll = 'SELECT * FROM '. $args['tbl'].' AS t,';
    $queryAll .= ' '. $args['tbl2'].' AS t2,';
    $queryAll .= ' '. $args['tbl3'].' AS t3';
    $queryAll .= ' WHERE t.'. $args['col'].' = t3.'.$args['col'];
    $queryAll .= ' AND t2.'. $args['col2'].' = t3.'.$args['col2'];

    // echo $queryAll;
    // exit;

    $results = $pdo->query($queryAll);

    if($results){
        return $results;
    }else{
        return 'There was a problem accessing the info';
    }
}

function getCurrentProduct($selected_product_id){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    $args = array(
        'tbl'=>'tbl_products',
        'tbl2'=>'tbl_categories',
        'tbl3'=>'tbl_products_categories',
        'col'=>'product_id',
        'col2'=>'category_id',
        'col3'=>'category_name'
    );

    $queryAll = 'SELECT * FROM '. $args['tbl'].' AS t,';
    $queryAll .= ' '. $args['tbl2'].' AS t2,';
    $queryAll .= ' '. $args['tbl3'].' AS t3';
    $queryAll .= ' WHERE t.'. $args['col'].' = t3.'.$args['col'];
    $queryAll .= ' AND t2.'. $args['col2'].' = t3.'.$args['col2'];
    $queryAll .= ' AND t.'. $args['col'].' = :id';

    $get_product_set = $pdo->prepare($queryAll);
    $get_product_result = $get_product_set->execute(
        array(
            ':id'=>$selected_product_id
        )
    );

    if($get_product_result && $get_product_set->rowCount()){
        return $get_product_set;  
    }else{
        return false;
    }
}

function deleteProduct($product_id){
    $pdo = Database::getInstance()->getConnection();

    $delete_product_query = 'DELETE FROM tbl_products WHERE product_id=:id';
    $delete_product_set = $pdo->prepare($delete_product_query);
    $delete_product_result = $delete_product_set->execute(array(
        ':id'=>$product_id
    ));

    //3. If it goes through, redirect to admin_deleteuser.php
    // otherwise, return false
    if($delete_product_result && $delete_product_set->rowCount() > 0){
        redirect_to('admin_deleteproduct.php');
    }else{
        return false;
    }
}

function updateProduct($product){

    try {
        // 1. Connect to the DB
        $pdo = Database::getInstance()->getConnection();

        // 2. Validate the uploaded file
        $image          = $product['image'];
        $upload_file    = pathinfo($image['name']);
        $accepted_types = array('gif', 'jpg', 'jpg', 'png', 'jpeg', 'webp');
        if (!in_array($upload_file['extension'], $accepted_types)) {
            throw new Exception('Wrong file type!');
        }

        // 3. Move the uploaded file around (move the file from tmp path to the /images)
        $image_path = '../images/';

        // Randomlize/hash the file name before move it over!
        $generated_name     = md5($upload_file['filename'] . time());
        $generated_filename = $generated_name . '.' . $upload_file['extension'];
        $targetpath         = $image_path . $generated_filename;

        if (!move_uploaded_file($image['tmp_name'], $targetpath)) {
            throw new Exception('Failed to move uploaded file, check permission!');
        }

        // 4. Insert into DB
        // $last_uploaded_id = $pdo->lastInsertId();

        $update_product_query = 'UPDATE tbl_products SET product_image=:product_image, product_name=:product_name, product_price=:product_price';
        $update_product_query .= ', product_description=:product_description, product_specifications=:product_specifications';
        $update_product_query .= ' WHERE product_id=:product_id';

        $update_product        = $pdo->prepare($update_product_query);
        $update_product_result = $update_product->execute(
            array(
                ':product_image'     => $generated_filename,
                ':product_name'     => $product['name'],
                ':product_price'      => $product['price'],
                ':product_description'   => $product['description'],
                ':product_specifications' => $product['specifications'],
                ':product_id' => $product['id']
            )
        );

        if ($update_product_result) {
            $update_category_query = 'UPDATE tbl_products_categories SET category_id=:category_id, product_id=:product_id WHERE product_id=:product_id';
            $update_category       = $pdo->prepare($update_category_query);

            $update_category_result = $update_category->execute(
                array(
                    ':category_id'  => $product['category'],
                    ':product_id' => $product['id']
                )
            );
        }

        // 5. If all of above works, redirect user to index.php
        redirect_to('index.php');
    } catch (Exception $e) {
        // Otherwise, return some error message
        $error = $e->getMessage();
        return $error;
    }
}