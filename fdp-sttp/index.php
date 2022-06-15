<?php
include("excel.php");
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> FTP / STTP </title>
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
                            <select name="eyear" class="form-control">
                                <option value="">--Select Year--</option>
                                <option name="academicyear" value="2017-18">2017-18</option>
                                <option name="academicyear" value="2018-19">2018-19</option>
                                <option name="academicyear" value="2019-20">2019-20</option>
                                <option name="academicyear" value="2020-21">2020-21</option>
                                <option name="academicyear" value="2021-22">2021-22</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <select name="eyear" class="form-control">
                                <option value="">--Select Department--</option>
                                <option name="department" value="Computer">Computer</option>
                                <option name="department" value="Mechanical">Mechanical</option>
                                <option name="department" value="EXTC">EXTC</option>
                                <option name="department" value="Electrical">Electrical</option>
                                <option name="department" value="IT">IT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the professional development program </label>
                            <input type="text" name="titleprogram" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label> Approved by - </label>
                            <select name="approvingbody" onchange='CheckApproval(this.value);'> 
                                <option>--SELECT A BODY--</option>  
                                <option value="AICTE">AICTE</option>
                                <option value="ISTE">ISTE</option>
                                <option value="others">others</option>
                            </select>
                            <input type="text" name="approvingbody" id="appproval" style='display:none;'/>
                        </div>

                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input type="text" name="grantamount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input type="text" name="convener" class="form-control" placeholder="Enter Name of Convener">
                        </div>

                        <div class="form-group">
                            <label> Starting Date </label>
                            <input type="date" name="fromdate" class="form-control" placeholder="Enter Start Date">
                        </div>

                        <div class="form-group">
                            <label> Ending Date </label>
                            <input type="date" name="enddate" class="form-control" placeholder="Enter End Date">
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input type="number" name="participantcount" class="form-control" placeholder="Enter Number of Participants">
                        </div>


                        <div class="form-group">
                            <label>Upload File</label>
                            <input type="file" name="files"> </input> 
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                    </div>
                </form>

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
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label>Year</label>
                            <select name="academicyear" class="form-control">
                                <option value="">--Select Year--</option>
                                <option name="academicyear" value="2017-18">2017-18</option>
                                <option name="academicyear" value="2018-19">2018-19</option>
                                <option name="academicyear" value="2019-20">2019-20</option>
                                <option name="academicyear" value="2020-21">2020-21</option>
                                <option name="academicyear" value="2021-22">2021-22</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <select name="department" class="form-control">
                                <option value="">--Select Department--</option>
                                <option name="department" value="Computer">Computer</option>
                                <option name="department" value="Mechanical">Mechanical</option>
                                <option name="department" value="EXTC">EXTC</option>
                                <option name="department" value="Electrical">Electrical</option>
                                <option name="department" value="IT">IT</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Title of the professional development program </label>
                            <input type="text" name="title-progran" class="form-control" placeholder="Enter Title">
                        </div>

                        <div class="form-group">
                            <label>Department</label>
                            <select name="approvingbody" class="form-control">
                                <option value="">--Select BODY--</option>
                                <option name="approvingbody" value="AICTE">AICTE</option>
                                <option name="approvingbody" value="ISTE">ISTE</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> If Sponsored, Enter Grant Amount </label>
                            <input type="text" name="grantamount" class="form-control" placeholder="Enter Grant Amount">
                        </div>

                        <div class="form-group">
                            <label> Convener of FDP/STTP </label>
                            <input type="text" name="convener" class="form-control" placeholder="Enter Name of Convener">
                        </div>

                        <div class="form-group">
                            <label> Number of Participants </label>
                            <input type="number" name="participantcount" class="form-control" placeholder="Enter Number of Participants">
                        </div>


                        <div class="form-group">
                            <input type="file" name="pdf_file" accept=".pdf"/>
                            <input type="hidden" name="MAX_FILE_SIZE" value="67108864"/> <!--64 MB's worth in bytes-->
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
                <h2> FTP / STTP </h2>
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
                                <td> <?php echo $developer['academicyear']; ?> </td>
                                <td> <?php echo $developer['department']; ?> </td>
                                <td> <?php echo $developer['titleprogram']; ?> </td>
                                <td> <?php echo $developer['approvingbody']; ?> </td>
                                <td> <?php echo $developer['grantamount']; ?> </td>
                                <td> <?php echo $developer['convener']; ?> </td>
                                <td> <?php echo $developer['fromdate']; ?> </td>
                                <td> <?php echo $developer['enddate']; ?> </td>
                                <td> <?php echo $developer['participantcount']; ?> </td>
                        
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>


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
                $('#academicyear').val(data[1]);
                $('#department').val(data[2]);
                $('#titleprogram').val(data[3]);
                $('#approvingbody').val(data[4]);
                $('#grantamount').val(data[5]);
                $('#convener').val(data[6]);
                $('#fromdate').val(data[7]);
                $('#enddate').val(data[8]);
                $('#participantcount').val(data[9]);
            });
        });
    </script>

</body>
</html>