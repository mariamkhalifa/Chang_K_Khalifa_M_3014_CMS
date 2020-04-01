<?php 
    require_once '../load.php';
    confirm_logged_in();
?>

<?php include 'head.php'; ?>

    <h2 class="mt-5 text-center">Admin Panel</h2>
    <h3 class="h5 text-center mt-3">Hi <?php echo $_SESSION['user_username']; ?>!</h2>

    <?php include 'nav.php'; ?>
</body>
</html>