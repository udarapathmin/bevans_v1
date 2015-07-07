<?php 

  include "database.php";

  $utype = $_SESSION['user_type'];

  if (!isset($_GET["id"]) && !isset($_GET["agid"]))
  {
      header("location:index.php");
  }
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Login for both Customer or Agent
  if($_SESSION['user_type'] != 'C' && $_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }

  $un = $_SESSION['username'];

  //Selecting Customer ID
  if($utype =='C'){
    $sql="SELECT * FROM customer WHERE username = '$un'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $cusid = $row['customerid'];
    }
  }
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
  $agentid = $_GET["agid"];

  //Getting Customer ID for agent
  if(isset( $_GET["cid"]))
    $cusid = $_GET["cid"];

  // Search for House
  $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Schedule Inspection</title>

    

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
          if($utype == 'C')
            include "customer_sidebar.php"; 
          if($utype == 'K')
            include "agent_sidebar.php"; 
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
            <div class="panel-heading">Schedule House Inspection</div>
            <div class="panel-body">
              <?php 
              while($row = $result->fetch_assoc()) { ?>

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

              <!-- Div for Customer.. -->
              <?php 
                if($utype == 'C') {

                  $sqli="SELECT * FROM customer_scheduleinspection WHERE customerid = '$cusid' AND propertyid='$propertyid'";
                  $results = mysqli_query($conn, $sqli);
                    if($results->num_rows == 0){ 
                      // echo "No Saved Data";
                      //Display Form
                      ?>

                      <!-- Form To Ask for Scheduling -->

                      <h3>Select 3 Timeslots you prefer to inspect</h3>
              <form style="margin-top:20px;" class="" action="formaction/schedule_inspection.php" method="POST">
                <input  type="hidden" name="propertyid" value="<?php echo $propertyid; ?>">
                  <input  type="hidden" name="agentid" value="<?php echo $agentid; ?>">

                <div class="form-group">
                  
                  <label>Time Slot 01</label>
                  
                  <div class="row">
                    <div class="col-sm-4">
                      <input required type="date" class="form-control" id="timeslot1" name="timeslot1">
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="time1">
                      <option value="08:00 AM - 09:00 AM">08:00 AM - 09:00 AM</option>
                      <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                      <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                      <option value="11:00 AM - 12:00 AM">11:00 AM - 12:00 AM</option>
                      <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                      <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                      <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                      <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                      <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                      <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                      <option value="06:00 PM - 07:00 PM">06:00 PM - 07:00 PM</option>
                      <option value="07:00 PM - 08:00 PM">07:00 PM - 08:00 PM</option>
                    </select>
                    </div>
                  </div>

                </div>
                <div class="form-group">
                  
                  <label>Time Slot 02</label>
                  
                  <div class="row">
                    <div class="col-sm-4">
                      <input required type="date" class="form-control" id="timeslot2" name="timeslot2">
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="time2">
                      <option value="08:00 AM - 09:00 AM">08:00 AM - 09:00 AM</option>
                      <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                      <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                      <option value="11:00 AM - 12:00 AM">11:00 AM - 12:00 AM</option>
                      <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                      <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                      <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                      <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                      <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                      <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                      <option value="06:00 PM - 07:00 PM">06:00 PM - 07:00 PM</option>
                      <option value="07:00 PM - 08:00 PM">07:00 PM - 08:00 PM</option>
                    </select>
                    </div>
                  </div>

                </div>
                <div class="form-group">
                  
                  <label>Time Slot 03</label>
                  
                  <div class="row">
                    <div class="col-sm-4">
                      <input required type="date" class="form-control" id="timeslot3" name="timeslot3">
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control" name="time3">
                      <option value="08:00 AM - 09:00 AM">08:00 AM - 09:00 AM</option>
                      <option value="09:00 AM - 10:00 AM">09:00 AM - 10:00 AM</option>
                      <option value="10:00 AM - 11:00 AM">10:00 AM - 11:00 AM</option>
                      <option value="11:00 AM - 12:00 AM">11:00 AM - 12:00 AM</option>
                      <option value="12:00 PM - 01:00 PM">12:00 PM - 01:00 PM</option>
                      <option value="01:00 PM - 02:00 PM">01:00 PM - 02:00 PM</option>
                      <option value="02:00 PM - 03:00 PM">02:00 PM - 03:00 PM</option>
                      <option value="03:00 PM - 04:00 PM">03:00 PM - 04:00 PM</option>
                      <option value="04:00 PM - 05:00 PM">04:00 PM - 05:00 PM</option>
                      <option value="05:00 PM - 06:00 PM">05:00 PM - 06:00 PM</option>
                      <option value="06:00 PM - 07:00 PM">06:00 PM - 07:00 PM</option>
                      <option value="07:00 PM - 08:00 PM">07:00 PM - 08:00 PM</option>
                    </select>
                    </div>
                  </div>

                </div>
                <div class="">
                  <div class="">
                    <button type="submit" class="btn btn-primary">Schedule</button>
                  </div>
                </div>
              </form>

                      <!-- End of Form-->

                  <?php 
                    } else { 
                      //Display Schedule data
                        while($sche = mysqli_fetch_array($results)){ 
                          $_SESSION['deleteschedule'] = $sche['id'];

                          ?>

                        <h4>Schedule Inspection Details</h4>
                        <div class="row">
                          <div class="col-md-2"><b>Time 1 - </b></div>
                          <div class="col-md-4"><?php echo $sche['timeslot1']; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-2"><b>Time 2 - </b></div>
                          <div class="col-md-4"><?php echo $sche['timeslot2']; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-2"><b>Time 3 - </b></div>
                          <div class="col-md-4"><?php echo $sche['timeslot3']; ?></div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-2"><b>Agent Reply - </b></div>
                          <div class="col-md-4">
                          <?php 
                            if($sche['agentreply'] == '0'){ 
                              echo "<td><span class='label label-primary'>Waitng</span></td>". PHP_EOL;
                            } else if($sche['agentreply'] == '1'){
                              echo "<td><span class='label label-success'>Approved</span></td>". PHP_EOL;
                            } else{
                              echo "<span class='label label-danger'>Rejected</span>". PHP_EOL;
                            } 
                          ?>
                          </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-2"><b>Time - </b></div>
                          <div class="col-md-4">
                          <?php 
                            if(!isset($sche['time'])){
                              echo "<td><span class='label label-primary'>Waitng</span></td>" . PHP_EOL;
                            } else {
                              echo "<td>".$sche['time']."</td>" . PHP_EOL;
                            } 
                          ?>
                          </div>
                        </div>

                        <!-- if Rejected Schedule -->
                        <?php if($sche['agentreply'] == '2'){ ?>
                        <div class="row" style="margin-top:10px;">
                          <div class="col-md-6">
                            <div class="alert alert-info" role="alert">Agent Rejected this. You may reschedule it <a href="<?php echo $baseurl;?>formaction/remove_schedule.php<?php echo '?id='.$sche['propertyid']. '&agid='.$sche['agentid'] ?>"<b>here</b></a></div>
                          </div>
                        </div>
                        <?php } ?>
                        <!-- end of if -->

                    <?php
                      }
                    }
                  ?>

              <?php
                }
              ?>

              <!-- Div for Agent.. -->
              <?php 
                if($utype == 'K') { 

                  $sqli="SELECT * FROM customer_scheduleinspection WHERE customerid = '$cusid' AND agentreply='0' AND propertyid='$propertyid'";
                  $results = mysqli_query($conn, $sqli);
                    if($results->num_rows > 0){ 

                      while($sche = mysqli_fetch_array($results)){
                      ?>

                    <!-- //Display Agent options -->
                        <h4>Respond Schedule Request Inspection Details</h4>
                          <form action="formaction/shedulereply_action.php" method="POST">
                           <input type="hidden" name="id" value='<?php echo $sche['id']; ?>'>
                          <div class="row">
                            <div class="col-md-2"><b>Time 1 - </b></div>
                            <div class="col-md-4"><label class="radio-inline"><input type="radio" name="options" id="inlineRadio1" value='<?php echo $sche['timeslot1']; ?>'><?php echo $sche['timeslot1']; ?></label>
                            </div>
                          </div>
                          <div class="row" style="margin-top:10px;">
                            <div class="col-md-2"><b>Time 2 - </b></div>
                            <div class="col-md-4"><label class="radio-inline"><input type="radio" name="options" id="inlineRadio1" value='<?php echo $sche['timeslot2']; ?>'><?php echo $sche['timeslot2']; ?></label>
                            </div>
                          </div>
                          <div class="row" style="margin-top:10px;">
                            <div class="col-md-2"><b>Time 3 - </b></div>
                            <div class="col-md-4"><label class="radio-inline"><input type="radio" name="options" id="inlineRadio1" value='<?php echo $sche['timeslot3']; ?>'><?php echo $sche['timeslot3']; ?></label>
                            </div>
                          </div>
                          <div class="row" style="margin-top:10px;">
                            <div class="col-md-2"><b>Not Possible</b></div>
                            <div class="col-md-4"><label class="radio-inline"><input type="radio" name="options" id="inlineRadio1" required value='2'>Above Mentioned 3 Timeslots are not convinint for me.</label>
                            </div>
                          </div>
                          <div class="form-group" action="formaction/shedulereply_action.php" method="POST">
                            <div class="">
                              <button type="submit" class="btn btn-primary">Reply</button>
                            </div>
                          </div>
                        </form>

                    <!-- End of Agent Options -->

                    <?php  
                    }
                  } else {
                    echo "<b>You Have Replied to this Request!</b>";
                  }
                  }
              ?>
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