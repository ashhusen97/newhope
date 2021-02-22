<?php
session_start();

if (isset($_SESSION['is_login']) && isset($_SESSION['is_login']) == 'yes') {
    header('location:index.php');
}
include('../includes/connection.php');
if (isset($_POST['login'])) {
    if ($_POST['email'] != '' || $_POST['password'] != '') {


        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * from admin_users where email = '$email' and password = '$password'";
        $res = mysqli_query($con, $sql);
        if (mysqli_num_rows($res) > 0) {
            $_SESSION['is_login'] = 'yes';
            header('location:index.php');
        } else {
            header('location:login.php?er=1');
        }
    } else {
        header('location:login.php?er=2');
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/logo/logo3_.png">
    <link rel="stylesheet" href="assets/css/custom.css ">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

<body>

    <?php if (isset($_GET['er'])) {

    ?>
    <div class="flash_data" data-flashdata="<?= $_GET['er'] ?>"></div>
    <?php
    }
    ?>
    <div class="wrapper d-flex align-items-center justify-content-center flex-column">

        <img src="../images/logo1_.png" alt="" class="img-fluid">
        <div class="col-lg-4 col-xs-12 col-sm-12 col-md-8">
            <h1>Sign In</h1>
            <form action="" method="POST">
                <input type="email" name="email" placeholder="Email" class="form-control">
                <input type="password" name="password" placeholder="Password" class="form-control">
                <button class="btn" type="submit" name="login">Continue <i class="fa fa-chevron-right"></i></button>
            </form>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    const flashdata = $(".flash_data").data("flashdata");
    if (flashdata) {
        if (flashdata == 1) {
            swal("Login Failed", "Incorrect username or password", "error");
        } else if (flashdata == 2) {
            swal("Login Failed", "Username or password cant be empty", "error");
        }
    }
    </script>
</body>

</html>