<?php

session_start();
error_reporting(error_reporting() & ~E_NOTICE);

include("connection.php");

//getting data from the databases
$sql2 = "SELECT * FROM Enrolled";
$sql1 = "SELECT * FROM Customers";
$user_id =




    $class_update = $_POST["id"];
$sql3 = "update Enrolled set approved ='yes' where user_id = '$user_id' and class_id ='$class_update'";

if ($conn->query($sql3) === TRUE) {
    echo "<script>
    alert('account  update sucessful');

    </script>";;
} else {
    echo "<script>
    alert('account  update unsucessful');

    </script>";;
}




$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin Panel</title>
</head>

<body>
    <h3>Admin Panel</h3>

    <h4>Pending Enrollements</h4>
    <table>
        <form method="POST" action="">
            <thead>
                <tr>
                    <th>User_id</th>
                    <th>Class_id</th>
                    <th>Paid</th>
                    <th>Status</th>
                    <th>Select</th>
                    <th>Approve</th>

                </tr>

            </thead>

            <tbody>


                <?php

                while ($row = $result2->fetch_assoc()) {


                ?>
                    <tr>
                        <td>
                            <?php
                            echo $row["user_id"];


                            ?>
                        </td>

                        <td>
                            <?php
                            echo $row["class_id"];


                            ?>
                        </td>


                        <td>
                            <?php
                            if ($row["paid"]) {
                                echo "Paid";
                            } else {
                                echo "Not Paid";
                            };


                            ?>
                        </td>
                        <td>
                            <?php
                            echo $row["approved"];


                            ?>


                        </td>

                        <td>
                            <input type="radio" name="id" value="  <?php
                                                                    echo $row["class_id"];


                                                                    ?>">

                        </td>

                        <td>
                            <button type="Submit">Approve</button>
                        </td>


                    </tr>

                <?php } ?>

            </tbody>
        </form>


    </table>








    <h4>Enrolled Users</h4>

    <table>
        <thead>
            <tr>
                <th>
                    #



                </th>

                <th>
                    Fname



                </th>
                <th>
                    LName



                </th>
                <th>
                    Email



                </th>
                <th>Select</th>
                <th>Delete</th>




            </tr>




        </thead>

        <tbody>
            <form method="POST" action="del.php">

                <?php

                while ($row = $result1->fetch_assoc()) {


                ?>

                    <tr>
                        <td>
                            <?php
                            echo $row["id"];


                            ?>


                        </td>
                        <td>
                            <?php
                            echo $row["Fname"];


                            ?>


                        </td>
                        <td>
                            <?php
                            echo $row["Lname"];


                            ?>


                        </td>



                        <td>
                            <?php
                            echo $row["Email"];


                            ?>

                        </td>
                        <td>
                            <input type="radio" name="to_delete" value="  <?php
                                                                            echo $row["id"];


                                                                            ?>">
                        </td>
                        <td>
                            <button type="Submit">Delete</button>
                        </td>





                    </tr>



                <?php } ?>

            </form>
        </tbody>



    </table>













</body>

</html>