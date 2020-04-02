<?php

function createUser($fname, $username, $password, $newpassword, $email){
    $pdo = Database::getInstance()->getConnection();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    
    if(password_verify($password,$hashed_password)){

        $verified_password = $hashed_password;

        $hashed_new_password = password_hash($newpassword, PASSWORD_DEFAULT);

        $create_user_query = 'INSERT INTO tbl_users (user_full_name, user_username, user_password, user_email)';
        $create_user_query .= ' VALUES(:fname, :username, :password, :email)';
        $create_user_set = $pdo->prepare($create_user_query);
        $create_user_result = $create_user_set->execute(
            array(
                ':fname'=>$fname,
                ':username'=>$username,
                ':password'=>$hashed_new_password,
                ':email'=>$email
            )
        );

        //echo $create_user_query;exit;
        
        // redirect to the index.php
        // Otherwise, return a error message

        if($create_user_result){
            redirect_to('index.php');
        }else{
            return 'User could not be created! Try again!';
        }
    }
}

function getSingleUser($id){
    //TODO: set up database connection
    $pdo = Database::getInstance()->getConnection();

    //TODO: run the proper SQL query to fetch the user based on $id
    $get_user_query = 'SELECT * FROM tbl_users WHERE user_id = :id';
    $get_user_set = $pdo->prepare($get_user_query);
    $get_user_result = $get_user_set->execute(
        array(
            ':id'=>$id
        )
    );

    // echo $get_user_set->debugDumpParams();
    // exit;
    //TODO: return the user data if the above query went through
    // otherwise, return some error message.
    if($get_user_result && $get_user_set->rowCount()){
        return $get_user_set;
    }else{
        return false;
    }
}

function getAllUsers(){
    $pdo = Database::getInstance()->getConnection();
    $get_user_query = "SELECT * FROM tbl_users";
    $user_state = $pdo->query($get_user_query);

    if($user_state){
        return $user_state;
    }else{
        return false;
    }
}

function editUser($id, $fname, $username, $password, $email){
    //TODO: get the database connection
    $pdo = Database::getInstance()->getConnection();

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    //TODO: Run the proper SQL query to update tbl_user
    $update_user_query = 'UPDATE tbl_users SET user_full_name=:fname, user_username=:username';
    $update_user_query .= ', user_password=:password, user_email=:email';
    $update_user_query .= ' WHERE user_id=:id';
    $update_user_set = $pdo->prepare($update_user_query);
    $update_user_result = $update_user_set->execute(
        array(
            ':fname'=>$fname,
            ':username'=>$username,
            ':password'=>$hashed_password,
            ':email'=>$email,
            ':id'=>$id
        )
    );

    //TODO: if the update SQL query went through redirect user to index.php
    //Otherwise return some error message
    if($update_user_result){
        redirect_to('index.php');
    }else{
        return 'Update failed!';
    }
}

function deleteUser($id){
    //TODO: ==> 6:50
    //1. get the db connection
    $pdo = Database::getInstance()->getConnection();

    //2. Run the proper SQL query that remove the user with user_id = $id
    $delete_user_query = 'DELETE FROM tbl_users WHERE user_id=:id';
    $delete_user_set = $pdo->prepare($delete_user_query);
    $delete_user_result = $delete_user_set->execute(array(
        ':id'=>$id
    ));

    //3. If it goes through, redirect to admin_deleteuser.php
    // otherwise, return false
    if($delete_user_result && $delete_user_set->rowCount() > 0){
        redirect_to('admin_deleteuser.php');
    }else{
        return false;
    }
}