<?php
require_once ('config.php'); // For storing username and password.
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/signin.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Login Form</h2>
        <label for="inputUsername" class="sr-only">Username</label>
        <input name="Username" type="username" value="masredie" id="inputUsername" class="form-control" placeholder="Username" autocomplete="off" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="Password" type="password" value="123456" id="inputPassword" class="form-control" placeholder="Password" required>
        <button name="Submit" value="Login" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

        <?php
        if(isset($_POST['Submit'])){

            // hash check
            $result = password_verify($_POST['Password'], $Password);

            /* Check apakah username and password cocok */
            if( ($_POST['Username'] == $Username) && ($result === true) ) {

                /* Success: Set session variables and redirect to protected page */
                $_SESSION['Username'] = $Username;

                $_SESSION['Active'] = true;
                header("location:index.php");
                exit;

            } else {
                ?>
                <!-- Tampilkan pesan kesalahan -->
                &nbsp;
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Gagal login.</strong> Silahkan ulangi lagi
                </div>
                <?php
            }
        }
        ?>

    </form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
