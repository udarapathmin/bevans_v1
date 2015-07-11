<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'A'){
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Admin</title>

    

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/styles.css" rel="stylesheet">


    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </head>

<body>
    <?php include "template/header.php"; ?>

    
    <!-- Begin page content -->
    <div class="container">

    <div class="row">
      <div class="col-md-3">
        <?php include "admin_sidebar.php"; ?>
      </div>
      <div class="col-md-9">
      <h3>Admin Dashboard</h3><hr>


      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <ul  class=" list-inline mrg-0 btm-mrg-10 clr-535353">
            <li style="margin-right:35px;">
            <i class=" dashb fa fa-users fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="pendingagents.php"> Pending Agents</a></p>
            </li>
            <li style="margin-right:35px;">
            <i class=" dashb fa fa-building fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="addproperty.php"> Add Property</a></p>
            </li>
            <li>
            <i class=" dashb fa fa-building-o fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="listproperty.php"> List Property</a></p>
            </li>
        </ul>
      </div>
      </div>

      <h4>Admin Reports</h4><hr>
      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <p class="text-cemter"><a href="listallproperty.php"> List Property</a></p>
        <p class="text-cemter"><a href="listcustomer.php"> List Customer</a></p>
        <p class="text-cemter"><a href="listagents.php"> List Agents</a></p>
        <p class="text-cemter"><a href="listtenants.php"> List Tenants</a></p>
      </div>
      </div>

      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>