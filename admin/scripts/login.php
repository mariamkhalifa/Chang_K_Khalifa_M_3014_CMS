<?php 
function login($username, $password, $ip){
    $pdo = Database::getInstance()->getConnection();
    //Check existance
    $check_exist_query = 'SELECT COUNT(*) FROM `tbl_users` WHERE user_username =:username';
    $user_set = $pdo->prepare($check_exist_query);
    $user_set->execute(
        array(
            ':username'=>$username
        )
    );

    //echo $check_exist_query;exit;

    $hashed_pass_query = 'SELECT * FROM `tbl_users` WHERE user_username =:username';
    $user = $pdo->prepare($hashed_pass_query);
    $user->execute(
        array(
            ':username'=>$username
        )
    );
    $user = $user->fetch(PDO::FETCH_ASSOC);
    $hashed_password = $user['user_password'];

    if(password_verify($password,$hashed_password)){
        $verified_password = $hashed_password;

        if($user_set->fetchColumn()>0){
            //Check if match
            $check_match_query = 'SELECT * FROM `tbl_users` WHERE user_username =:username';
            $check_match_query .=' AND user_password=:password';
            $user_match = $pdo->prepare($check_match_query);
            $user_match->execute(
                array(
                    ':username'=>$username,
                    ':password'=>$verified_password
                )
            );

            //echo $check_match_query;exit;

        

            while($founduser = $user_match->fetch(PDO::FETCH_ASSOC)){
                $id = $founduser['user_id'];

                $_SESSION['user_id'] = $id;
                $_SESSION['user_username'] = $founduser['user_full_name'];

                $update = 'UPDATE tbl_users SET user_ip=:ip WHERE user_id = :id';
                $user_update = $pdo->prepare($update);
                $user_update->execute(
                    array(
                        ':ip'=>$ip,
                        ':id'=>$id
                    )
                );
            }
        
            if(isset($id)){
                redirect_to('index.php');
            }else{
                return 'Wrong password';
            }
        }else{

            return 'User does not exist!';
        }

    }else{
        return 'passwords do not match!';
    }
}

function confirm_logged_in(){
    if(!isset($_SESSION['user_id'])){
        redirect_to('admin_login.php');
    }
}

function logout(){
    session_destroy();
    redirect_to('admin_login.php');
}