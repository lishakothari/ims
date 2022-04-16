<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'sapr');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $aname = $_POST['aname'];
        $sname = $_POST['sname'];
        $year = $_POST['year'];
        $type = $_POST['type'];
        $level = $_POST['level'];
        $criteria = $_POST['criteria'];

        $query = "UPDATE fivethreeone SET aname='$aname', sname='$sname', type='$type', year='$year', level='$level', criteria='$criteria' WHERE id='$id'  ";
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