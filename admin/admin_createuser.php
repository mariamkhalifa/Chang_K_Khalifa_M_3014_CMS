<?php 
    require_once '../load.php';
    confirm_logged_in();

    if(isset($_POST['submit'])){
        $fname = trim($_POST['fname']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $email = trim($_POST['email']);

        if(empty($fname) || empty($username) || empty($password) || empty($email)){
            $message = 'Please fill required fields!';
        }else{
            //All data pre processed, and good to go
            $message = createUser($fname, $username, $password, $email);
        }
    }
?>

<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Create User</h3>

    <?php echo !empty($message)? $message:''; ?>
    <form class="border mx-auto p-4 mt-4 mb-5 d-flex flex-column" action="admin_createuser.php" method="post">
        <label>Name:</label>
        <input class="p-1" type="text" name="fname" value="">
        <label class="mt-3">Username:</label>
        <input class="p-1" type="text" name="username" value="">
        <label class="mt-3">Password:</label>
        <input class="p-1" type="text" name="password" value="">
        <label class="mt-3">Email:</label>
        <input class="p-1" type="email" name="email" value="">

        <button class="btn btn-dark mt-4 p-3" type="submit" name="submit">Create User</button>
    </form>

    <?php include 'nav.php'; ?>
</body>
</html>