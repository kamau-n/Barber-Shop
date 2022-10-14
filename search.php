<?php


session_start();

include("connection.php");





if (!isset($_SESSION['email'])) {
    header("location:index.php");
}


// the process of booking a class in the gym;


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $user_id = $_SESSION['id'];
    $amount = 500;
    $class_id = $_POST["to_book"];


    ///Saving the data into the Database;

    $sql = "INSERT INTO Enrolled (class_id,user_id,amount) VALUES('$class_id','$user_id','$amount')";

    if ($conn->query($sql) === TRUE) {

        echo "<script>
           alert('Class registration sucessful');
           window.location.href='portal.php';



           
          </script>";;
    } else {
        echo "<script>
            alert('class registration unsucessful');

            </script>";;
        echo $conn->error;
    }
}






include("connection.php");
// Quering the classes which are available

$sql1 = 'SELECT * FROM Classes';

$result = $conn->query($sql1);

// output data of each row






?>




<!DOCTYPE html>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">


    <title>Search</title>
</head>


<h4>Find a class</h4>



<div class="cls">
    <?php

    while ($row = $result->fetch_assoc()) {



    ?>
        <div class="class-data">
            <form method="POST" action="">
                <h2>
                    <?php
                    echo $row['Name'];
                    ?>
                </h2>
                <h4>
                    TRAINER :<?php echo $row['Trainer'] ?>
                </h4>
                <h4>
                    TIME: <?php echo $row['Time'] ?>
                </h4>

                <h4>
                    DURATION<?php echo $row['Duration'] ?>
                </h4>


                <button type="submit" class="reg-btn" name="to_book" value=" <?php echo $row['id'] ?>">
                    REGISTER


                </button>
            </form>


        </div>
    <?php

    }
    ?>

</div>



</body>


</html>