<?php 

  include "database.php";

  $utype = $_SESSION['user_type'];

  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Login for both Customer or Agent
  if($_SESSION['user_type'] != 'C' && $_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }

  $un = $_SESSION['username'];


  //Selecting Agent ID
  if($utype =='K'){
    $sql="SELECT * FROM agent WHERE username = '$un'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $agid = $row['agentid'];
    }
  }

  //property id and agent id
  $propertyid = $_GET["id"];

   //Validate for correct agent
  $sql="SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
      $agent = $row['agentid'];
  }

  if($agid != $agent )
    header("location:customer.php");



  // Search for House
  $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $result = $conn->query($sql);

  // //Validation for check if the agent really owns this properry
  // while($row = $result->fetch_assoc()) {
  //   if($row["agentid"] != $agentid){
  //     header("location:agent.php");
  //   }
  // }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agent Property</title>

    

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
        <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
        
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>


  </head>

<body>
    <?php include "template/header.php"; ?>

    
    <!-- Begin page content -->
    <div class="container">

    <div class="row">
      <div class="col-md-3">
        <?php 
          //Manage Side bar by USer Type
          if($utype == 'C')
            include "customer_sidebar.php"; 
          if($utype == 'K')
            include "agent_sidebar.php"; 
        ?>
      </div>
      <div class="col-md-9">
      <!-- Error Message -->
      <?php
            if(isset($_GET["dates"]) && $_GET["dates"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Error Setting Dates. Please Set Valid Dates' ; ?> 
              </div>

            <?php
            }
           ?>

           <!-- Success Message -->
           <?php
            if(isset($_GET["dates"]) && $_GET["dates"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' You have finished setting up this property on rent.' ; ?> 
              </div>

            <?php
            }
           ?>

           <!-- Success Message -->
           <?php
            if(isset($_GET["payment"]) && $_GET["payment"] == 'accept' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Payment Accepted.' ; ?> 
              </div>

            <?php
            }
           ?>

           <!-- Success Message -->
           <?php
            if(isset($_GET["payment"]) && $_GET["payment"] == 'reject' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Payment Rejected.' ; ?> 
              </div>

            <?php
            }
           ?>
      
          <div class="panel panel-default">
            <div class="panel-heading">Rented Property</div>
            <div class="panel-body">
              <?php 
              while($row = $result->fetch_assoc()) { 

                //Get Customer id
                $customerid = $row["ownerid"];
                ?>

                    <div class="row">
                      <div class=" col-md-5">
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>House No</b></div>
                          <div class="col-md-5"><?php echo $row["houseno"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Street 1</b></div>
                          <div class="col-md-5"><?php echo $row["street1"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Street 2</b></div>
                          <div class="col-md-5"><?php echo $row["street2"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Suburb</b></div>
                          <div class="col-md-5"><?php echo $row["suburb"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>State</b></div>
                          <div class="col-md-5"><?php echo $row["state"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-3"><b>Postcode</b></div>
                          <div class="col-md-5"><?php echo $row["postcode"]; ?></div>
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
              <!-- Cusomer Details -->
                        <?php 
                            
                            $sql= "SELECT * FROM customer WHERE customerid='$customerid'";
                            $result = $conn->query($sql);
                            while($ele = $result->fetch_assoc()) {

                        ?>
                    <div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-2"><b>Name</b></div>
                          <div class="col-md-8"><?php echo $ele["firstname"]. " " .$ele["lastname"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-2"><b>Phone</b></div>
                          <div class="col-md-8"><?php echo $ele["phonemobile"]; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px; margin-bottom:20px;">
                          <div class="col-md-1"></div>
                          <div class="col-md-2"><b>Email</b></div>
                          <div class="col-md-8"><?php echo $ele["email"]; ?></div>
                        </div>
                      </div>
                      <?php } ?>

                      <!-- Agent Actions -->
                      <div>
                        <h3>Manage this Property</h3><hr>

                        <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Settings</a></li>
                          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Schedules</a></li>
                          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Requests</a></li>
                          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Payments</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="margin-top:15px; margin-left:20px;">
                          <div role="tabpanel" class="tab-pane active" id="home">
                          <!-- Set Dates if Rented Dates are Not Set -->
                          <?php 
                            $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
                            $result = $conn->query($sql);
                            while($ele = $result->fetch_assoc()) {

                              if($ele["startdate"] == "" && $ele["enddate"] == "" ){

                          ?>

                          <!--  Dates -->
                          <div class="col-md-5">
                          <form action="formaction/setdates_property_action.php" method="POST">
                            <div class="form-group">
                              <input type="hidden" class="form-control" name="propertyid" value="<?php echo $propertyid; ?>">
                              <label>Start Date</label>
                              <input type="date" class="form-control" name="startdate">
                            </div>
                            <div class="form-group">
                              <label>End Date</label>
                              <input type="date" class="form-control" name="enddate">
                            </div>
                            <button type="submit" class="btn btn-default">Set</button>
                          </form>
                          </div>


                          <?php
                              } else { ?>
                                
                                <div class="row">
                                  <H4>This Property is on Rent from <?php echo $ele["startdate"]. " to " . $ele["enddate"]; ?></H4>
                                </div>
                                <div class="form-inline">
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-danger"><i class="fa fa-exclamation-triangle"></i> Send Evacuate Notice</a>
                                  </div>
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-success"><i class="fa fa-exchange"></i> Relist Property</a>
                                  </div>
                                </div>

                              <?php } ?>
                            <!-- end of Dates ELse -->
                           <?php } ?>
                          <!-- End of Setting Date s-->
                          </div>
                          <!-- Schedules Tab -->
                          <div role="tabpanel" class="tab-pane" id="profile">
                                <div class="form-inline">
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-history"></i> Cleaning Inspection</a>
                                  </div>
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-wrench"></i> Repair Visit</a>
                                  </div>
                                </div>
                                <hr>
                                Display Schedules
                          </div>
                          <!-- Requests tab -->
                          <div role="tabpanel" class="tab-pane" id="messages">
                            <!-- Preliminary Defects  -->
                            <h4>Preliminary Defects</h4>
                              <div>
                                <?php
                                  $sql= "SELECT * FROM preliminary_defects WHERE propertyid='$propertyid' AND agentid = '$agid' AND status = '0' ";
                                  $defects_results = $conn->query($sql);
                                  $no = 0;
                                  while($def = $defects_results->fetch_assoc()) {
                                    $no++;
                                    $defid = $def['id'];
                                ?>
                                    <div class="well">
                                      <div class="media">
                                        
                                      <div class="media-body">
                                        <h4 class="media-heading"><?php echo $def['subject']; ?></h4>
                                        <div class="text-right"><a style="margin-top:5px;" href='<?php echo $baseurl."formaction/prem_def_archive.php?id=".$defid. "&pid=".$propertyid; ?>' class="btn btn-sm btn-success"><i class="fa fa-flag"></i> Archive</a></div>
                                          <p><?php echo $def['description']; ?></p>
                                          <ul class="list-inline list-unstyled">
                                        <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $def['timestamp']; ?> </span></li>
                                                                                        
                                      </ul>
                                      
                                      <div class="row">
                                      <?php if(!empty($def['image1'])) { ?>
                                        <img class="media-object" style="width:150px; height:150px;" src='<?php echo $baseurl . "otherimage.php?id=".$defid."&tbl=preliminary_defects&col=image1" ?>'>
                                      <?php } ?>
                                      <?php if(!empty($def['image2'])) { ?>
                                        <img class="media-object" style="width:150px; height:150px;" src='<?php echo $baseurl . "otherimage.php?id=".$defid."&tbl=preliminary_defects&col=image2" ?>'>
                                      <?php } ?>
                                      <?php if(!empty($def['image3'])) { ?>  
                                        <img class="media-object" style="width:150px; height:150px;" src='<?php echo $baseurl . "otherimage.php?id=".$defid."&tbl=preliminary_defects&col=image3" ?>'>
                                      <?php } ?> 
                                      </div>
                                       </div>
                                    </div>
                                  </div>
                                <?php } ?>
                              </div>
                              <hr>
                              <h4> Maintenance Requests</h4>
                              <div>
                                <?php
                                  $sql= "SELECT * FROM maintenance_requests WHERE propertyid='$propertyid' AND agentid = '$agid' AND status = '0' ";
                                  $defects_results = $conn->query($sql);
                                  $no = 0;
                                  while($def = $defects_results->fetch_assoc()) {
                                    $no++;
                                    $defid = $def['id'];
                                ?>
                                    <div class="well">
                                      <div class="media">
                                        
                                      <div class="media-body">
                                        <div class="text-right"><a style="margin-top:5px;" href='<?php echo $baseurl."formaction/maintreq_archive.php?id=".$defid. "&pid=".$propertyid; ?>' class="btn btn-sm btn-success"><i class="fa fa-flag"></i> Archive</a></div>
                                        <h4 class="media-heading"><?php echo $def['type']; ?></h4>
                                          <p><?php echo $def['details']; ?></p>
                                          <ul class="list-inline list-unstyled">
                                        <li><span><i class="glyphicon glyphicon-calendar"></i> <?php echo $def['timestamp']; ?> </span></li>
                                            <li>|</li> 
                                            <?php
                                              if( $def['keyaccess'] == '1')
                                                echo "<li><i class='fa fa-key'></i> Access using Agent Key</li>";
                                              else
                                                echo "<li><i class='fa fa-clock-o'>Schedule a time</li>";
                                            ?>                                            
                                         </ul>
                    
                                       </div>
                                    </div>
                                  </div>
                                <?php } ?>
                              </div>
                          </div>
                          <!-- Payments Tab -->
                          <div role="tabpanel" class="tab-pane" id="settings">
                            <div class="row">
                            
                            <table id="example" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>REF#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Month</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                        <th>Approve</th>
                                        <th>Reject</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="SELECT * FROM tenant_payments WHERE agentid='$agid' AND propertyid='$propertyid' ORDER BY timestamp DESC";
                                    $result = mysqli_query($conn, $sql);
                                    while($row = mysqli_fetch_array($result)){

                                        echo "<tr>" . PHP_EOL;
                                        echo "<th scope='row'>".$row['refno']."</th>" . PHP_EOL;
                                        echo "<td>".$row['date']."</td>" . PHP_EOL;
                                        echo "<td>".$row['amount']."</td>" . PHP_EOL;
                                        echo "<td>".$row['month']."</td>" . PHP_EOL;
                                        echo "<td>".$row['timestamp']."</td>" . PHP_EOL;
                                        if($row['status'] == '0'){ 
                                          echo "<td><span class='label label-primary'>Pending</span></td>". PHP_EOL;
                                          echo "<td>" . PHP_EOL; ?>
                                        <a href='<?php echo $baseurl . 'formaction/payment_ack.php?t=A&id='. $row['id'].'&pid='. $propertyid; ?>' class='btn btn-success btn-xs'><i class="fa fa-check"></i></a>
                                    <?php
                                        echo "</td>" . PHP_EOL;
                                        echo "<td>" . PHP_EOL; ?>
                                        <a href='<?php echo $baseurl . 'formaction/payment_ack.php?t=R&id='. $row['id'].'&pid='. $propertyid; ?>' class='btn btn-danger btn-xs'><i class="fa fa-close"></i></a>
                                    <?php
                                        echo "</td>" . PHP_EOL;
                                        } else if($row['status'] == '1'){
                                          echo "<td><span class='label label-success'>Received</span></td>". PHP_EOL;
                                        } else{
                                          echo "<td><span class='label label-danger'>Rejected</span></td>". PHP_EOL;
                                        }
                                        
                                        echo "</tr>" . PHP_EOL;
                                    }

                                    ?>



                                    </tbody>
                                </table>
                            </div>
                          </div>
                        </div>

                      </div>
                        
                      </div>
                      <!-- End of Agents Actions -->

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