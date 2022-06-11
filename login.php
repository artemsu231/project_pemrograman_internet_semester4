<?php
session_start();
require 'functions.php';
if (isset($_SESSION["login"])) {
    header("Location: index.php");
}
if (isset($_POST["login"])) {

    $user = $_POST["user"];
    $pass = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM login WHERE user = '$user'");

    // cek user
    if (mysqli_num_rows($result) === 1) {

        // cek pass 
        $row = mysqli_fetch_assoc($result);
        if (password_verify($pass, $row["pass"])) {
            // set session
            $_SESSION["login"] = true;
            $_SESSION["user"] = $row["user"];

            // // cek remember me 
            // if (isset($_POST['remember'])) {
            //     // buat cookie

            //     setcookie('id', $row['id'], time() + 60);
            //     setcookie('key', hash('sha256', $row['user']), time() + 60);
            //     // setcookie('login', 'true', time() + 60);
            // }
        }
        header("Location: index.php");
        exit;
    }
    $error = true;
}
// if (isset($_POST["login"])) {
//     $user = $_POST["user"];
//     $pass = $_POST["pass"];
//     $result = mysqli_query($conn, "SELECT * FROM login WHERE user='$user'");
//     //cek user
//     if (mysqli_num_rows($result) === 1) {

//         //cek pass
//         $row = mysqli_fetch_array($result);
//         if (password_verify($pass, $row["pass"])) {
//             // set session 
//             $_SESSION["login"] = true;
//             // $_SESSION["user"] = $row["user"];
//             header("Location: index.php");
//             exit;
//         }
//     }
//     $error = true;
// }
?>

<!DOCTYPE html>
<html class="bg-navy">

<head>
    <meta charset="UTF-8">
    <title>AdminLTE | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
</head>

<body class="bg-navy">

    <div class="form-box" id="login-box">
        <div class="header">Sign In</div>
        <form action="" method="post">
            <div class="body bg-gray">
                <div class="form-group">
                    <input type="text" name="user" id="user" class="form-control" placeholder="User" />
                </div>
                <div class="form-group">
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="Password" />
                </div>
                <!-- <div class="form-group">
                        <input type="checkbox" name="remember" id="remember"/> Remember me
                    </div> -->
            </div>
            <div class="footer">
                <button type="submit" name="login" class="btn bg-olive btn-block">Sign me in</button>

                <a href="register.php" class="text-center">Register a new membership</a>
            </div>
        </form>

    </div>


    <!-- jQuery 2.0.2 -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

</body>

</html>