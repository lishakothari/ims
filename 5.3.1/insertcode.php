<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

if(isset($_POST['insertdata']))
{
    $aname = $_POST['aname'];
    $sname = $_POST['sname'];
    $year = $_POST['year'];
    $type = $_POST['type'];
    $level = $_POST['level'];
    $criteria = $_POST['criteria'];

    $query = "INSERT INTO fivethreeone (`aname`,`sname`,`year`,`type`,`level`,`criteria`) VALUES ('$aname','$sname','$year','$type','$level','$criteria')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>