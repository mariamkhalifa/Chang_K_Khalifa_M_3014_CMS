<?php 
require_once '../load.php';
confirm_logged_in();

$id = $_SESSION['user_id'];
$current_user = getSingleUser($id);

if(!$current_user){
    $message = 'Failed to get user info!';
}

if(isset($_POST['submit'])){
    $fname = trim($_POST['fname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $message = editUser($id, $fname, $username,$password, $email);
}
?>


<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Edit User</h3>

<?php echo !empty($message)? $message:'';?>
<form class="border mx-auto p-4 mt-4 mb-5 d-flex flex-column" action="admin_edituser.php" method="post">
    <?php if ($current_user):?>
        <?php while($user_info = $current_user->fetch(PDO::FETCH_ASSOC)):?>
        <label>Name:</label>
        <input class="p-1" type="text" name="fname" value="<?php echo $user_info['user_full_name'];?>">

        <label class="p-1">Username:</label>
        <input class="p-1" type="text" name="username" value="<?php echo $user_info['user_username'];?>">

        <label class="p-1">Password:</label>
        <input class="p-1" type="text" name="password" value="<?php echo $user_info['user_password'];?>">

        <label class="p-1">Email:</label>
        <input class="p-1" type="email" name="email" value="<?php echo $user_info['user_email'];?>">

        <button class="btn btn-dark mt-4 p-3" type="submit" name="submit">Edit Account</button>
        <?php endwhile;?>
    <?php endif;?>
</form>

<?php include 'nav.php'; ?>
    
</body>
</html>