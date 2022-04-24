<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $rnum = $_POST['rnum'];
        $ename = $_POST['ename'];
        $eyear = $_POST['eyear'];

        $query = "UPDATE fivethreethree SET fname='$fname', lname='$lname', rnum='$rnum', ename='$ename', eyear='$eyear' WHERE id='$id'  ";
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