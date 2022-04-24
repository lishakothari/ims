<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $rnum = $_POST['rnum'];
    $ename = $_POST['ename'];
    $eyear = $_POST['eyear'];

    $query = "INSERT INTO fivethreethree (`fname`,`lname`,`rnum`,`ename`,`eyear`) VALUES ('$fname','$lname','$rnum','$ename','$eyear')";
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