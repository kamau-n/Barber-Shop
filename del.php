<?php

include("connection.php");

$to_delete = $_POST["to_delete"];





$sql1 = "delete from Customers where id  ='$to_delete'";
$res = $conn->query($sql1);

if ($res) {
    echo "<script>
    alert('User Successfully deleted');
    window.location.href='panel.php';

    </script>";;
}
