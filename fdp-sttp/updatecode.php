<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'teacher_portal');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];
       
        $Academic_year = $_POST['Academic_year'];
        $Title_Of_Program= $_POST['Title_Of_Program'];
        $Approving_Body = $_POST['Approving_Body'];
        $Grant_Amount = $_POST['Grant_Amount'];
        $Convener_Of_FDP_STTP = $_POST['Convener_Of_FDP_STTP'];
        $Dates_From = $_POST['Dates_From'];
        $Dates_To = $_POST['Dates_To'];
        $No_Of_Participants = $_POST['No_Of_Participants'];
        $Department = $_POST['Department'];

       

        $query = "UPDATE ftpsttp SET Academic_year = '$Academic_year', Department = '$Department', Title_Of_Program = '$Title_Of_Program', Approving_Body = '$Approving_Body', Grant_Amount = '$Grant_Amount', Convener_Of_FDP_STTP = '$Convener_Of_FDP_STTP', Dates_From = '$Dates_From', Dates_To = '$Dates_To', No_Of_Participants = '$No_Of_Participants' WHERE id='$id'  ";
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