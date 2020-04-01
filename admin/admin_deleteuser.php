<?php 
    require_once '../load.php';
    confirm_logged_in();
    
    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $delete_user_result = deleteUser($user_id);

        if(!$delete_user_result){
            $message = 'Failed to delete user!';
        }
    }

    $users = getAllUsers();
    if(!$users){
        $message = 'Failed to get users list!';
    }
?>

<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="mt-4 text-center">Delete User</h3>

   <?php echo !empty($message)?$message:'';?>
   <?php if($users):?>
    <table class="border mt-5 mx-auto">
            <thead class="border">
                <tr>
                    <td class="border-right p-2">User ID</td>
                    <td class="border-right p-2">Username</td>
                    <td class="border-right p-2">User Email</td>
                    <td class="border-right p-2">Delete</td>
                </tr>
            </thead>
            <tbody>
                <?php while($user = $users->fetch(PDO::FETCH_ASSOC)):?>
                    <tr class="border-bottom">
                        <td class="border-right p-2"><?php echo $user['user_id'];?></td>
                        <td class="border-right p-2"><?php echo $user['user_username'];?></td>
                        <td class="border-right p-2"><?php echo $user['user_email'];?></td>
                        <td class="border-right p-2"><a href="admin_deleteuser.php?id=<?php echo $user['user_id'];?>">Delete</a></td>
                    </tr>
                <?php endwhile;?>
            </tbody>
    </table>
   <?php endif;?>

<?php include 'nav.php'; ?>

</body>
</html>