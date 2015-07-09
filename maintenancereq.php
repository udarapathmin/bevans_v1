<?php 

  include "database.php";

  $utype = $_SESSION['user_type'];

  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Login for both Customer or Agent
  if($_SESSION['user_type'] != 'C'){
    header("location:index.php");
  }

  $un = $_SESSION['username'];


  //Selecting Agent ID
  if($utype =='C'){
    $sql="SELECT * FROM customer WHERE username = '$un'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $customerid = $row['customerid'];
    }
  }

  //property id and agent id
  if(isset($_GET["id"]))
    $propertyid = $_GET["id"];
  else
    header("location:customer.php");

   //Validate for correct tenant
  $sql="SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
      $owner = $row['ownerid'];
      $agentid = $row['agentid'];
  }

  if($customerid != $owner )
    header("location:customer.php");

  // Search for House
  $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $property = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Report Preliminary Defects</title>

    

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
        <?php 
          //Manage Side bar by USer Type
            include "customer_sidebar.php"; 

        ?>
      </div>
      <div class="col-md-9">
      <!-- Error Message -->
      <?php
            if(isset($_GET["error"]) && $_GET["error"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' You cannot set previous dates. Please Select Valid Dates' ; ?> 
              </div>

            <?php
            }
           ?>

           <!-- Success Message -->
           <?php
            if(isset($_GET["success"]) && $_GET["success"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Agent will confirm your Inspection Timeslot.' ; ?> 
              </div>

            <?php
            }
           ?>
      
          <div class="panel panel-default">
            <div class="panel-heading">Submit Maintenance Requests for this Property</div>
            <div class="panel-body">
              <?php 
              while($prop = $property->fetch_assoc()) { 

                //Get Customer id
                $agentid = $prop["agentid"];
                $petapp = $prop["petsallowed"];
                  if($petapp == '1'){
                    $petapp = true;
                  } else{
                    $petapp = false;
                  }
                ?>

                    <div class="row">
                      <div class=" col-md-5">
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>House No</b></div>
                          <div class="col-md-5"><?php echo $prop["houseno"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Street 1</b></div>
                          <div class="col-md-5"><?php echo $prop["street1"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Street 2</b></div>
                          <div class="col-md-5"><?php echo $prop["street2"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Suburb</b></div>
                          <div class="col-md-5"><?php echo $prop["suburb"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>State</b></div>
                          <div class="col-md-5"><?php echo $prop["state"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Postcode</b></div>
                          <div class="col-md-5"><?php echo $prop["postcode"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Rent</b></div>
                          <div class="col-md-5"><?php echo "$".$prop["rent"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Start Date</b></div>
                          <div class="col-md-5"><?php echo "$".$prop["startdate"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>End Date</b></div>
                          <div class="col-md-5"><?php echo "$".$prop["enddate"]; ?></div>
                        </div>
                      </div>
                      <div class="col-md-7">
                        <?php 
                            
                            $sql= "SELECT * FROM property_image WHERE propertyid='$propertyid' LIMIT 1";
                            $result = $conn->query($sql);
                            while($ele = $result->fetch_assoc()) {
                                 echo "<img class='parent' src='". $baseurl."image.php?id=".$ele['id'] ."' alt=''>" . PHP_EOL; 
                            }

                        ?>
                      </div>
                    </div>

              <?php } ?>
              <hr>
             <!-- Maintenance Request Form -->
             <h4>Maintenance Request</h4>
             <div class="col-md-6">
             <form action="formaction/maintenancereq_action.php" method="POST" >
                <input type="hidden" class="form-control" name="propertyid" value="<?php echo $propertyid; ?>">
                <input type="hidden" class="form-control" name="agentid" value="<?php echo $agentid; ?>">
                <input type="hidden" class="form-control" name="customerid" value="<?php echo $customerid; ?>">

                <div class="form-group">
                  <label for="exampleInputEmail1">Type of Repair</label>
                </div>
                <div class="form-group">
                  <label class="checkbox-inline">
                    <input required type="checkbox" name="type[]" value="Electric"> Electric
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="type[]" value="Plumb"> Plumb
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="type[]" value="Carpentry"> Carpentry
                  </label>
                  <label class="checkbox-inline">
                    <input type="checkbox" name="type[]" value="Other"> Other
                  </label>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Description</label>
                  <textarea required class="form-control" name="details" ></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Gaining entry to the property</label>
                  <label class="radio-inline">
                    <input type="radio" name="keyaccess" id="inlineRadio1" value="1"> Allow access with Agency Keys
                  </label>
                  <label class="radio-inline">
                    <input required type="radio" name="keyaccess" id="inlineRadio2" value="2"> Arrange a time
                  </label>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Special Notes</label>
                  <textarea  class="form-control" name="specialnotes" ></textarea>
                </div>
                
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-default">Reset</button>
              </form>
             </div>

                      
                   

                      

              <!-- End of panel -->
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