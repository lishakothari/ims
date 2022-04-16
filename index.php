<?php 
    session_start();
    $conn = new mysqli("localhost", "root", "", "sapr");

    $msg="";

    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password= sha1($password);
        $usertype = $_POST['usertype'];

        $sql = "SELECT * FROM users WHERE username=? AND password=? AND user_type=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss",$username,$password,$usertype);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        session_regenerate_id();
        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['user_type'];
        session_write_close();

        if($result->num_rows==1 && $_SESSION['role']=="professor"){
            header("location:5.3.3/index.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="admin"){
            header("location:naac5.php");
        }
        else if($result->num_rows==1 && $_SESSION['role']=="superadmin"){
            header("location:dashboard.php");
        }
        else{
            $msg="username or password incorrect";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
</head>
<style>
    .navbar {
  overflow: hidden;
  background-color: #2196f3;
  position: fixed;
  top: 0;
  width: 100%;
  z-index:1;
}

.navbar img{
  float:left;
  padding-top: 5px;
}

.navbar h3{
  float: left;
  color: #f2f2f2;
  letter-spacing: normal;
  padding-left: 20px;
  padding-top: 14px;
}

.navbar a {
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}


.navbar a:hover {
  background: #ddd;
  color: black;
}

.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
    height: 30px;
   background-color: #2196f3;
}

.footer a{
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding-bottom: 14px;
  padding-left: 14px;
  padding-top: 3px;
  text-decoration: none;
}

.footer a:hover {
  background: #ddd;
  color: black;
}

.footer p{
  float: right;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding-bottom: 14px;
  padding-right: 14px;
  padding-top: 3px;
  text-decoration: none;
}

</style>
<body class="bg-dark">
<div class="navbar">
    <img class="logo"src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image" width="3%">
    <h3 class="name">Fr. Conceicao Rodrigues Institute Of Technology</h3>
  </div>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-5 bg-light mt-5 px-0">
                <h3 class="text-center text-light bg-primary p-3"> Login </h3>
                <form action= "<?= $_SERVER['PHP_SELF'] ?>" method="post" class="p-4">

                    <div class="form-group"> 
                        <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" required>
                    </div>

                    <div class="form-group"> 
                        <input type="text" name="password" class="form-control form-control-lg" placeholder="Password" required>
                    </div>

                    <div class="form-group"> 
                        <label for="userType"> I am a :  </label>
                        <input type="radio" name="usertype" value="professor" class="custom-radio" required> Professor | &nbsp;
                        <input type="radio" name="usertype" value="admin" class="custom-radio" required> Criteria Admin | &nbsp;
                        <input type="radio" name="usertype" value="superadmin" class="custom-radio" required> Main Admin |
                    </div>

                    <div class="form-group"> 
                        <input type="submit" name="login" class="btn btn-primary btn-block">
                    </div>

                    <h5 class="text-danger text-center"><?= $msg; ?> </h5>

                </form>
            </div>
        </div>
    </div>  
    <div class="footer">
<p>Student Achievements and Placement Records</p>
</div>  
</body>
</html>