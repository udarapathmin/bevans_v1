<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }

    //Get username
    $un = $_SESSION['username'];

    //Select Agent id
    $sql="SELECT * FROM agent WHERE username = '$un'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $agentid = $row['agentid'];
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agent</title>

    

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
        <?php include "agent_sidebar.php"; ?>
      </div>
      <div class="col-md-9">

        <h3>Agent Dashboard</h3><hr>


      <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <ul  class=" list-inline mrg-0 btm-mrg-10 clr-535353">
            <li style="margin-right:35px;">
            <i class=" dashb fa fa-file-code-o fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="agenttenant.php"> Tenant Applications</a></p>
            </li>
            <li style="margin-right:35px;">
            <i class=" dashb fa fa-building fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="agentcustomerproperty.php"> Property on Rent</a></p>
            </li>
            <li>
            <i class=" dashb fa fa-building-o fa-5x text-cemter"></i>
            <p class="text-cemter"><a href="listagentproperty.php"> My Property</a></p>
            </li>
        </ul>
      </div>
      </div>

      <h4>Pending Payment Requests</h4><hr>
      <div class="row">

      <?php
        //Get Property Details
        $sql= "SELECT count(*) as count FROM tenant_payments WHERE agentid='$agentid' AND status ='0'";
        $result_property = $conn->query($sql);
        $count =0;
        while($row = $result_property->fetch_assoc()) {
          $count = $row["count"];
        }
      ?>

      <div class="col-md-2"></div>
      <div class="col-md-8"><h1><?php echo $count; ?></h1></div>
      </div>

      <h4><a href="scheduleapplications.php"> Ispection Schedule Requests</a></h4><hr>
      <div class="row">

      <?php
        //Get Property Details
        $sql= "SELECT count(*) as count FROM customer_scheduleinspection WHERE agentid='$agentid' AND agentreply ='0'";
        $result_property = $conn->query($sql);
        $count =0;
        while($row = $result_property->fetch_assoc()) {
          $count = $row["count"];
        }
      ?>

      <div class="col-md-2"></div>
      <div class="col-md-8"><h1><?php echo $count; ?></h1></div>
      </div>


      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>