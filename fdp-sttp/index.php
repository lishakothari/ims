<?php
include("excel.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> FDP / STTP </title>
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
</style>
<body>

    <div class="navbar mb-5">
        <img class="logo"src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="image" width="3%">
        <h3 class="name">Fr. Conceicao Rodrigues Institute Of Technology</h3>
        <a href="logout.php">Logout</a>
    </div>

    <!-- Modal -->
    <!-- this is add data form Make changes to variables, keep same variables -->
    <div class="modal fade mt-2" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST" enctype="multipart/form-data" >

                    <div class="modal-body">

                        <div class="form-group">
                            <label>Year</label>
                            <select name="Academic_year" class="form-control">
                                <option value="">--Select Year--</option>
                                <option name="Academic_year" value="2017-18">2017-18</option>
                                <option name="Academic_year" value="2018-19">2018-19</option>
                                <option name="Academic_year" value="2019-20">2019-20</option>
                                <option name="Academic_year" value="2020-21">2020-21</option>
                                <option name="Academic_year" value="2021-22">2021-22</option>
                                <option name="Academic_year" value="2021-22">2022-23</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <select name="Department" class="form-control">
                                <option value="">--Select Department--</option>
                                <option name="Department" value="Computer">Computer</option>
                                <option name="Department" value="Mechanical">Mechanical</option>
                                <option name="Department" value="EXTC">EXTC</option>
                                <option name="Department" value="Electrical">Electrical</option>
                                <option name="Department" value="IT">IT</option>
                                <option name="Department" value="Humanities">Humanities</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the professional development program </label>
                            <input type="text" name="Title_Of_Program" class="form-control" placeholder="Enter Title">
                        </div>

                        <!-- <div class="form-group">
                            <label>Approving Body </label>
                            <select id="Approving_Body" name="Approving_Body" class="form-control">
                                <option value="">--Select Body-- (If other, kindly mention in textbox below)</option>
                                <option name="Approving_Body" value="AICTE">AICTE</option>
                                <option name="Approving_Body" value="ISTE">ISTE</option>
                            </select>
                            <label> Other: </label>
                            <input type="text" name="Approving_Body" placeholder="Enter name of Approving Body" />
                        </div> -->

                        <div class="form-group">
                            <label> Mention Approving Body Name (Eg - AICTE, ISTE, etc.)</label>
                            <input type="text" name="Approving_Body" class="form-control" placeholder="Mention Approving Body Name">
                        </div>

                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input type="text" name="Grant_Amount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input type="text" name="Convener_Of_FDP_STTP" class="form-control" placeholder="Enter Name of Convener">
                        </div>

                        <div class="form-group">
                            <label> Starting Date </label>
                            <input type="date" id="Dates_From" name="Dates_From" class="form-control" placeholder="Enter Start Date">
                        </div>

                        <div class="form-group">
                            <label> Ending Date </label>
                            <input type="text" id="Dates_To" name="Dates_To" class="form-control" placeholder="dd/mm/yyyy">
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input type="text" name="No_Of_Participants" class="form-control" placeholder="Enter Number of Participants">
                        </div>


                        <input type="file" name="image" id="profile-img" required/><br>
                                    <img src="" id="profile-img-tag" width="100px" />

                                    <script type="text/javascript">
                                        function readURL(input) {
                                            if (input.files && input.files[0]) {
                                                var reader = new FileReader();
                                                
                                                reader.onload = function (e) {
                                                    $('#profile-img-tag').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                        $("#profile-img").change(function(){
                                            readURL(this);
                                        });
                                    </script><br>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="insertbutton" name="insertdata" class="btn btn-primary" onClick="datechecker() ">Save Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- DELETE POP UP FORM  -->
    <!-- dont make changes-->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes, Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

 <!-- h2 change-->
            <div class="card">
                <div class="card-body">
            <div class="card-body mt-5">
                <h2> FDP / STTP </h2>
            </div>
            <div class="card">
                <div class="card-body btn-group">
                <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal"> 
                        ADD DATA
                    </button>
            </form> &nbsp;
            <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">					
				<button type="submit" id="export_data" name='export_data' value="Export to excel" class="btn btn-success">Export to excel</button>
			</form> &nbsp; &nbsp;
        
            <form method="post">
                <label>Search</label>
                <input type="text" name="search">
                <input type="submit" name="submit">
            </form>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'teacher_portal');

                $query = "SELECT * FROM ftpsttp";
                $query_run = mysqli_query($connection, $query);
            ?>  <!-- th change -->
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col"> ID </th>
                                <th scope="col"> YEAR </th>
                                <th scope="col"> DEPT </th>
                                <th scope="col"> TITLE </th>
                                <th scope="col"> APPROVING BODY </th>
                                <th scope="col"> GRANT AMOUNT </th>
                                <th scope="col"> CONVENER </th>
                                <th scope="col"> FROM DATE </th>
                                <th scope="col"> END DATE </th>
                                <th scope="col"> COUNT </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                                <th scope="col"> DOWNLOAD </th>
                            </tr>
                        </thead>
                        <?php
                if($developer_records)
                {
                    foreach($developer_records as $developer)
                    {
            ?>
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $developer['id']; ?> </td>
                                <td> <?php echo $developer['Academic_year']; ?> </td> 
                                <td> <?php echo $developer['Department']; ?> </td> 
                                <td> <?php echo $developer['Title_Of_Program']; ?> </td>
                                <td> <?php echo $developer['Approving_Body']; ?> </td>
                                <td> <?php echo $developer['Grant_Amount']; ?> </td>
                                <td> <?php echo $developer['Convener_Of_FDP_STTP']; ?> </td>
                                <td> <?php echo $developer['Dates_From']; ?> </td>
                                <td> <?php echo $developer['Dates_To']; ?> </td>
                                <td> <?php echo $developer['No_Of_Participants']; ?> </td>
                        
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
                                </td>
                                <td>
                                    <a href="uploads/<?php echo $row['filename']; ?>" download> Download
                                </td>
                            </tr>
                        </tbody>
                        <?php           
                    }
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>
                    </table>
                </div>
            </div>


        </div>
    </div>

        <!-- EDIT POP UP FORM  -->
    <!-- this is edit data form Make changes to variables and placeholder, keep same variables -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Data </h5> &nbsp;
                    <h5 class="modal-title" id="exampleModalLabel"> (Please enter the dates again)</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>Year</label>
                            <select name="Academic_year" class="form-control">
                                <option value="">--Select Year--</option>
                                <option id='Academic_year' name="Academic_year" value="2017-18" 
                                    <?php 
                                        if($developer["Academic_year"] == '2017-18') {
                                            echo "selected";
                                        }
                                    ?>    
                                >2017-18</option>
                                <option id='Academic_year' name="Academic_year" value="2018-19"
                                <?php 
                                        if($developer["Academic_year"] == '2018-19') {
                                            echo "selected";
                                        }
                                    ?>  
                                >2018-19</option>
                                <option id='Academic_year' name="Academic_year" value="2019-20"
                                <?php 
                                        if($developer["Academic_year"] == '2019-20') {
                                            echo "selected";
                                        }
                                    ?>  
                                >2019-20</option>
                                <option id='Academic_year' name="Academic_year" value="2020-21"
                                <?php 
                                        if($developer["Academic_year"] == '2020-21') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >2020-21</option>
                                <option id='Academic_year' name="Academic_year" value="2021-22"
                                <?php 
                                        if($developer["Academic_year"] == '2021-22') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >2021-22</option>
                                <option id='Academic_year' name="Academic_year" value="2022-23"
                                <?php 
                                        if($developer["Academic_year"] == '2022-23') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >2022-23</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <select name="Department" class="form-control">
                                <option value="">--Select Department--</option>
                                <option id='Department' name="Department" value="Computer"
                                <?php 
                                        if($developer["Department"] == 'Computer') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >Computer</option>
                                <option id='Department' name="Department" value="Mechanical"
                                <?php 
                                        if($developer["Department"] == 'Mechanical') {
                                            echo "selected";
                                        }
                                    ?> 
                                     >Mechanical</option>
                                <option id='Department' name="Department" value="EXTC"
                                <?php 
                                        if($developer["Department"] == 'EXTC') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >EXTC</option>
                                <option id='Department' name="Department" value="Electrical"
                                <?php 
                                        if($developer["Department"] == 'Electrical') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >Electrical</option>
                                <option id='Department' name="Department" value="IT"
                                <?php 
                                        if($developer["Department"] == 'IT') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >IT</option>
                                <option id='Department' name="Department" value="Humanities"
                                <?php 
                                        if($developer["Department"] == 'Humanities') {
                                            echo "selected";
                                        }
                                    ?>  
                                    >Humanities</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the professional development program </label>
                            <input id='Title_Of_Program' type="text" name="Title_Of_Program" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Approving Body </label>
                            <input id="Approving_Body" type="text" name="Approving Body" class="form-control" placeholder="AICTE/ISTE/Others">
                        </div>
                        
                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input id='Grant_Amount' type="text" name="Grant_Amount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input id='Convener_Of_FDP_STTP' type="text" name="Convener_Of_FDP_STTP" class="form-control" placeholder="Enter Name of Convener">
                        </div>

                        <div class="form-group">
                            <label> Starting Date </label>
                            <input type="date" id="Dates_From" name="Dates_From" class="form-control" placeholder="Enter Start Date">
                        </div>

                        <div class="form-group">
                            <label> Ending Date </label>
                            <input type="date" id="Dates_To" name="Dates_To" class="form-control" placeholder="Enter End Date">
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input id= "No_Of_Participants" type="text" name="No_Of_Participants" class="form-control" placeholder="Enter Number of Participants">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

                <div class="card-body">
                <h4> Search Data </h4>
                    <table class="table table-bordered ">
                    <thead>
                        <tr>
                            <th> ID </th> 
                            <th> YEAR </th>
                            <th> DEPT </th>
                            <th> TITLE </th>
                            <th> APPROVING BODY </th>
                            <th> GRANT AMOUNT </th>
                            <th> CONVENER </th>
                        </tr>
                    <thead>       
<?php 
    if (isset($_POST["submit"])) {
        $str = mysqli_real_escape_string($connection, $_POST["search"]);
        $sth = "SELECT * FROM `ftpsttp` WHERE Department LIKE '%$str%' OR Academic_year LIKE '%$str%' OR Approving_Body LIKE '%$str%' OR Title_Of_Program LIKE '%$str%' OR Convener_Of_FDP_STTP LIKE '%$str%' ";
    
        $result = mysqli_query($connection, $sth);
        $queryresult = mysqli_num_rows($result); ?>

                    <div> Results- </div>
                    <tbody> 
             
                    <tr> 
                    <?php if($queryresult > 0){
                while($row = mysqli_fetch_assoc($result)){                  
                        echo" <td>".$row['id']."</td>
                        <td> ".$row['Academic_year']." </td> 
                        <td> ".$row['Department']." </td> 
                        <td> ".$row['Title_Of_Program']." </td> 
                        <td> ".$row['Approving_Body']." </td> 
                        <td> ".$row['Grant_Amount']." </td> 
                        <td> ".$row['Convener_Of_FDP_STTP']." </td> 
                    </tr> 
                    <tbody>
            </table>
                </div>";
            }

        } else {
            echo "No Results Found";
        }
    }
?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>

    <script type="text/javascript">
        function EnableDisableTextBox(Approving_Body) {
            var selectedValue = Approving_Body.options[Approving_Body.selectedIndex].value;
            var txtOther = document.getElementById("txtOther");
            txtOther.disabled = selectedValue == other ? false : true;
            if (!txtOther.disabled) {
                txtOther.focus();
            }
        }
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);
                //chnage this keep same variable as above
                $('#update_id').val(data[0]);
                $('#Academic_year').val(data[1]);
                $('#Department').val(data[2]);
                $('#Title_Of_Program').val(data[3]);
                $('#Approving_Body').val(data[4]);
                $('#Grant_Amount').val(data[5]);
                $('#Convener_Of_FDP_STTP').val(data[6]);
                $('#Dates_From').val(data[7]);
                $('#Dates_To').val(data[8]);
                $('#No_Of_Participants').val(data[9]);
            });
        });
    </script>

<script>
        function datechecker() {
            if(document.getElementById('insertbutton').clicked == true) {
                alert("Dhjkd");
            }
        }
</script>

</body>
</html>


                