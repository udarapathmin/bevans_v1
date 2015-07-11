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
    <title>Maintenance Requests</title>

    

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
        <!-- DataTables Plugin -->
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
            include "customer_sidebar.php"; 

        ?>
      </div>
      <div class="col-md-9">
      <!-- Error Message -->
      <?php
            if(isset($_GET["report"]) && $_GET["report"] == 'fail' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Fail to submit the request' ; ?> 
              </div>

            <?php
            }
           ?>

           <!-- Success Message -->
           <?php
            if(isset($_GET["report"]) && $_GET["report"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Request Submitted.' ; ?> 
              </div>

            <?php
            }
           ?>
      
          <div class="panel panel-default">
            <div class="panel-heading">My Property</div>
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
              <!-- Cusomer Details -->
                        <?php 
                            
                            $sql= "SELECT * FROM agent WHERE agentid='$agentid'";
                            $agent = $conn->query($sql);
                            while($ele = $agent->fetch_assoc()) {

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
                      <?php }  ?>

                      <!-- Customer Actions -->
                      <div>
                        <h3>Manage this Property</h3><hr>

                        <div>

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Submit</a></li>
                          <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Notices</a></li>
                          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Ask</a></li>
                          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Payments</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content" style="margin-top:15px; margin-left:20px;">
                          <!-- Requests -->
                          <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="form-inline">
                                <!-- Pet App Button -->
                                  <?php if($petapp) { ?>
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-smile-o"></i> Pet Application</a>
                                  </div>
                                  <?php } ?>
                                  <!-- End of Pet App button -->
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "askmore.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-life-ring"></i> Content Insurance</a>
                                  </div>
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "premdefects.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-level-down"></i> Preliminary Defects</a>
                                  </div>
                                  <div class="form-group">
                                    <a href='<?php echo $baseurl . "maintenancereq.php?id=".$propertyid ?>' class="btn btn-primary"><i class="fa fa-wrench"></i> Maintenance Request</a>
                                  </div>
                                </div>
                          </div>
                          <!-- End of Requests -->
                          <div role="tabpanel" class="tab-pane" id="profile">test 2</div>
                          <div role="tabpanel" class="tab-pane" id="messages">test 3</div>
                          <!-- Payments -->
                          <div role="tabpanel" class="tab-pane" id="settings">
                            <!-- Update Payments -->
                            <div class="row">
                            <div class="col-md-6">
                              <form action="formaction/tenant_payments_action.php" method="POST">
                              <input required type="hidden" class="form-control" name="propertyid" value="<?php echo $propertyid; ?>" placeholder="Reference ID">
                              <input required type="hidden" class="form-control" name="agentid" value="<?php echo $agentid; ?>" placeholder="Reference ID">
                              <input required type="hidden" class="form-control" name="customerid" value="<?php echo $customerid; ?>" placeholder="Reference ID">
                                <div class="form-group">
                                  <label>Reference ID</label>
                                  <input required type="text" class="form-control" name="refno" placeholder="Reference ID">
                                </div>
                                <div class="form-group">
                                  <label>Date</label>
                                  <input required type="date" class="form-control" name="date" placeholder="Reference ID">
                                </div>
                                <div class="form-group">
                                  <label>Amount</label>
                                  <input required type="number" class="form-control" name="amount" placeholder="Amount">
                                </div>
                                <div class="form-group">
                                  <label>Month</label>
                                  <select class="form-control" name="month">
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                  </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                              </form>
                            </div>
                            </div>

                            <!-- All Payments -->
                            <div class="row">
                            <hr>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('#example').DataTable();
                                } );
                            </script>
                            <table id="example" class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>REF#</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Month</th>
                                        <th>Time</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql="SELECT * FROM tenant_payments WHERE customerid='$customerid' AND propertyid='$propertyid' ORDER BY timestamp DESC";
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
                                        } else if($row['agentreply'] == '1'){
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
                      <!-- End of Customer Actions -->

                      

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