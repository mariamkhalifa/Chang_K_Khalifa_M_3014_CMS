<?php
    require_once '../load.php';
    $ip = $_SERVER['REMOTE_ADDR'];

    if(isset($_POST['submit'])){
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);

        if(!empty($username) && !empty($password)){
            //Do the login here
            $message = login($username, $password, $ip);
        }else{
            $message = 'Please fill out the required fields';
        }
    }
?>


<?php include 'head.php'; ?>
<h2 class="h3 text-center mt-5">Admin Login</h2>
    <?php echo !empty($message)?$message:''; ?>
    <form class="border mx-auto p-4 mt-4 d-flex flex-column" action="admin_login.php" method="post">
        <label>Username:</label>
        <input class="p-1" type="text" name="username" value="" />

        <label class="mt-2">Password:</label>
        <input class="p-1" type="password" name="password" value="" />

        <button class="btn btn-dark mt-4 p-3" name="submit">Submit</button>
    </form>
</body>
</html>