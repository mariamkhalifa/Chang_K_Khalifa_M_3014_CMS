<?php

function addProduct($product)
{

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
                ':product_specifications' => $product['specifications'],
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
