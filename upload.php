<?php

include("connection.php");



echo $_FILES['filetoupload']['name'];

$filename = $_FILES["filetoupload"]["name"];
$tempname = $_FILES["filetoupload"]["tmp_name"];
$folder = "./uploads/" . $filename;
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];




$sql = "INSERT INTO Customers (Fname,Lname,Email,dp_link) VALUES('$fname','$lname','$email','$filename')";
$result = $conn->query($sql);

if (!$result) {
    echo mysqli_error($conn);

    die();
} else {
    echo "Query succesfully executed!";
}


if (move_uploaded_file($tempname, $folder)) {
    echo "<h3>  Image uploaded successfully!</h3>";
} else {
    echo "<h3>  Failed to upload image!</h3>";
}
