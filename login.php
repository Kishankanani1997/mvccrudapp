<div class="container-fluid p-3 cont-style ">
    <h2 class="text-center bg-dark text-white p-3"> KISHAN LOGIN FORM </h2>
    <div class="content mt-5">
        <div class="row">
            <div class="col-md-5">
                <img src="assets/img/login.gif" class="img-fluid">
            </div>

            <div class="col-md-6 mx-auto">
                <form method="post" enctype="multipart/form-data">
                    <label> Email:</label>
                    <input type="text" name="email" autocomplete="off" class="form-control" placeholder="Enter Your Email" required> <br> 
    
                    <label> Password:</label>
                    <input type="password" name="pass" class="form-control" placeholder="Enter Your Password" required> <br>
                    
                    <input type="submit" name="login" class="btn btn-success btn-md" value="Login">
                    <a href="<?php echo $mainurl; ?>forgot-password">Forgot Password ?</a> <br> <br>
                    <b>Don't have an account ? </b><a href="#"data-bs-toggle="modal" data-bs-target="#exampleModal">Create Account ?</a>
                </form>  
            </div>
        </div>
    </div>
</div>    