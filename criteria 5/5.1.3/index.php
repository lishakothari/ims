<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> 5.1.3 </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
</head>
<body>

    <!-- Modal -->
    <!-- this is add data form Make changes to variables, keep same variables -->
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
                            <label> Name of the programme </label>
                            <input type="text" name="progname" class="form-control" placeholder="Name of the capability enhancement program">
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="implementationyear" class="form-control">
                                <option value="">--Select Year--</option>
                                <option value="2020-21">2020-21</option>
                                <option value="2021-22">2021-22</option>
                            </select>
                        </div>
                

                        <div class="form-group">
                            <label> Student Number </label>
                            <input type="number" name="studnum" class="form-control" placeholder="Number of students enrolled">
                        </div>

                        <div class="form-group">
                            <label> Name of the agencies </label>
                            <input type="text" name="agname" class="form-control" placeholder="Name of the agencies/consultants involved with contact details(if any)">
                        </div>

                        <div class="form-group">
                            <label> Branch of Student </label>
                            <input type="text" name="branch" class="form-control" placeholder="Branch">
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
                            <label> Name of the programme </label>
                            <input type="text" name="progname" class="form-control" placeholder="Name of the capability enhancement program">
                        </div>

                        <div class="form-group">
                            <label>Year</label>
                            <select name="implementationyear" class="form-control">
                                <option value="">--Select Year--</option>
                                <option value="2020-21">2020-21</option>
                                <option value="2021-22">2021-22</option>
                            </select>
                        </div>
                

                        <div class="form-group">
                            <label> Student Number </label>
                            <input type="number" name="studnum" class="form-control" placeholder="Number of students enrolled">
                        </div>

                        <div class="form-group">
                            <label> Name of the agencies </label>
                            <input type="text" name="agname" class="form-control" placeholder="Name of the agencies/consultants involved with contact details(if any)">
                        </div>  
                        
                        <div class="form-group">
                            <label> Branch of Student </label>
                            <input type="text" name="branch" class="form-control" placeholder="Branch">
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
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

 <!-- h2 change-->
    <div class="container">
        <div class="jumbotron">
            <div class="card">
                <h2> 5.1.3 </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
                        ADD DATA
                    </button>
                </div>
            </div>

            <div class="card">
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'sapr');

                $query = "SELECT * FROM fiveonethree";
                $query_run = mysqli_query($connection, $query);
            ?>  <!-- th change -->
                    <table id="datatableid" class="table table-bordered table-dark">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name of the programme</th>
                                <th scope="col">Year</th>
                                <th scope="col">Student Number</th>
                                <th scope="col">Name of the agencies</th>
                                <th scope="col">Branch</th>
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
                        <tbody> <!-- change -->
                            <tr>
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['progname']; ?> </td>
                                <td> <?php echo $row['implementationyear']; ?> </td>
                                <td> <?php echo $row['studnum']; ?> </td>
                                <td> <?php echo $row['agname']; ?> </td>
                                <td> <?php echo $row['branch']; ?> </td>
                                

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
                //change this keep same variable as above
                $('#update_id').val(data[0]);
                $('#progname').val(data[1]);
                $('#implementationyear').val(data[2]);
                $('#studnum').val(data[3]);
                $('#agname').val(data[4]);
                $('#branch').val(data[5]);
            
                
            });
        });
    </script>


</body>
</html>