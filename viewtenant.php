<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for agent login
  if($_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }
    //property id
   if(isset($_GET["id"]))
      $id = $_GET["id"];
    else
      header("location:index.php");

  //Get Tenant Details
    $sql= "SELECT * FROM tenant WHERE tappid='$id'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      //TAPP id for ref
      $tappid = $row["tappid"];

      $customerid = $row["customerid"];
      $propertyid = $row["propertyid"];

      //App Details
      $cus_dob = $row["cus_dob"];
      $cus_title = $row["cus_title"];
      $cus_gender = $row["cus_gender"];
      $cus_driverlicense = $row["cus_driverlicense"];
      $cus_driverlicensestate = $row["cus_driverlicensestate"];
      $cus_passportno = $row["cus_passportno"];
      $cus_passportcountry = $row["cus_passportcountry"];
      $cus_pentionno = $row["cus_pentionno"];
      $cus_carmake = $row["cus_carmake"];
      $cus_carno = $row["cus_carno"];
      $cus_occupants_adults = $row["cus_occupants_adults"];
      $cus_occupants_children = $row["cus_occupants_children"];
      $smoker = $row["smoker"];
      $havepets = $row["havepets"];
    }

    //Get Property Details
    $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
    $result_property = $conn->query($sql);
    while($row = $result_property->fetch_assoc()) {
      $street1 = $row["street1"];
      $suburb = $row["suburb"];
      $postcode = $row["postcode"];
      $agentid = $row["agentid"];
    }

    $sql= "SELECT * FROM customer WHERE customerid='$customerid'";
    $result_customer = $conn->query($sql);
    while($row = $result_customer->fetch_assoc()) {
      $iscomplete = $row["iscomplete"];
      $customerid = $row["customerid"];
      $firstname = $row["firstname"];
      $othername = $row["othername"];
      $lastname = $row["lastname"];
      $email = $row["email"];
      $addno = $row["addno"];
      $addstreet1 = $row["addstreet1"];
      $addstreet2 = $row["addstreet2"];
      $addsuburb = $row["addsuburb"];
      $addstate = $row["addstate"];
      $addpostcode = $row["addpostcode"];
      $phonemobile = $row["phonemobile"];
      $phonehome = $row["phonehome"];
      $phonefax = $row["phonefax"];
      $phonework = $row["phonework"];
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
            <!-- Middle Col Start -->
            <div class="panel panel-default">
          <div class="panel-heading">View Tenant Application</div>
          <div class="panel-body">

            <form style="margin-left:15px;"  enctype="multipart/form-data" class="form-horizontal" id="form1" name="form1" method="post" action="formaction/submit_tenant_action.php">
            <h2>Tenant Application - <?php echo $firstname. " ". $lastname; ?></h2><hr>

            <table class="table table-striped" border="1">
                <tr>
                    <label for="propertydetails" class="lead">Property Details</label>
                    <br />
                    <label for="address"><h3>Address of the Property</h3></label>
                </tr>
                <tr>
                    <div class="form-group">
                        <label for="propertyid" class="col-sm-2 control-label">Property ID</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control" type="text" name="propertyid" id="PropertyID"  value="<?php echo $propertyid; ?>"  />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="street" class="col-sm-2 control-label">Street</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control" type="text" name="street" id="street" value="<?php echo $street1; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="suburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control" type="text" name="suburb" id="suburb" value="<?php echo $suburb; ?>"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="postcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input readonly class="form-control" type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>"/>
                        </div>
                    </div>
                </tr>
            </table>

            <label for="applicantdetails" class="lead">Applicant Details</label>
            <div class="form-group">
                <input  class="form-control" readonly type="hidden" name="customerid" id="agentid" value="<?php echo $agentid; ?>"/>
              <input  class="form-control" readonly type="hidden" name="customerid" id="customerid" value="<?php echo $customerid; ?>"/>
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="firstname" id="firstname" value="<?php echo $cus_title; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="firstname" id="firstname" value="<?php echo $firstname; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="othernames" class="col-sm-2 control-label">Other Names</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="othernames" id="othernames" value="<?php if(isset($othername)) {echo $othername; } ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="lastname" id="lastname" value="<?php echo $lastname; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">E-mail</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="email" id="email" value="<?php echo $email; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="tenantaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="no" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " readonly type="text" name="no" id="no" value="<?php echo $addno; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="street1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " readonly type="text" name="street1" id="street1" value="<?php echo $addstreet1; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="street2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " readonly type="text" name="street2" id="street2" value="<?php echo $addstreet2; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="suburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " readonly type="text" name="suburb" id="suburb" value="<?php echo $addsuburb; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="state" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " readonly type="text" name="state" id="state" value="<?php echo $addstate; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="postcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " readonly type="text" name="postcode" id="postcode" value="<?php echo $addpostcode; ?>" />
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input required class="form-control" readonly type="text" name="cus_dob" id="dob" value="<?php echo $cus_dob; ?>"  />
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    <input required class="form-control" readonly type="text" name="cus_dob" id="dob" value="<?php echo $cus_gender; ?>"  />
                </div>
            </div>
            <div class="form-group">
                <label for="phonemobile" class="col-sm-2 control-label">Mobile</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="number" name="phonemobile" id="phonemobile" value="<?php echo $phonemobile; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonehome" class="col-sm-2 control-label">Home Phone</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="number" name="phonehome" id="phonehome" value="<?php echo $phonehome; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonework" class="col-sm-2 control-label">Work Phone</label>
                <div class="col-sm-10">
                    <input class="form-control"  readonly type="number" name="phonework" id="phonework" value="<?php echo $phonework; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonefax" class="col-sm-2 control-label">Fax</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="number" name="phonefax" id="phonefax" value="<?php echo $phonefax; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="dlno" class="col-sm-2 control-label">Driver's License No</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="cus_driverlicense" id="dlno" value="<?php echo $cus_driverlicense; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="dlstate" class="col-sm-2 control-label">Driver's License State</label>
                <div class="col-sm-10">
                    <input class="form-control" readonly type="text" name="cus_driverlicensestate" id="dlstate" value="<?php echo $cus_driverlicensestate; ?>"  />
                </div>
            </div>
            <div class="form-group">
                <label for="passportno" class="col-sm-2 control-label">Passport No</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="cus_passportno" id="passportno" value="<?php echo $cus_passportno; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="passportcountry" class="col-sm-2 control-label">Passport Country</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="cus_passportcountry" id="passportcountry" value="<?php echo $cus_passportcountry; ?>"  />
                </div>
            </div>
            <div class="form-group">
                <label for="pensionno" class="col-sm-2 control-label">Pension/ Centerlink No / If Applicable </label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="cus_pentionno" id="pensionno" value="<?php echo $cus_pentionno; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="car" class="col-sm-2 control-label">Car Make and Model</label>
                <div class="col-sm-10">
                    <input  readonly class="form-control" type="text" name="cus_carmake" id="car" value="<?php echo $cus_carmake; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="carregno" class="col-sm-2 control-label">Car Registration No </label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="cus_carno" id="carregno" value="<?php echo $cus_carno; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="occupants">Number of Occupants</label>
                <div class="form-inline col-md-10">
                    <label for="noofadults" class="control-label">Adults</label>
                    <input readonly type="number" class="form-control" id="noofadults" name="cus_occupants_adults" value="<?php echo $cus_occupants_adults; ?>" />

                    <label for="noofchildren" class="control-label">Children</label>
                    <input readonly type="number" class="form-control" id="noofadults" name="cus_occupants_children" value="<?php echo $cus_occupants_children; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="smoker" class="col-sm-2 control-label">Are you a smoker?</label>
                <div class="col-sm-4">
                     <input readonly class="form-control" type="text" name="cus_carno" id="carregno" value="<?php echo $smoker; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pets" class="col-sm-2 control-label">Do you have any pets?</label>
                <div class="col-sm-4">
                     <input readonly class="form-control" type="text" name="cus_carno" id="carregno" value="<?php echo $havepets; ?>"/>
                </div>
            </div>

            <!-- Residential Form -->
            <!-- Current Resi -->
            <?php
            //Current Residential Details
              $sql= "SELECT * FROM tenant_residential WHERE tappid='$tappid' AND currentorpast = 'C' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="applicanthistory" class="control-label lead">Applicant History</label>
            </div>
            <div class="form-group">
                <label for="residential" class="control-label lead"><i>Current Residential Details</i></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prevaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="prevno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['addno']; ?>" type="text" name="p_addno" id="prevno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="prevstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " value="<?php echo $row['street1']; ?>" type="text" name="p_street1" id="prevstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['street2']; ?>" type="text" name="p_street2" id="prevstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevsuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['suburb']; ?>" type="text" name="p_suburb" id="prevsuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['state']; ?>" type="text" name="p_postcode" id="prevpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['postcode']; ?>" type="text" name="p_state" id="prevstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="prevNoOfMonths" class="col-sm-2 control-label">How long you have been in this address (Months)?</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="number"  value="<?php echo $row['time']; ?>" name="p_time" id="prevNoOfMonths" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevRent" class="col-sm-2 control-label">Rent $</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="number" value="<?php echo $row['rent']; ?>" name="p_rent" id="prevRent" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="prevAgent" class="col-md-2 control-label">Agent/Landlord</label>
                    <input readonly type="text" value="<?php echo $row['landlord_name']; ?>" class="form-control" id="prevAgent" name="p_landlord_name" />

                    <label for="prevAgentphone" class="control-label">Phone</label>
                    <input readonly type="number" value="<?php echo $row['landlord_phone']; ?>" class="form-control" id="prevAgentphone" name="p_landlord_phone" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevReason" class="col-sm-2 control-label">Reason for leaving?</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" value="<?php echo $row['reasontoleave']; ?>" type="text" name="p_reasontoleave" id="prevReason" />
                </div>
            </div>
            
            <?php } ?>
            <!-- End of Current Resi -->


            <!-- Previous Resi -->
            <?php
            //Current Residential Details
              $sql= "SELECT * FROM tenant_residential WHERE tappid='$tappid' AND currentorpast = 'P' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="prevresidential" class="control-label lead"><i>Previous Residential Details</i></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prevaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="prevno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['addno']; ?>" type="text" name="p_addno" id="prevno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="prevstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " value="<?php echo $row['street1']; ?>" type="text" name="p_street1" id="prevstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['street2']; ?>" type="text" name="p_street2" id="prevstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevsuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['suburb']; ?>" type="text" name="p_suburb" id="prevsuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['state']; ?>" type="text" name="p_postcode" id="prevpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " value="<?php echo $row['postcode']; ?>" type="text" name="p_state" id="prevstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="prevNoOfMonths" class="col-sm-2 control-label">How long you have been in this address (Months)?</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="number"  value="<?php echo $row['time']; ?>" name="p_time" id="prevNoOfMonths" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevRent" class="col-sm-2 control-label">Rent $</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="number" value="<?php echo $row['rent']; ?>" name="p_rent" id="prevRent" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="prevAgent" class="col-md-2 control-label">Agent/Landlord</label>
                    <input readonly type="text" value="<?php echo $row['landlord_name']; ?>" class="form-control" id="prevAgent" name="p_landlord_name" />

                    <label for="prevAgentphone" class="control-label">Phone</label>
                    <input readonly type="number" value="<?php echo $row['landlord_phone']; ?>" class="form-control" id="prevAgentphone" name="p_landlord_phone" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevReason" class="col-sm-2 control-label">Reason for leaving?</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" value="<?php echo $row['reasontoleave']; ?>" type="text" name="p_reasontoleave" id="prevReason" />
                </div>
            </div>
            <div class="form-group">
                <label for="bondrefund" class="col-sm-2 control-label">Was bond refunded in full?</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" value="<?php if($row['bondrefunded']=='1'){echo "Yes";} else {echo "No";} ?>" type="text" name="p_reasontoleave" id="prevReason" />
                </div>
            </div>
            <!-- End of Previous Resi -->
            <?php } ?>
            <!-- End Of Residential -->

            <!-- Employeement Current -->
            <?php
              $sql= "SELECT * FROM tenant_empdetails WHERE tappid='$tappid' AND currentorpast = 'C' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="currentemployer" class="control-label lead">Current Employment Details</label>
            </div>
            <div class="form-group">
                <label for="occupation" class="col-sm-2 control-label">Occupation</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="em_c_occupation" id="occupation" value="<?php echo $row['occupation']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="curremployer" class="col-sm-2 control-label">Current Employer</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="em_c_post" id="curremployer" value="<?php echo $row['post']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="workaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="workno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_addno" id="workno" value="<?php echo $row['street2']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="workstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " type="text" name="em_c_street1" id="em_c_street1" value="<?php echo $row['street1']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_street2" id="workstreet2" value="<?php echo $row['suburb']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="worksuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_suburb" id="worksuburb" value="<?php echo $row['state']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_postcode" id="workpostcode" value="<?php echo $row['postcode']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_state" id="workstate" value="<?php echo $row['state']; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="workcontact" class="col-md-2 control-label">Contact Name(Payroll/Manager)</label>
                    <input readonly type="text" class="form-control" id="workcontact" name="em_c_payrollmanager_name" value="<?php echo $row['payrollmanager_name']; ?>"/>

                    <label for="managerphone" class="control-label">Phone</label>
                    <input readonly type="number" class="form-control" id="managerphone" name="em_c_payrollmanagerphone" value="<?php echo $row['payrollmanager_phone']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="length" class="col-md-2 control-label">Length of employment(Months)</label>
                    <input readonly type="number" class="form-control" id="length" name="em_c_lof" value="<?php echo $row['lof']; ?>" />

                    <label for="netincome" class="control-label">Net income per month($)</label>
                    <input readonly type="number" class="form-control" id="netincome" name="em_c_netincome" value="<?php echo $row['netincome']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="employmenttype" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="netincome" name="em_c_netincome" value="<?php echo $row['type']; ?>"/>
                </div>
            </div>
            <?php } ?>
            <!-- End of current emp -->

            <!-- Previ emp -->
            <?php
              $sql= "SELECT * FROM tenant_empdetails WHERE tappid='$tappid' AND currentorpast = 'P' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="prevemployer" class="control-label lead">Previous Employment Details</label>
            </div>
            <div class="form-group">
                <label for="occupation" class="col-sm-2 control-label">Occupation</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="em_c_occupation" id="occupation" value="<?php echo $row['occupation']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="curremployer" class="col-sm-2 control-label">Current Employer</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="em_c_post" id="curremployer" value="<?php echo $row['post']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="workaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="workno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_addno" id="workno" value="<?php echo $row['street2']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="workstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " type="text" name="em_c_street1" id="em_c_street1" value="<?php echo $row['street1']; ?>" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_street2" id="workstreet2" value="<?php echo $row['suburb']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="worksuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_suburb" id="worksuburb" value="<?php echo $row['state']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_postcode" id="workpostcode" value="<?php echo $row['postcode']; ?>"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" name="em_c_state" id="workstate" value="<?php echo $row['state']; ?>"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="workcontact" class="col-md-2 control-label">Contact Name(Payroll/Manager)</label>
                    <input readonly type="text" class="form-control" id="workcontact" name="em_c_payrollmanager_name" value="<?php echo $row['payrollmanager_name']; ?>"/>

                    <label for="managerphone" class="control-label">Phone</label>
                    <input readonly type="number" class="form-control" id="managerphone" name="em_c_payrollmanagerphone" value="<?php echo $row['payrollmanager_phone']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="length" class="col-md-2 control-label">Length of employment(Months)</label>
                    <input readonly type="number" class="form-control" id="length" name="em_c_lof" value="<?php echo $row['lof']; ?>" />

                    <label for="netincome" class="control-label">Net income per month($)</label>
                    <input readonly type="number" class="form-control" id="netincome" name="em_c_netincome" value="<?php echo $row['netincome']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="employmenttype" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <input readonly type="text" class="form-control" id="netincome" name="em_c_netincome" value="<?php echo $row['type']; ?>"/>
                </div>
            </div>
            <?php } ?>
            <!-- End of previous emp -->

            <!-- Ref 1 -->
            <?php
              $sql= "SELECT * FROM tenant_references WHERE tappid='$tappid' AND refid = '1' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="references" class="control-label lead">References</label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="referee1">Referee 1</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="firstnameref1" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" value="<?php echo $row['firstname']; ?>" name="ref1_firstname" id="firstnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="lastnameref1" class="col-md-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " type="text" value="<?php echo $row['lastname']; ?>" name="ref1_lastname" id="lastnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="relationshipref1" class="col-sm-2 control-label">Relationship</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" value="<?php echo $row['relationship']; ?>" name="ref1_relationship" id="relationshipref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="phoneref1" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="number" value="<?php echo $row['phone']; ?>" name="ref1_phone" id="phoneref1" />
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- end of ref 1 -->

            <!-- Start of ref 2 -->
            <?php
              $sql= "SELECT * FROM tenant_references WHERE tappid='$tappid' AND refid = '2' ";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label class="col-md-2 control-label" for="referee1">Referee 2</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="firstnameref1" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" value="<?php echo $row['firstname']; ?>" name="ref1_firstname" id="firstnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="lastnameref1" class="col-md-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-md-10 form-control " type="text" value="<?php echo $row['lastname']; ?>" name="ref1_lastname" id="lastnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="relationshipref1" class="col-sm-2 control-label">Relationship</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="text" value="<?php echo $row['relationship']; ?>" name="ref1_relationship" id="relationshipref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="phoneref1" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input readonly class=" col-sm-10 form-control " type="number" value="<?php echo $row['phone']; ?>" name="ref1_phone" id="phoneref1" />
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <!-- End of ref 2 -->

            <!-- Emergency -->
            <?php
              $sql= "SELECT * FROM tenant_emergency WHERE tappid='$tappid'";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

          
            ?>
            <div class="form-group">
                <label for="emergencycontact" class="control-label lead">Emergency Contact Details</label>
            </div>
            <div class="form-group">
                <label for="emfirstname" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="emg_firstname" id="emfirstname" value="<?php echo $row['firstname']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="emlastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="emg_lastname" id="emlastname" value="<?php echo $row['lastname']; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="emrelationship" class="col-sm-2 control-label">Relationship</label>
                <div class="col-sm-10">
                    <input readonly class="form-control" type="text" name="emg_relationship" id="emrelationship" value="<?php echo $row['relationship']; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="emmobile" class="col-md-2 control-label">Phone (Mobile)</label>
                    <input  readonly type="number" class="form-control" id="emmobile" name="emg_phonemobile" value="<?php echo $row['phonemobile']; ?>"/>

                    <label for="emphonehome" class="control-label">Phone (Home)</label>
                    <input readonly type="number" class="form-control" id="emphonehome" name="emg_phonehome" value="<?php echo $row['phonehome']; ?>"/>

                
                </div>
            </div>
            <div class="form-group">
                <p>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </p>
                <label for="prevtenancies" class="col-sm-2 control-label">Have any of your previous tenancies been terminated?</label>
                <div class="col-sm-4">
                    <input  readonly type="text" class="form-control" id="emmobile" name="emg_phonemobile" value="<?php if($row['tenancystatus']=='1'){ echo "Yes"; } else {echo "No"; } ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="indebt" class="col-sm-2 control-label">Are you in dept to another Agent / Landlord?</label>
                <div class="col-sm-4">
                    <input  readonly type="text" class="form-control" id="emmobile" name="emg_phonemobile" value="<?php if($row['deptlandlord']=='1'){echo "Yes";}else{echo "No";} ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="paymentproblems" class="col-sm-2 control-label">Are there any existing reasons that may effect your rent payments?</label>
                <div class="col-sm-4">
                    <input  readonly type="text" class="form-control" id="emmobile" name="emg_phonemobile" 
                    value="<?php if($row['reasonsforpayments']=='1'){ echo "Yes"; } else{ echo "No"; } ?>"/>
                </div>
            </div>
            <p>
                &nbsp;
                &nbsp;
                &nbsp;
            </p>
            <hr>
            <?php } ?>
            <!-- End of Emergency -->

            <!-- Files Check -->
            <?php
              $sql= "SELECT * FROM tenant_files WHERE tappid='$tappid'";
              $result_customer = $conn->query($sql);
              while($row = $result_customer->fetch_assoc()) {

              //Total marks for evaluation
              $totalmarks = 0;
            ?>
            <div class="form-group" style="border:medium">
                <label>100 POINTS CHECK</label>
                <p>* A minimum of 100 points is required for each applicant.</p>
            </div>
            <p>
                &nbsp;
                &nbsp;
                &nbsp;
            </p>
            <div class="form-group">
                <label><b>A) Proof of Identity</b></label>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>30 Points</p>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <p>Drivers' License</p>
                        <p>Passport</p>
                        <p>Birth Certificate</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($row['proofidentity'] != '') { 
                      $totalmarks = $totalmarks + 30;
                      ?>
                    <div style="color:#5bc0de;" class="form-group text-center">
                        <i class="fa fa-file fa-3x"></i><br>
                        <STRONG>File Subimitted</STRONG><br>
                        <a href="<?php echo $row['proofidentity'];  ?>">Review File</a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <p>
                &nbsp;
                &nbsp;
                &nbsp;
            </p>
            <div class="form-group">
                <label><b>B) Proof of Income</b></label>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>30 Points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="lastpay" class="col-sm-5 control-label">Last pay advise / Current Centerlink statement</label>
                        <div class="col-sm-7">
                            <?php if($row['proofincome_centerlink'] != '') { 
                              $totalmarks = $totalmarks + 15; ?>
                            <div style="color:#5bc0de;" class="form-group text-center">
                                <i class="fa fa-file fa-3x"></i><br>
                                <STRONG>File Subimitted</STRONG><br>
                                <a href="<?php echo $row['proofincome_centerlink'];  ?>">Review File</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bankstatement" class="col-sm-5 control-label">Current bank statements (must have sufficient funds to meet rental payments)</label>
                        <div class="col-sm-7">

                        <?php if($row['proofincome_bank'] != '') { 
                          $totalmarks = $totalmarks + 15; ?>
                        <div style="color:#5bc0de;" class="form-group text-center">
                            <i class="fa fa-file fa-3x"></i><br>
                            <STRONG>File Subimitted</STRONG><br>
                            <a href="<?php echo $row['proofincome_bank'];  ?>">Review File</a>
                        </div>
                        <?php } ?>
                            
                        </div>
                    </div>

                </div>
            </div>
            <p>
                &nbsp;
                &nbsp;
                &nbsp;
            </p>
            <div class="form-group">
                <label><b>Supportive Documentation</b></label>
                <p>( Customer must reach atleast 40 points of the following documentation. )</p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>40 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="rentalloger" class="col-sm-5 control-label">Current Rental Loger(From Agent)</label>
                        <div class="col-sm-7">
                            <?php if($row['spdoc_currentrentloger'] != '') { 
                              $totalmarks = $totalmarks + 40; ?>
                            <div style="color:#5bc0de;" class="form-group text-center">
                                <i class="fa fa-file fa-3x"></i><br>
                                <STRONG>File Subimitted</STRONG><br>
                                <a href="<?php echo $row['spdoc_currentrentloger'];  ?>">Review File</a>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>20 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="rentreceipts" class="col-sm-5 control-label">Last 2 rental reciepts</label>
                        <div class="col-sm-7">
                              <?php if($row['spdoc_rentalreciept'] != '') { 
                                $totalmarks = $totalmarks + 20; ?>
                              <div style="color:#5bc0de;" class="form-group text-center">
                                  <i class="fa fa-file fa-3x"></i><br>
                                  <STRONG>File Subimitted</STRONG><br>
                                  <a href="<?php echo $row['spdoc_rentalreciept'];  ?>">Review File</a>
                              </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>20 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="writtenrefs" class="col-sm-5 control-label">Two written references</label>
                        <div class="col-sm-7">
                            <?php if($row['spdoc_references'] != '') {
                            $totalmarks = $totalmarks + 20; ?>
                              <div style="color:#5bc0de;" class="form-group text-center">
                                  <i class="fa fa-file fa-3x"></i><br>
                                  <STRONG>File Subimitted</STRONG><br>
                                  <a href="<?php echo $row['spdoc_references'];  ?>">Review File</a>
                              </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>30 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="ratenotice" class="col-sm-5 control-label">Recent Rate Notice</label>
                        <div class="col-sm-7">
                            <?php if($row['spdoc_ratenotice'] != '') { 
                              $totalmarks = $totalmarks + 30; ?>
                              <div style="color:#5bc0de;" class="form-group text-center">
                                  <i class="fa fa-file fa-3x"></i><br>
                                  <STRONG>File Subimitted</STRONG><br>
                                  <a href="<?php echo $row['spdoc_ratenotice'];  ?>">Review File</a>
                              </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>10 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="vehiclereg" class="col-sm-5 control-label">Vehicle Registration Paper</label>
                        <div class="col-sm-7">
                            <?php if($row['spdoc_vehiclereg'] != '') { 
                              $totalmarks = $totalmarks + 10; ?>
                              <div style="color:#5bc0de;" class="form-group text-center">
                                  <i class="fa fa-file fa-3x"></i><br>
                                  <STRONG>File Subimitted</STRONG><br>
                                  <a href="<?php echo $row['spdoc_vehiclereg'];  ?>">Review File</a>
                              </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>10 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="utility" class="col-sm-5 control-label">Current Electricity/Phone Account</label>
                        <div class="col-sm-7">
                            <?php if($row['spdoc_elecorphone'] != '') { 
                              $totalmarks = $totalmarks + 10; ?>
                              <div style="color:#5bc0de;" class="form-group text-center">
                                  <i class="fa fa-file fa-3x"></i><br>
                                  <STRONG>File Subimitted</STRONG><br>
                                  <a href="<?php echo $row['spdoc_elecorphone'];  ?>">Review File</a>
                              </div>
                              <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <h3>Customer Has <?php echo $totalmarks; ?> Points</h3>
            <!-- Progress Logic -->
            <?php 
              if($totalmarks >= 100){
                $val = 100;
                $class = "progress-bar-success";
              } else {
                $val = $totalmarks;
                if($totalmarks > 50){
                  $class = "progress-bar-warning";
                } else{
                  $class = "progress-bar-danger";
                }
              }
            ?>
            <div class="progress">
              <div class="progress-bar <?php echo $class;?>" role="progressbar" aria-valuenow="<?php echo $val;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $val;?>%;">
                <?php echo $val;?>%
              </div>
            </div>
            <!-- End of Prog -->

            <?php } ?>
            <!-- End of files -->
                  <div class="form-group">
                    <div>
                      <a onclick="return confirm('Are you sure you want to Accept this application by this user?');" href='<?php echo $baseurl . 'formaction/approve_tenant_action.php?id='. $tappid; ?>'  type="submit" class="btn btn-warning">Approve</a>
                      <a onclick="return confirm('Are you sure you want to permenantly reject this users tenant application?   you cannot recover this action after you complete');" href='<?php echo $baseurl . 'formaction/reject_tenant_action.php?id='. $tappid; ?>' type="reset" class="btn btn-default">Reject</a> 
                    </div>
                  </div>
        </form>   
            
          </div>
        </div>

        <!-- End of Middle column -->
      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>