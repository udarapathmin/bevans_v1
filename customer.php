<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'C'){
    header("location:index.php");
  }

  $un = $_SESSION['username'];
    // Search for Agent username and id
    $sql= "SELECT * FROM customer WHERE username='$un'";
    $customerrest = $conn->query($sql);
    while($cust = $customerrest->fetch_assoc()) {
      $customerid = $cust['customerid'];
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Customer</title>

    

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
        <?php include "customer_sidebar.php"; ?>
      </div>
      <div class="col-md-9">
          <?php
            // Search for User
              $sql= "SELECT * FROM customer WHERE username='$un'";
              $result = $conn->query($sql);
              while($row = $result->fetch_assoc()) {
                $iscomplete =  $row["iscomplete"];
                $tenant =  $row["istenant"];
                if($tenant == 0){
                  $user = "Customer";
                } else {
                  $user = "Tenant";
                }
              }
            if( $iscomplete == '0') {
              //if it is display message to complete profile ?>

              <div class="alert alert-info alert-dismissible" role="alert">
                <strong>Notice!</strong>Your Profile is incomplete. Please complete your profile by editing <strong><a href='<?php echo $baseurl . "editcustomerprofile.php" ?>'>here</a></strong>.
              </div>

            <?php
            }
           ?>
          <h3><?php echo $user; ?> Dashboard</h3><hr>


          <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
              <ul  class=" list-inline mrg-0 btm-mrg-10 clr-535353">
                  <li style="margin-right:35px;">
                  <i class=" dashb fa fa-user fa-5x text-cemter"></i>
                  <p class="text-cemter"><a href="viewcustomerprofile.php"> View Profile</a></p>
                  </li>
                  <li style="margin-right:35px;">
                  <i class=" dashb fa fa-building fa-5x text-cemter"></i>
                  <p class="text-cemter"><a href="savedsearch.php"> Saved Property</a></p>
                  </li>
                  <li>
                  <i class=" dashb fa fa-search fa-5x text-cemter"></i>
                  <p class="text-cemter"><a href="advancesearch.php"> Search Property</a></p>
                  </li>
              </ul>
            </div>
            </div>
            <!-- Special for Tenant -->
            <?php if($tenant == 1){ ?>

              <h4>My Property</h4>

              <div class="row">

              <?php
                $sl="SELECT * FROM realestateproperty WHERE ownerid='$customerid' ";
                $prop = mysqli_query($conn, $sl);
                while($r = mysqli_fetch_array($prop)){

                  $propertyid = $r['propertyid']; 

                  $sql= "SELECT * FROM property_image WHERE propertyid='$propertyid' LIMIT 1";
                  $images = $conn->query($sql);
                  while($obj = $images->fetch_assoc()) {
              ?>
                <div class="col-md-4 text-center">
                  <h4><?php echo $r['suburb']; ?></h4>
                  <img src='<?php echo $baseurl."image.php?id=".$obj['id']; ?>' style="width:180px; height:190px; " >
                  <a style="margin-top:5px;" href='<?php echo $baseurl."tenantproperty.php?id=".$propertyid; ?>' class="btn btn-success"><i class="fa fa-building"></i> View Property</a>
                </div>
                <?php } } ?>

            <?php } ?>

            </div>

      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>