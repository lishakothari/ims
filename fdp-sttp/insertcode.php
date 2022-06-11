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
    $participants = $_POST['participantcount'];

    $query = "INSERT INTO ftpsttp (`academicyear`, `department`, `titleprogram`, `approvingbody`, `grantamount`, `convener`, `participantcount`) VALUES ('$academicyear', '$department', '$title', '$approvingbody', '$grantamount', '$convener', '$participants')";
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

