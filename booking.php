<?php

session_start();
include("connection.php");

if (!isset($_SESSION['email'])) {
    header("location:index.php");
}


$user_id = $_SESSION["id"];


$sql = "select * from Enrolled 
inner join Classes
ON user_id = '$user_id'  and
Enrolled.class_id = Classes.id

";

$result = $conn->query($sql);


if ($result->num_rows > 0) {




?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="booking.css">
        <title>Bookings</title>
    </head>

    <body>
        <h2>My Bookings</h2>



        <table>
            <thead>
                <tr>
                    <th>
                        #

                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Date

                    </th>
                    <th>
                        Duration

                    </th>

                    <th>
                        Amount

                    </th>




                </tr>



            </thead>

            <tbody>

                <?php

                while ($row = $result->fetch_assoc()) {


                ?>

                    <tr>


                        <td>

                            <?php

                            echo $row['id'];

                            ?>



                        </td>

                        <td>
                            <?php

                            echo $row['Name'];

                            ?>


                        </td>

                        <td>
                            <?php

                            echo $row['Time'];

                            ?>


                        </td>
                        <td>
                            <?php

                            echo $row['Duration'];

                            ?>


                        </td>
                        <td>
                            <?php

                            echo $row['Amount'];

                            ?>


                        </td>
                    </tr>


                <?php  } ?>


            </tbody>



        </table>










    </body>

    </html>


<?php  } ?>