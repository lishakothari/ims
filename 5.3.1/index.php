<?php
include("excel.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> 5.3.1 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <img src="https://i.postimg.cc/wvDjdZdp/logo.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
          Fr. Conceicao Rodrigues Institute Of Technology
        </a>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="insertcode.php" method="POST">

                    <div class="modal-body">
                        <div class="form-group">
                            <label> Name of Student </label>
                            <input type="text" name="sname" class="form-control" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label> Award Name </label>
                            <input type="text" name="aname" class="form-control" placeholder="Enter Award Name">
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="year" class="form-control">
                                <option value="">--Select Year--</option>
                                <option value="2020-21">2020-21</option>
                                <option value="2021-22">2021-22</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="">--Select Type--</option>
                                <option value="Team"> Team </option>
                                <option value="Individual"> Individual </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Select Level--</option>
                                <option value="University">University</option>
                                <option value="State">State</option>
                                <option value="National">National</option>
                                <option value="International">International</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Criteria</label>
                            <select name="criteria" class="form-control">
                                <option value="">--Select Criteria--</option>
                                <option value="Sports">Sports</option>
                                <option value="Cultural">Cultural</option>
                            </select>
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

    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit sapr Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="update_id" id="update_id">

                        <div class="form-group">
                            <label> Name of Student </label>
                            <input type="text" name="sname" class="form-control" placeholder="Enter Name">
                        </div>

                        <div class="form-group">
                            <label> Award Name </label>
                            <input type="text" name="aname" class="form-control" placeholder="Enter Award Name">
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="year" class="form-control">
                                <option value="">--Select Year--</option>
                                <option value="2020-21">2020-21</option>
                                <option value="2021-22">2021-22</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Type</label>
                            <select name="type" class="form-control">
                                <option value="">--Select Type--</option>
                                <option value="Team"> Team </option>
                                <option value="Individual"> Individual </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="year" class="form-control">
                                <option value="">--Select Year--</option>
                                <option value="Sports">Sports</option>
                                <option value="Cultural">Cultural</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Level</label>
                            <select name="level" class="form-control">
                                <option value="">--Select Level--</option>
                                <option value="University">University</option>
                                <option value="State">State</option>
                                <option value="National">National</option>
                                <option value="International">International</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Criteria</label>
                            <select name="criteria" class="form-control">
                                <option value="">--Select Criteria--</option>
                                <option value="Sports">Sports</option>
                                <option value="Cultural">Cultural</option>
                            </select>
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

    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete sapr Data </h5>
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
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> 5.3.1 </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal"> 
                        ADD DATA
                    </button> &nbsp;
                    <button type="submit" id="export" name="export"
                    value="Export to excel" class="btn btn-success">Export To Excel</button>
                    </form>

                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'sapr');

                $query = "SELECT * FROM fivethreeone";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Award Name</th>
                                <th scope="col">Student Name </th>
                                <th scope="col"> Type</th>
                                <th scope="col"> Level </th>
                                <th scope="col"> Criteria </th>
                                <th scope="col"> Year </th>
                                <th scope="col"> EDIT </th>
                                <th scope="col"> DELETE </th>
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                        <tbody>
                        
                            <tr>
                                <td> <?php echo $row['aname']; ?> </td>
                                <td> <?php echo $row['sname']; ?> </td>
                                <td> <?php echo $row['type']; ?> </td>
                                <td> <?php echo $row['level']; ?> </td>
                                <td> <?php echo $row['criteria']; ?> </td>
                                <td> <?php echo $row['year']; ?> </td>
                                <td>
                                    <button type="button" class="btn btn-success editbtn"> EDIT </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> DELETE </button>
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

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
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

                $('#update_id').val(data[0]);
                $('#aname').val(data[1]);
                $('#sname').val(data[2]);
                $('#type').val(data[3]);
                $('#level').val(data[4]);
                $('#criteria').val(data[4]);
                $('#year').val(data[4]);
            });

        });
    </script>


</body>
</html>

                            
                                
                                
                                