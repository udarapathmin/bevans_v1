<?php 

    include "database.php";
  
    //property id
    $id = $_GET["id"];

    //usertype
    $utype = $_SESSION['user_type'];

    // Search for House
    $sql= "SELECT * FROM realestateproperty WHERE propertyid='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("location:index.php");
    }


  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }

  // //check for Admin login
  // if($_SESSION['user_type'] != 'A'){
  //   header("location:index.php");
  // }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>View Property</title>

    

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
          if($utype == 'A')
            include "admin_sidebar.php"; 
          if($utype == 'K')
            include "agent_sidebar.php"; 
          if($utype == 'C')
            include "customer_sidebar.php"; 


        ?>
      </div>
      <div class="col-md-9">

      <?php 
        while($row = $result->fetch_assoc()) {

            $pid = $row["propertyid"];
            if(isset($row["agentid"])){
              $agid = $row["agentid"];
            }

      ?>

      <!-- Special View for Admin to Assign Agents -->
      <?php
        if($_SESSION['user_type'] == 'A' && !isset($row["agentid"])){ ?>
          <h4>Assign Agent for the Property</h4><hr>
          <form class="form-inline" action="formaction/assign_agent_action.php" method="POST">
            <div class="form-group">
              <label for="exampleInputName2">Select Agent</label>
                <input  type="hidden"  class="form-control" id="propertyid" name="propertyid" placeholder="Property ID" value='<?php echo $row["propertyid"]; ?>'>
              <select class="form-control" name="agentid">
                <?php 
                  $sql= "SELECT * FROM agent WHERE iscomplete ='1' AND active = '1'";
                  $rest = $conn->query($sql);
                  while($agent = $rest->fetch_assoc()) {
                    echo "<option value='". $agent['agentid'] ."'>". $agent['firstname']. " ". $agent['lastname'] ."</option>";
                } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Assign Agent</button>
          </form>
          <hr>

      <?php
        }
      ?>

      <!-- Special View for Customers to Ask for More details and Submit Rennat Appications -->
      <?php
        if($_SESSION['user_type'] == 'C' && $row["status"] == '1'){ ?>
          <div class="alert alert-warning alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Great!</strong><?php echo ' This Property is Available for Rent. Interested in? Contact Agent or Submit Application directly' ; ?> 
          </div>
          <div class="form-inline">
            <div class="form-group">
              <a href='<?php echo $baseurl . "askmore.php?id=".$pid ?>' class="btn btn-success"><i class="fa fa-phone"></i> Contact Agent</a>
            </div>
            <div class="form-group">
              <a href='<?php echo $baseurl . "submittenant.php?id=".$pid ?>' class="btn btn-success"><i class="fa fa-cloud-upload"></i> Submit Application</a>
            </div>
            <?php
            if($row["inspectiontype"] == '0'){
            ?>
            <div class="form-group">
              <a href='<?php echo $baseurl . "scheduleinspection.php?id=".$pid .'&agid='. $agid?>' class="btn btn-success"><i class="fa fa-clock-o"></i> Schedule Inspection</a>
            </div>
            <?php } ?>
          </div>
          <hr>

      <?php
        }
      ?>

      <!-- Success Edit Message -->
          <?php
            if(isset($_GET["assign"]) && $_GET["assign"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Agent Assigned to Property' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["assign"]) && $_GET["assign"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to add record' ; ?> 
              </div>

            <?php
            }
           ?>


        <div>
            <h3><?php echo $row["propertytype"]; ?> For Rent 
              <?php
                if($row["status"] == '1')
                        echo "<span class='label label-primary'>Available</span>";
                      else
                        echo "<span class='label label-warning'>Not Available</span>";
              ?>
            </h3>
            <hr>

            <div class="row">
              <div class="col-md-6">
                <!-- Basics -->
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Property Type</b></div>
                  <div class="col-md-5"><?php echo $row["propertytype"]; ?></div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Inspection Type</b></div>
                  <div class="col-md-5">
                  <?php 
                  if($row["inspectiontype"] == '1')
                        echo "Open";
                      else
                        echo "By Appoinment";
                  ?>
                  </div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Owner Fee</b></div>
                  <div class="col-md-5">$<?php echo $row["ownerfee"]; ?></div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Rent</b></div>
                  <div class="col-md-5">$<?php echo $row["rent"]; ?></div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Bond</b></div>
                  <div class="col-md-5">$<?php echo $row["bond"]; ?></div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Bond Period</b></div>
                  <div class="col-md-5"><?php echo $row["bondperiod"]; ?> Months</div>
                </div>
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Down Payment</b></div>
                  <div class="col-md-5">$<?php echo $row["downpayment"]; ?></div>
                </div>
              </div>
              <div class="col-md-6">
                      <?php 
                          
                          $sql= "SELECT * FROM property_image WHERE propertyid='$pid' LIMIT 1";
                          $result = $conn->query($sql);
                          while($ele = $result->fetch_assoc()) {
                               echo "<img class='parent' src='". $baseurl."image.php?id=".$ele['id'] ."' alt=''>" . PHP_EOL; 
                          }

                      ?>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md-6">
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Smoking Allowed</b></div>
                  <div class="col-md-5">
                    <?php 
                      if($row["smokingallowed"] == '1')
                        echo "Yes";
                      else
                        echo "No";

                    ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Pets Allowed</b></div>
                  <div class="col-md-5">
                    <?php 
                      if($row["petsallowed"] == '1')
                        echo "Yes";
                      else
                        echo "No";

                    ?>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Furniture Status</b></div>
                  <div class="col-md-5">
                    <?php echo $row["furnishedstatus"]; ?>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row" style="margin-top:10px;">
                  <div class="col-md-1"></div>
                  <div class="col-md-5"><b>Suitable For</b></div>
                  <div class="col-md-5">
                    <?php echo $row["suitablefor"]; ?>
                  </div>
                </div>
              </div>
            </div>



            <!-- Tabbed Pannels -->
            <div class="tabbable-panel" style="margin-top:20px;">
              <div class="tabbable-line">
                <ul class="nav nav-tabs ">
                  <li class="active">
                    <a href="#tab_default_1" data-toggle="tab">
                    Address </a>
                  </li>
                  <li>
                    <a href="#tab_default_2" data-toggle="tab">
                    Features </a>
                  </li>
                  <li>
                    <a href="#tab_default_3" data-toggle="tab">
                    Pictures </a>
                  </li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_default_1">
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>House No</b></div>
                      <div class="col-md-5"><?php echo $row["houseno"]; ?></div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>Street 1</b></div>
                      <div class="col-md-5"><?php echo $row["street1"]; ?></div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>Street 2</b></div>
                      <div class="col-md-5"><?php echo $row["street2"]; ?></div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>Suburb</b></div>
                      <div class="col-md-5"><?php echo $row["suburb"]; ?></div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>State</b></div>
                      <div class="col-md-5"><?php echo $row["state"]; ?></div>
                    </div>
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-1"></div>
                      <div class="col-md-3"><b>Postcode</b></div>
                      <div class="col-md-5"><?php echo $row["postcode"]; ?></div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_default_2">
                    <div class="row" style="margin-top:20px;">
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">Interior</div>
                          <div class="panel-body">
                            <ul class="list-group">
                            <?php 
                              if(isset($row["interiorfeatures"])){
                                $intfeatures = $row["interiorfeatures"]; 
                                $intfeatures = explode(",", $intfeatures);
                                foreach ($intfeatures as $key => $value) {
                                  $sql= "SELECT * FROM features WHERE featureid='$value'";
                                  $result = $conn->query($sql);
                                  while($ele = $result->fetch_assoc()) {
                                    echo "<li class='list-group-item'>". $ele['featurename']."</li>";
                                  }
                                }
                              } else {
                                echo "No Features Listed";
                              }
                            ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">Exterior</div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <?php 
                              if(isset($row["exteriorfeatures"])){
                                $intfeatures = $row["exteriorfeatures"]; 
                                $intfeatures = explode(",", $intfeatures);
                                foreach ($intfeatures as $key => $value) {
                                  $sql= "SELECT * FROM features WHERE featureid='$value'";
                                  $result = $conn->query($sql);
                                  while($ele = $result->fetch_assoc()) {
                                    echo "<li class='list-group-item'>". $ele['featurename']."</li>";
                                  }
                                }
                              } else {
                                echo "No Features Listed";
                              }
                            ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="panel panel-default">
                          <div class="panel-heading">Other</div>
                          <div class="panel-body">
                            <ul class="list-group">
                              <?php 

                              if(isset($row["otherrfeatures"])){
                                $intfeatures = $row["otherrfeatures"]; 
                                $intfeatures = explode(",", $intfeatures);
                                foreach ($intfeatures as $key => $value) {
                                  $sql= "SELECT * FROM features WHERE featureid='$value'";
                                  $result = $conn->query($sql);
                                  while($ele = $result->fetch_assoc()) {
                                    echo "<li class='list-group-item'>". $ele['featurename']."</li>";
                                  }
                                }
                              } else {
                                echo "No Features Listed";
                              }
                            ?>
                            </ul>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="tab_default_3">
                    <div class="row" style="margin-top:20px;">
                      <?php 
                          
                          $sql= "SELECT * FROM property_image WHERE propertyid='$pid'";
                          $result = $conn->query($sql);
                          while($ele = $result->fetch_assoc()) {
                               echo "<div class='col-xs-6 col-md-3'>" . PHP_EOL;
                               echo  "<a href='". $baseurl."image.php?id=".$ele['id'] ."' class='thumbnail'>". PHP_EOL;
                               echo "<img src='". $baseurl."image.php?id=".$ele['id'] ."' alt=''>" . PHP_EOL; 
                               echo "</a></div>" . PHP_EOL; 
                          }

                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div>

      <?php } ?>

      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>