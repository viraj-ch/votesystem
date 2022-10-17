<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location: admin/home.php');
    exit();
}

if (isset($_SESSION['voter'])) {
    header('location: home.php');
    exit();
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <b>Reset Password</b>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Set A New Password</p>

            <form action="includes/set-password-for-user.php" method="POST">
                <div class="form-group has-feedback">
                    <label for="newpass">New Password : </label>
                    <input type="hidden" value="<?php echo $_GET['requestid'];?>" name="requestid">
                    <input type="password" name="newpass" id="newpass" class="form-control">
                </div>

                <div class="form-group has-feedback">
                    <label for="retypenewpass">Confirm Password : </label>
                    <input type="hidden" value="<?php echo $_GET['requestid'];?>" name="requestid">
                    <input type="password" name="retypenewpass" id="retypenewpass" class="form-control">
                </div>


                <div class="form-group text-center">
                    <button type="submit" name="updatebtnpass" id="updatebtnpass" class="btn btn-primary">Reset Now</button>
                </div>
            </form>
        </div>
</body>

</html>