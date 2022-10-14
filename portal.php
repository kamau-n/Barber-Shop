<?php

session_start();


error_reporting(E_ALL | E_STRICT);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);



echo '/Uploads/' . $_SESSION["dp"];


if (!isset($_SESSION['email'])) {
    header("location:index.php");
}

include("connection.php");

$user_id =  $_SESSION['id'];



$sql = "select * from Enrolled 
inner join Classes
ON user_id = '$user_id'  and
Enrolled.class_id = Classes.id

";

$result = $conn->query($sql);

$sql2 = "select sum(amount) as total from Enrolled where user_id = '$user_id'";

$t_amount = $conn->query($sql2);

$row = $t_amount->fetch_assoc();
$total =  $row['total'];










?>


<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Barber Shop</title>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>

<body>

    <div class="info">
        <h4>HELLO <?php echo $_SESSION['name'] ?> Welcome Back </h4>
        <div class="pp">
            <img src="<?php echo '/Uploads/' . $_SESSION["dp"] ?>" alt="No Image">
        </div>

    </div>
    <div class="header">
        <div class="top">
            <i class="fa fa-home"></i>
            <p>0</p>
            <p>Check-ins</p>

        </div>

        <div class="top">
            <i class="fa fa-envelope"></i>
            <p>0</p>
            <p>Messages</p>

        </div>
        <div class="top">
            <i class='fas fa-wallet'></i>
            <p><?php
                echo $total; ?></p>
            <p>Due amount</p>


        </div>
    </div>
    <div class="links">

        <div class="pad">
            <i class="fa fa-book" style="font-size:30px"></i>
            <p>
                <a href="search.php">Book a Class</a>
            </p>



        </div>
        <div class="pad">
            <i class='far fa-calendar-alt' style="font-size:30px"></i>
            <p>


                <a href="booking.php">My Bookings</a>
            </p>



        </div>
        <div class="pad">
            <i class="fa fa-clock-o" style="font-size:30px"></i>
            <p> Class Schedule</p>



        </div>




    </div>


    <div class="links">

        <div class="pad">
            <i class="fa fa-play-circle" style="font-size:30px"></i>
            <p>Training Videos</p>



        </div>
        <div class="pad">
            <i class='fas fa-user-friends' style="font-size:30px"></i>
            <p> Refer A Friend</p>



        </div>
        <div class="pad">
            <i class='far fa-file-alt' style="font-size:30px"></i>
            <p> Offers</p>



        </div>




    </div>



    <h5 style="text-align:center">
        UPCOMMING CLASSES</h5>
    <div class="classes">


        <?php
        while ($row = $result->fetch_assoc()) {

        ?>
            <div class="class-tab">
                <h5>
                    <?php
                    echo $row["Name"];


                    ?>

                </h5>
                <h5>
                    Time: <?php echo $row['Time'] ?>
                </h5>

            </div>


        <?php } ?>






    </div>

    <!-- <div class="footer">
        <form action="logout.php" method="post">
            <button>Logout</button>

        </form>

    </div> -->

    <div class="footer">

        <div>
            <h4>Quick Links</h4>
            <a href="register.php">Register</a>
            <a href="register.php">Login</a>
            <a href="register.php">Classes</a>
            <a href="logout.php">Logout</a>
        </div>
        <div>
            <h4>About US</h4>
            <p>We are best gym you can find and we offer the best services you will ever find</p>
        </div>
        <div>
            <h4>Talk To Us</h4>
            <h5>Email :</h5>
            <h5>Phone :</h5>
            <h5>Address :</h5>

        </div>



    </div>






</body>

</html>