<?php

$username_err = $username = $password = $pass_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];



    //check if the password is collect

    if ($password == 'adminpassword') {

        echo "<script>
        
        window.location.href='panel.php';
        </script>";;
    } else {
        $pass_error = "Password is incorrect";
    }
}







?>



<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>

<body>


    <form method="POST" action="" class="myform">
        <h3>ADMIN PANEL</h3>
        <div>
            <input type="text" name="username" class="input-form" placeholder="Enter your username">
        </div>
        <div>
            <p><?php echo $pass_error ?></p>
            <input type="password" name="password" class="input-form" placeholder="Enter Your Password">
        </div>
        <button>Login</button>

    </form>


</body>

</html>