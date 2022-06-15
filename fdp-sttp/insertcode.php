<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'teacher_portal');

if(isset($_POST['insertdata']))
{
    $academicyear = $_POST['academicyear'];
    $department = $_POST['department'];
    $title = $_POST['titleprogram'];
    $approvingbody = $_POST['approvingbody'];
    $grantamount = $_POST['grantamount'];
    $convener = $_POST['convener'];
    $fromdate = $_POST['fromdate'];
    $enddate = $_POST['enddate'];
    $participants = $_POST['participantcount'];


    $query = "INSERT INTO ftpsttp 
    (`academicyear`, `department`, `titleprogram`, `approvingbody`, `grantamount`, `convener`, `fromdate`, `enddate`, `participantcount`) 
    VALUES ('$academicyear', '$department', '$title', '$approvingbody', '$grantamount', '$convener', '$fromdate', '$enddate', '$participants')";
    
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
