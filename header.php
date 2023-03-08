<?php
$mainurl="http://localhost/kishan/Module_4/Advancephp8/mvc-crud-app/";
$baseurl="http://localhost/kishan/Module_4/Advancephp8/mvc-crud-app/assets/";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Kishan MVC Crud App</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>

    <!--favicon icon-->
    <link rel="icon" href="assets/img/favicon.webp">

    <!--loading css-->
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script src='main.js'></script>

    <!--data table css file-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">

    <!--loding js file-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!--data table js file-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
</head>
<body>
    
 
<nav class="navbar navbar-expand-lg navbar-dark sticky-top bg-primary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="assets/img/crud.png" class="img-fluid nav-img"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="<?php echo $mainurl; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gallery</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Product Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Men's Wear</a></li>
            <li><a class="dropdown-item" href="#">Women's Wear</a></li>
            <li><a class="dropdown-item" href="#">Kid's Wear</a></li>
            <li><a class="dropdown-item" href="#">Sport's Wear</a></li>
          </ul>
        </li>

        <?php 
           if(!isset($_SESSION["user_id"]))
           {
           ?>

          <li class="nav-item">
            <a class="nav-link" href="<?php echo $mainurl; ?>login-here">Account</a>
          </li>
          
        <?php 
         }
         else 
         {
         ?>

        <li class="dropdown nav-item">
            <a href="" class="nav-link  dropdown-toggle text-white" data-bs-toggle="dropdown">
               Welcome Onboard :- <?php echo ucfirst($_SESSION["name"]);?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo $mainurl; ?>manage-profile">Manage Profile</a></li>
              <li><a class="dropdown-item" href="<?php echo $mainurl; ?>manage-notification">Manage Notifications</a></li>
              <li><a class="dropdown-item" href="<?php echo $mainurl; ?>change-password">Change Password ?</a></li>
            </ul>
            
            <li class="nav-item"> 
              <a class="nav-link" href="<?php echo $mainurl;?>?remove=<?php echo $_SESSION['user_id'];?>" onclick="return confirm('Are you sure to remove profile?')">Remove-Profile <i class="bi bi-trash3-fill text-dark"></i></a>
            </li> 
        </li>
        <?php 
      }
    ?>
      </ul>


      <form class="d-flex">
      <!-- Button trigger modal -->
      <?php
        if(!isset($_SESSION["user_id"]))
        {
      ?>
        <button type="button" class="btn btn-success mx-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Add Customer <i class="bi bi-file-person text-danger"></i></button>
        <?php
          }
          else
          {
        ?>
        <a class="btn btn-outline-danger shadow text-white bg-danger" href="<?php echo $mainurl ?>?logout" onclick="return confirm('Are you sure to logout as Customer ?')">LOGOUT <i class="bi bi-box-arrow-right text-white"></i></a>
            <?php
          }
          ?>
      </form>
    </div>
  </div>
</nav>

  
</body>
</html> 