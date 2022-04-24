<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

if(isset($_POST['insertdata']))
{
    $progname = $_POST['progname'];
    $implementationyear = $_POST['implementationyear'];
    $studnum = $_POST['studnum'];
    $agname = $_POST['agname'];
    $branch = $_POST['branch'];

    $query = "INSERT INTO fiveonethree (`progname`,`implementationyear`,`studnum`,`agname`,`branch`) VALUES ('$progname','$implementationyear','$studnum','$agname','$branch')";
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