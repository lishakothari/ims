<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $progname = $_POST['progname'];
    $implementationyear = $_POST['implementationyear'];
    $studnum = $_POST['studnum'];
    $agname = $_POST['agname'];
    $branch = $_POST['branch'];

        $query = "UPDATE fiveonethree SET progname='$progname',implementationyear='$implementationyear', studnum='$studnum', agname='$agname', branch='$branch' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>