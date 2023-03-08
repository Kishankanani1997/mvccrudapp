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
        <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Enter You Email" required> <br> 

        <label> Password:</label>
        <input type="password" name="pass" class="form-control" placeholder="Enter You Password" required> <br>

        <label>Confirm Password</label>
        <input type="password" name="cpass" class="form-control" placeholder="Enter Confirm password" required><br>
        
        <label> Number:</label>
        <input type="text" name="number" class="form-control" placeholder="Enter You Number" required> <br>

        <label>Add Photo: </label>
        <input type="file" name="img"><br> <br>

        <label>Select State:</label>
        <select name="state" class="form-control" required>
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
        <select name="city" class="form-control" required>
            <option value="">-City-</option>
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
</div>