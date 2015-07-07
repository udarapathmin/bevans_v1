<?php 

  include "database.php";
  if (!isset($_GET["id"]))
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

  $utype = $_SESSION['user_type'];
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



  // Search for House
  $propertyid = $_GET["id"];
  $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
  $result = $conn->query($sql);

  //Message id for Agent
  if(isset($_GET["mid"])){
  	$mid = $_GET["mid"];
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Ask More About a property</title>

    

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

      	        <!-- Success Edit Message -->
          <?php
            if(isset($_GET["message"]) && $_GET["message"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Sent Message to Agent' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["message"]) && $_GET["message"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to send messag' ; ?> 
              </div>

            <?php
            }
           ?>

          <div class="panel panel-default">
            <div class="panel-heading">Ask More about this Property</div>
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

                            //Assign Agent id and customer ID before loosing it
                            $aid = $row["agentid"];
                            
                            $sql= "SELECT * FROM property_image WHERE propertyid='$propertyid' LIMIT 1";
                            $result = $conn->query($sql);
                            while($ele = $result->fetch_assoc()) {
                                 echo "<img class='parent' src='". $baseurl."image.php?id=".$ele['id'] ."' alt=''>" . PHP_EOL; 
                            }

                        ?>
                      </div>
                    </div>

              
              <hr>
              <!-- Customer -->
              <?php 
                if($utype =='C' && !isset($mid)){ 
                  $sql="SELECT * FROM agent WHERE agentid = '$aid'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                      $agname = $row['firstname'];
                  }

              ?>
              <div><h4>Wants to know more about this property? Contact Agent : <?php echo "<b>$agname</b>"; ?></h4></div>
              
              <div class="row">
              <div class="col-md-6">
                <form action="formaction/askmore_customer_action.php" method="POST">
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="hidden" class="form-control" name="propertyid" value='<?php echo "$propertyid"; ?>'>
                    <input type="hidden" class="form-control" name="customerid" value='<?php echo "$cusid"; ?>'>
                    <input type="hidden" class="form-control" name="agentid" value='<?php echo "$aid"; ?>'>
                    <input type="text" class="form-control" name="subject" placeholder="Subject">
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea  type="text" class="form-control" name="message" placeholder="Message"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Ask</button>
                </form>
              </div>
              </div>
              <?php } ?>
              <!-- End of Customer -->

              <!-- Agent -->
              <?php 
                if($utype =='K'){ 
                  $sql="SELECT * FROM customer_askmore WHERE id = '$mid'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                      $subject = $row['subject'];
                      $message = $row['message'];
                  }

              ?>
              <div class="row">
              <div class="col-md-6">
                <form action="formaction/askmore_agent_action.php" method="POST">
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="hidden" class="form-control" name="messageid" value='<?php echo "$mid"; ?>'>
                    <input disabled type="text" class="form-control" name="subject" placeholder="Subject" value='<?php echo "$subject"; ?>'>
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea disabled type="text" class="form-control" name="message" placeholder="Message" value=''><?php echo "$message"; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Reply</label>
                    <textarea type="text" class="form-control" name="reply" placeholder="Reply" value=''></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Ask</button>
                </form>
              </div>
              </div>
              
              <?php } ?>
              <!-- End of Agent -->

              <!-- Customer to view the Message with Reply -->
              <?php 
                if($utype =='C' && isset($mid)){ 
                  $sql="SELECT * FROM customer_askmore WHERE id = '$mid'";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_array($result)){
                      $subject = $row['subject'];
                      $message = $row['message'];
                      $reply = $row['reply'];
                      $status = $row['status'];
                  }
                  if($status == '1'){
              ?>
              <div class="row">
              <div class="col-md-6">
              	<h4>Agent Replied to your Message</h4>
                <!-- <form action="formaction/askmore_agent_action.php" method="POST"> -->
                  <div class="form-group">
                    <label>Subject</label>
                    <input type="hidden" class="form-control" name="messageid" value='<?php echo "$mid"; ?>'>
                    <input  type="text" class="form-control" name="subject" placeholder="Subject" value='<?php echo "$subject"; ?>'>
                  </div>
                  <div class="form-group">
                    <label>Message</label>
                    <textarea  type="text" class="form-control" name="message" placeholder="Message" value=''><?php echo "$message"; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Reply</label>
                    <textarea type="text" class="form-control" name="reply" placeholder="Reply" value=''><?php echo "$reply"; ?></textarea>
                  </div>
                  <!-- <button type="submit" class="btn btn-primary">Ask</button> -->
                <!-- </form> -->
                <?php } else{?>
                	<h4><span class="label label-info">Waiting for Agent's Reply</span></h4>
              </div>
              </div>
              
              <?php } } ?>


              <!-- End of Customer View -->

              <!-- End of While loop Property Search -->
              <?php } ?>
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