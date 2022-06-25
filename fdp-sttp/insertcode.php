<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'teacher_portal');

if(isset($_POST['insertdata']))
{
    $Academic_year = $_POST['Academic_year'];
    $Department = $_POST['Department'];
    $Title_Of_Program = $_POST['Title_Of_Program'];
    $Approving_Body = $_POST['Approving_Body'];
    $Grant_Amount = $_POST['Grant_Amount'];
    $Convener_Of_FDP_STTP = $_POST['Convener_Of_FDP_STTP'];
    $Dates_From = $_POST['Dates_From'];
    $Dates_To = $_POST['Dates_To'];
    $No_Of_Participants = $_POST['No_Of_Participants'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp,"images/$image");


    $query = "INSERT INTO ftpsttp 
    (`Academic_year`, `Department`, `Title_Of_Program`, `Approving_Body`, `Grant_Amount`, `Convener_Of_FDP_STTP`, `Dates_From`, `Dates_To`, `No_Of_Participants`, `image`) 
    VALUES ('$Academic_year', '$Department', '$Title_Of_Program', '$Approving_Body', '$Grant_Amount', '$Convener_Of_FDP_STTP', '$Dates_From', '$Dates_To', '$No_Of_Participants', '$image')";
    
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