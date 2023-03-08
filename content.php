<div class="container-fluid p-3 cont-style ">
    <h2 class="text-center bg-dark text-white p-3"><i class="bi bi-apple text-primary"></i> KISHAN CRUD APP <i class="bi bi-google-play text-primary"></i> </h2>
    <div class="content mt-5">
        <!-- Button trigger modal -->
        <?php
            if(!isset($_SESSION["user_id"]))
        {
            ?>
        <button type="button" class="btn btn-info btn-lg mt-4 mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Customer <i class="bi bi-file-person text-danger"></i>
        </button>
        
        <?php
        }
        ?>

     <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customer Detail Form</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                <label> Name:</label>
                <input type="text" name="name" class="form-control" placeholder="Enter You Name" required> <br>

                <label> Email:</label>
                <input type="text" name="email" class="form-control" placeholder="Enter You Email" required> <br> 

                <label> Password:</label>
                <input type="password" name="pass" class="form-control" placeholder="Enter You Password" required> <br>

                <label>Confirm Password</label>
                <input type="password" name="cpass" class="form-control" placeholder="Enter Confirm password" required><br>
                
                <label> Number:</label>
                <input type="text" name="number" class="form-control" placeholder="Enter You Number" required> <br>

                <label>Add Photo: </label>
                <input type="file" name="img"><br> <br>

                <label>Select State:</label>
                <select name="state" class="form-control" placeholder="Enter Your Number *" required>
                    <option value="">-State-</option>
                    <?php
                    foreach($showstate as $showstate1)
                    {
                    ?>
                    <option value="<?php echo $showstate1["state_id"];?>"><?php echo $showstate1["state_name"];?></option>
                    <?php
                    }
                    ?>
                </select> <br>    

                <label>Select City:</label>
                <select name="city" class="form-control" placeholder="Enter Your Number *" required>
                    <option value="">-State-</option>
                  <?php
                  foreach($showcity as $showcity1)
                  {
                  ?>
                  <option value="<?php echo $showcity1["city_id"];?>"><?php echo $showcity1["city_name"];?></option>
                  <?php
                  }
                  ?>
                </select> <br>
                
            </div>
            <div class="modal-footer text-center">
            <input type="submit" name="submit" class="btn btn-success btn-lg" value="login">
            <input type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal" value="Close">
            </div>
            </div>
        </div>
        </div>
        </form>

        <table class="table table-responsive mt-4 p-3" id="pagination">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Number</th>
                    <th>Photo</th>
                    <th>Action</th>
                </tr>
            </thead>
                
                <tbody>
                <?php
                foreach($shwdata as $row)
                {
                ?>
                <tr>
                    <td><?php echo $row["user_id"];?></td>
                    <td><?php echo $row["name"];?></td>
                    <td><?php echo $row["email"];?></td>
                    <td><?php echo $row["number"];?></td>
                    <td><img src="<?php echo $row["photo"];?>" class="img-fluid" style="width:100px; height:100px"> </td>
                    <td>
                        <a href="<?php echo "./";?>?readdata=<?php echo $row["user_id"]; ?>" class="btn btn-success" onclick="return confirm('Are you sure you want to read data?')"><i class="bi bi-eye-fill"></i></a> |
                        <a href="<?php echo "./"; ?>?editdata=<?php echo $row["user_id"]; ?>" class="btn btn-warning" onclick="return confirm('Are you sure you want to edit the data?')"><i class="bi bi-pencil-fill"></i></a> |
                         <a href="<?php  echo"./";?>?deletedata=<?php echo $row["user_id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the data?')"><i class="bi bi-trash3-fill"></i></a>
                    </td>
                </tr>
                <?php
                }
                ?>
                    
            </tbody>
        </table>

  </div>
</div>

<script>
    $(document).ready(function () {
    $('#pagination').DataTable();
    });
</script>