<?php 

  include "database.php";
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    

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

    <!-- header -->
    <?php include "template/header.php"; ?>

    <!-- Begin page content -->
    <div class="container">
          <!-- Success Edit Message -->
          <?php
            if(isset($_GET["delete"]) && $_GET["delete"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Deleted Customer record' ; ?> 
              </div>

            <?php
            }
           ?>
      <div class="row">
        <div class="col-md-12">
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="img/img_1.jpg" >
                <div class="carousel-caption">
                  <h3>DISCOVER YOUR PERFECT HOME</h3>
                 <p>More than 1000+ Properies.</p>
                </div>
              </div>
              <div class="item">
                <img src="img/img_2.jpg" >
                <div class="carousel-caption">
                 <h3>EXPERTISE TO HELP YOU</h3>
                  <p>Find a local real estate professional to help you discover your perfect home.</p>
                </div>
              </div>
              <div class="item">
                <img src="img/img_3.jpg" >
                <div class="carousel-caption">
                  <h3>FIND YOUR HAPPINESS</h3>
                  <p>Select the best out of the best.</p>
                </div>
              </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>

          </div>
        </div>
      </div>
      <div class="row" style="margin-top:20px;">
        <div class="col-md-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <!-- Items -->
              <div class="row">
              <!-- Item 1 -->
              <?php
                $sl="SELECT * FROM realestateproperty WHERE  agentid IS NOT NULL AND status='1' ORDER BY RAND() LIMIT 0,1";
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
                  <a style="margin-top:5px;" href='<?php echo $baseurl."viewproperty.php?id=".$propertyid; ?>' class="btn btn-success"><i class="fa fa-building"></i> View Property</a>
                </div>
                <?php } } ?>

                <!-- Item 2 -->
              <?php
                $sl="SELECT * FROM realestateproperty WHERE  agentid IS NOT NULL AND status='1' ORDER BY RAND() LIMIT 0,1";
                $prop = mysqli_query($conn, $sl);
                while($r = mysqli_fetch_array($prop)){

                  $propertyid = $r['propertyid']; 

                  $sql= "SELECT * FROM property_image WHERE propertyid='$propertyid'  LIMIT 1";
                  $images = $conn->query($sql);
                  while($obj = $images->fetch_assoc()) {
              ?>
                <div class="col-md-4 text-center">
                  <h4><?php echo $r['suburb']; ?></h4>
                  <img src='<?php echo $baseurl."image.php?id=".$obj['id']; ?>' style="width:180px; height:190px; " >
                  <a style="margin-top:5px;" href='<?php echo $baseurl."viewproperty.php?id=".$propertyid; ?>' class="btn btn-success"><i class="fa fa-building"></i> View Property</a>
                </div>
                <?php } } ?>

                <!-- Item 3 -->
              <?php
                $sl="SELECT * FROM realestateproperty WHERE  agentid IS NOT NULL AND status='1' ORDER BY RAND() LIMIT 0,1";
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
                  <a style="margin-top:5px;" href='<?php echo $baseurl."viewproperty.php?id=".$propertyid; ?>' class="btn btn-success"><i class="fa fa-building"></i> View Property</a>
                </div>
                <?php } } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
              <form action="search.php">
                <div class="form-group">
                <label for="exampleInputEmail1">Search</label>
                    <input class="form-control" name="search" placeholder="State, Suburb, Postcode, Street" name="search" type="text">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="panel panel-default">
              <div class="panel-body">
              <label for="exampleInputEmail1">Catch us on Social</label>
              <div class="text-center center-block">

                  <a href="https://www.facebook.com/"><i id="social" class="fa fa-facebook-square fa-5x social-fb"></i></a>
                <a href="https://twitter.com/"><i id="social" class="fa fa-twitter-square fa-5x social-tw"></i></a>
                <a href="https://plus.google.com/"><i id="social" class="fa fa-google-plus-square fa-5x social-gp"></i></a>
                <a href="mailto:isuru@gmail.com"><i id="social" class="fa fa-envelope-square fa-5x social-em"></i></a>
                </div>
                </div>
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