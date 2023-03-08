<div class="container-fluid p-3 cont-style">
    <h2 class="text-center bg-dark text-white p-3"> Manage Your Profile Here </h2>
    <div class="content mt-5">
        <div class="row">
            <div class="col-md-5">
                <img src="assets/img/login.gif" class="img-fluid image-style">
            </div> 
 
        <div class="col-md-7">
            <form method="post" enctype="multipart/form-data">
            <label> Name:</label>
            <input type="text" name="name" class="form-control" placeholder="Enter You Name"  value="<?php echo $showuser1 [0] ["name"];?>" required> <br>

            <label> Email:</label>
            <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Enter You Email" value="<?php echo $showuser1 [0] ["email"];?>" required> <br> 

            <label> Password:</label>
            <input type="password" name="pass" class="form-control" placeholder="Enter You Password" value="<?php echo $showuser1 [0] ["password"];?>" required> <br>

            <label>Confirm Password</label>
            <input type="password" name="cpass" class="form-control" placeholder="Enter Confirm password" value="<?php echo $showuser1 [0] ["password"];?>" required><br>
            
            <label> Number:</label>
            <input type="text" name="number" class="form-control" placeholder="Enter You Number" value="<?php echo $showuser1 [0] ["number"];?>"required> <br>

            <img src="<?php echo $showuser1[0]["photo"];?>">
            <label>Add Photo: </label>
            <input type="file" name="img"><br> <br>

            <label>Select State:</label>
            <select name="state" class="form-control" placeholder="Enter Your Number *" required>
                <option value="">-State-</option>
                <?php
                foreach($showstate as $showstate1)
                {
                    if($showstate1["state_id"]==$showuser1 [0] ["state_id"])
                    {
                ?>
                <option value="<?php echo $showuser1 [0]["state_id"];?>" selected="selected"><?php echo $showuser1 [0]["state_name"];?></option>
                <?php
                    }
                        else
                    {
                ?>
                <option value="<?php echo $showstate1["state_id"];?>"><?php echo $showstate1["state_name"];?></option>      
                <?php
                    }
                }
                ?>

            </select> <br>    

            <label>Select City:</label>
            <select name="city" class="form-control" placeholder="Enter Your Number *" required>
                <option value="">-City-</option>
            <?php
            foreach($showcity as $showcity1)
            {
                if($showcity1["city_id"]==$showuser1 [0] ["city_id"])
                {
            ?>
            <option value="<?php echo $showuser1 [0]["city_id"];?>" selected="selected"><?php echo $showuser1 [0]["city_name"];?></option>
            <?php
                }
                    else
                {
            ?>
            <option value="<?php echo $showcity1["city_id"];?>"><?php echo $showcity1["city_name"];?></option>
            <?php 
                }
            }
            ?>    
            </select> <br>
            
        </div>
        <div class="text-center">
        <input type="submit" name="update" class="btn btn-success btn-lg" value="update">
        <input type="button" class="btn btn-danger btn-lg" data-bs-dismiss="modal" value="Close">
        </div>
     </div>
    </div>
</div>
        
        