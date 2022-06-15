<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'teacher_portal');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
        
        $academicyear = $_POST['academicyear'];
        $department = $_POST['department'];
        $title = $_POST['titleprogram'];
        $approvingbody = $_POST['approvingbody'];
        $grantamount = $_POST['grantamount'];
        $convener = $_POST['convener'];
        $fromdate = $_POST['fromdate'];
        $enddate = $_POST['enddate'];
        $participants = $_POST['participantcount'];

        $query = "UPDATE ftpsttp SET academicyear = '$academicyear', department = '$department', titleprogram = '$title', approvingbody = '$approvingbody', grantamount = '$grantamount', convener = '$convener', fromdate = '$fromdate', enddate = '$enddate', participantcount = '$participants' WHERE id='$id'  ";
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