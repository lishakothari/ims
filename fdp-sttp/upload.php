<?php
//check if form is submitted
if (isset($_POST['insertdata']))
{
    $filename = $_FILES['files']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['pdf'];
    
        //check if file type is valid
        if (in_array($ext, $allowed))
        {
            // get last record id
            $sql = 'select max(id) as id from ftpsttp';
            $result = mysqli_query($connection, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = 'uploads/';
            move_uploaded_file($_FILES['files']['tmp_name'],($path . $filename));
            
            // insert file details into database
            $sql = "INSERT INTO ftpsttp(file) VALUES('$filename')";
            mysqli_query($connection, $sql);
            header("Location: index.php");
        }
        else
        {
            header("Location: index.php");
        }
    }
    else
        header("Location: index.php");
}
?>

