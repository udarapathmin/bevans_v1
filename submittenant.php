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

    //property id
    $propertyid = $_GET["id"];

    $un = $_SESSION['username'];
    // Search for User
    $sql= "SELECT * FROM customer WHERE username='$un'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $iscomplete = $row["iscomplete"];
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

    //Get Property Details
    $sql= "SELECT * FROM realestateproperty WHERE propertyid='$propertyid'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc()) {
      $street1 = $row["street1"];
      $suburb = $row["suburb"];
      $postcode = $row["postcode"];
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Submit Tenant Application</title>

    

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
          
            if( $iscomplete == '0') {
              //if it is display message to complete profile ?>

              <div class="alert alert-info alert-dismissible" role="alert">
                <strong>Notice!</strong>Your Profile is incomplete. Please complete your profile by editing <strong><a href='<?php echo $baseurl . "editcustomerprofile.php" ?>'>here</a></strong>.
              </div>

            <?php
            } else {
           ?>
          
        <div class="panel panel-default">
          <div class="panel-heading">Submit Tenant Application</div>
          <div class="panel-body">

            <form style="margin-left:15px;" class="form-horizontal" id="form1" name="form1" method="post" action="">
            <h2>Tenant Application</h2><hr>

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
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu" id="jumpMenu">
                        <span class="caret"></span>
                        <option>Mr</option>
                        <option>Mrs</option>
                        <option>Miss</option>
                        <option>Doctor</option>
                    </select>
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
                    <input class="form-control" readonly type="text" name="othernames" id="othernames" value="<?php if(isset($othernames)) echo $othernames; ?>" />
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
                            <input class=" col-sm-10 form-control " readonly type="text" name="suburb" id="suburb" value="<?php echo $suburb; ?>"/>
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
                            <input class=" col-sm-10 form-control " readonly type="text" name="postcode" id="postcode" value="<?php echo $postcode; ?>" />
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="form-group">
                <label for="dob" class="col-sm-2 control-label">Date of Birth</label>
                <div class="col-sm-10">
                    <input required class="form-control" type="date" name="dob" id="dob" />
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">Gender</label>
                <div class="col-sm-10">
                    <label class="control-label radio-inline">
                        <input type="radio" name="inlineradioopt" id="male" value="male" />Male
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="inlineradioopt" id="female" value="female" />Female
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="phonemobile" class="col-sm-2 control-label">Mobile</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="phonemobile" id="phonemobile" value="<?php echo $phonemobile; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonehome" class="col-sm-2 control-label">Home Phone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="phonehome" id="phonehome" value="<?php echo $phonehome; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonework" class="col-sm-2 control-label">Work Phone</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="phonework" id="phonework" value="<?php echo $phonework; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="phonefax" class="col-sm-2 control-label">Fax</label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" name="phonefax" id="phonefax" value="<?php echo $phonefax; ?>"/>
                </div>
            </div>
            <div class="form-group">
                <label for="dlno" class="col-sm-2 control-label">Driver's License No</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="dlno" id="dlno" />
                </div>
            </div>
            <div class="form-group">
                <label for="dlstate" class="col-sm-2 control-label">Driver's License State</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="dlstate" id="dlstate" />
                </div>
            </div>
            <div class="form-group">
                <label for="passportno" class="col-sm-2 control-label">Passport No</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="passportno" id="passportno" />
                </div>
            </div>
            <div class="form-group">
                <label for="passportcountry" class="col-sm-2 control-label">Passport Country</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="passportcountry" id="passportcountry" />
                </div>
            </div>
            <div class="form-group">
                <label for="pensionno" class="col-sm-2 control-label">Pension/ Centerlink No / If Applicable </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="pensionno" id="pensionno" />
                </div>
            </div>
            <div class="form-group">
                <label for="car" class="col-sm-2 control-label">Car Make and Model</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="car" id="car" />
                </div>
            </div>
            <div class="form-group">
                <label for="carregno" class="col-sm-2 control-label">Car Registration No </label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="carregno" id="carregno" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="occupants">Number of Occupants</label>
                <div class="form-inline col-md-10">
                    <label for="noofadults" class="control-label">Adults</label>
                    <input type="number" class="form-control" id="noofadults" name="noofadults" />

                    <label for="noofchildren" class="control-label">Children</label>
                    <input type="number" class="form-control" id="noofadults" name="noofadults" />
                </div>
            </div>
            <div class="form-group">
                <label for="smoker" class="col-sm-2 control-label">Are you a smoker?</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu2" id="jumpMenu2">
                        <span class="caret"></span>
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="pets" class="col-sm-2 control-label">Do you have any pets?</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu3" id="jumpMenu3">
                        <span class="caret"></span>
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="applicanthistory" class="control-label lead">Applicant History</label>
            </div>
            <div class="form-group">
                <label for="residential" class="control-label lead"><i>Current Residential Details</i></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="currentaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="currentno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="currentno" id="currentno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="currentstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="currentstreet1" id="currentstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="currentstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="currentstreet2" id="currentstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="currentsuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="currentsuburb" id="currentsuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="currentpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="currentpostcode" id="currentpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="currentstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="currentstate" id="currentstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="noOfMonths" class="col-sm-2 control-label">How long you have been in this address (Months)?</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="noOfMonths" id="noOfMonths" />
                </div>
            </div>
            <div class="form-group">
                <label for="rent" class="col-sm-2 control-label">Rent $</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="rent" id="rent" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="agent" class="col-md-2 control-label">Agent/Landlord</label>
                    <input type="text" class="form-control" id="agent" name="agent" />

                    <label for="agentphone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="agentphone" name="agentphone" />
                </div>
            </div>
            <div class="form-group">
                <label for="reason" class="col-sm-2 control-label">Reason for leaving?</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="reason" id="reason" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevresidential" class="control-label lead"><i>Previous Residential Details</i></label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prevaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="prevno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevno" id="prevno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="prevstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="prevstreet1" id="prevstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevstreet2" id="prevstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevsuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevsuburb" id="prevsuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevpostcode" id="prevpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevstate" id="prevstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="prevNoOfMonths" class="col-sm-2 control-label">How long you have been in this address (Months)?</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prevNoOfMonths" id="prevNoOfMonths" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevRent" class="col-sm-2 control-label">Rent $</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prevRent" id="prevRent" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="prevAgent" class="col-md-2 control-label">Agent/Landlord</label>
                    <input type="text" class="form-control" id="prevAgent" name="prevAgent" />

                    <label for="prevAgentphone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="prevAgentphone" name="prevAgentphone" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevReason" class="col-sm-2 control-label">Reason for leaving?</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prevReason" id="prevReason" />
                </div>
            </div>
            <div class="form-group">
                <label for="bondrefund" class="col-sm-2 control-label">Was bond refunded in full?</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu4" id="jumpMenu4">
                        <span class="caret"></span>
                        <option>YES</option>
                        <option>NO</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="currentemployer" class="control-label lead">Current Employment Details</label>
            </div>
            <div class="form-group">
                <label for="occupation" class="col-sm-2 control-label">Occupation</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="occupation" id="occupation" />
                </div>
            </div>
            <div class="form-group">
                <label for="curremployer" class="col-sm-2 control-label">Current Employer</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="curremployer" id="curremployer" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="workaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="workno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="workno" id="workno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="workstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="workstreet1" id="workstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="workstreet2" id="workstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="worksuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="worksuburb" id="worksuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="workpostcode" id="workpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="workstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="workstate" id="workstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="workcontact" class="col-md-2 control-label">Contact Name(Payroll/Manager)</label>
                    <input type="text" class="form-control" id="workcontact" name="workcontact" />

                    <label for="managerphone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="managerphone" name="managerphone" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="length" class="col-md-2 control-label">Length of employment(Months)</label>
                    <input type="text" class="form-control" id="length" name="length" />

                    <label for="netincome" class="control-label">Net income per month($)</label>
                    <input type="text" class="form-control" id="netincome" name="netincome" />
                </div>
            </div>
            <div class="form-group">
                <label for="employmenttype" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu5" id="jumpMenu5">
                        <span class="caret"></span>
                        <option>Full Time</option>
                        <option>Part Time</option>
                        <option>Casual</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="prevemployer" class="control-label lead">Previous Employment Details</label>
            </div>
            <div class="form-group">
                <label for="prevoccupation" class="col-sm-2 control-label">Occupation</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prevoccupation" id="prevoccupation" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevemployer" class="col-sm-2 control-label">Previous Employer</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="prevemployer" id="prevemployer" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="prevworkaddress">Address</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="prevworkno" class="col-sm-2 control-label">No</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevworkno" id="prevworkno" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="prevworkstreet1" class="col-md-2 control-label">Street 1</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="prevworkstreet1" id="prevworkstreet1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevworkstreet2" class="col-sm-2 control-label">Street 2</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevworkstreet2" id="prevworkstreet2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevworksuburb" class="col-sm-2 control-label">Suburb</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevworksuburb" id="prevworksuburb" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevworkpostcode" class="col-sm-2 control-label">Postcode</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevworkpostcode" id="prevworkpostcode" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="prevworkstate" class="col-sm-2 control-label">State</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="prevworkstate" id="prevworkstate" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="prevworkcontact" class="col-md-2 control-label">Contact Name(Payroll/Manager)</label>
                    <input type="text" class="form-control" id="prevworkcontact" name="prevworkcontact" />

                    <label for="prevmanagerphone" class="control-label">Phone</label>
                    <input type="text" class="form-control" id="prevmanagerphone" name="prevmanagerphone" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="prevlength" class="col-md-2 control-label">Length of employment(Months)</label>
                    <input type="text" class="form-control" id="prevlength" name="prevlength" />

                    <label for="prevnetincome" class="control-label">Net income per month($)</label>
                    <input type="text" class="form-control" id="prevnetincome" name="prevnetincome" />
                </div>
            </div>
            <div class="form-group">
                <label for="prevemploymenttype" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select class="btn btn-default dropdown-toggle" data-toggle="dropdown" name="jumpMenu5" id="jumpMenu5">
                        <span class="caret"></span>
                        <option>Full Time</option>
                        <option>Part Time</option>
                        <option>Casual</option>
                        <option>Other</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="references" class="control-label lead">References</label>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="referee1">Referee 1</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="firstnameref1" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="firstnameref1" id="firstnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="lastnameref1" class="col-md-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="lastnameref1" id="lastnameref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="relationshipref1" class="col-sm-2 control-label">Relationship</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="relationshipref1" id="relationshipref1" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="phoneref1" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="phoneref1" id="phoneref1" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-2 control-label" for="referee2">Referee 2</label>
                <div class="col-md-10">
                    <div class="form-group">
                        <label for="firstnameref2" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="firstnameref2" id="firstnameref2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2">
                    <div class="form-group">
                        <label for="lastnameref2" class="col-md-2 control-label">Last Name</label>
                        <div class="col-sm-10">
                            <input class=" col-md-10 form-control " type="text" name="lastnameref2" id="lastnameref2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="relationshipref2" class="col-sm-2 control-label">Relationship</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="relationshipref2" id="relationshipref2" />
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-md-offset-2 ">
                    <div class="form-group">
                        <label for="phoneref2" class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-10">
                            <input class=" col-sm-10 form-control " type="text" name="phoneref2" id="phoneref2" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="emergencycontact" class="control-label lead">Emergency Contact Details</label>
            </div>
            <div class="form-group">
                <label for="emfirstname" class="col-sm-2 control-label">First Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="emfirstname" id="emfirstname" />
                </div>
            </div>
            <div class="form-group">
                <label for="emlastname" class="col-sm-2 control-label">Last Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="emlastname" id="emlastname" />
                </div>
            </div>
            <div class="form-group">
                <label for="emrelationship" class="col-sm-2 control-label">Relationship</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="emrelationship" id="emrelationship" />
                </div>
            </div>
            <div class="form-group">
                <div class="form-inline">
                    <label for="emmobile" class="col-md-2 control-label">Phone (Mobile)</label>
                    <input type="text" class="form-control" id="emmobile" name="emmobile" />

                    <label for="emphonehome" class="control-label">Phone (Home)</label>
                    <input type="text" class="form-control" id="emphonehome" name="emphonehome" />

                
                </div>
            </div>
            <div class="form-group">
                <p>
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </p>
                <label for="prevtenancies" class="col-sm-2 control-label">Have any of your previous tenancies been terminated?</label>
                <div class="col-sm-10">
                    <label class="control-label radio-inline">
                        <input type="radio" name="patf1" id="patf1" />YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="patf1" id="patf2" />NO
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="indebt" class="col-sm-2 control-label">Are you in dept to another Agent / Landlord?</label>
                <div class="col-sm-10">
                    <label class="control-label radio-inline">
                        <input type="radio" name="patf3" id="patf3" />YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="patf3" id="patf4" />NO
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="paymentproblems" class="col-sm-2 control-label">Are there any existing reasons that may effect your rent payments?</label>
                <div class="col-sm-10">
                    <label class="control-label radio-inline">
                        <input type="radio" name="patf5" id="patf5" />YES
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="patf5" id="patf6" />NO
                    </label>
                </div>
            </div>
            <p>
                &nbsp;
                &nbsp;
                &nbsp;
            </p>
            <hr>
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
                    <div class="form-group">
                        <input type="file" class="form-control" name="poi" id="poi" />
                    </div>
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
                            <input type="file" class="form-control" name="poi" id="poi" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bankstatement" class="col-sm-5 control-label">Current bank statements (must have sufficient funds to meet rental payments)</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="poib2" id="poib2" />
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
                <p>( You must provide atleast 40 points of the following documentation. )</p>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <p>40 points</p>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <label for="rentalloger" class="col-sm-5 control-label">Current Rental Loger(From Agent)</label>
                        <div class="col-sm-7">
                            <input type="file" class="form-control" name="poib4" id="poib4" />
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
                            <input type="file" class="form-control" name="poib5" id="poib5" />
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
                            <input type="file" class="form-control" name="poib7" id="poib7" />
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
                            <input type="file" class="form-control" name="poib9" id="poib9" />
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
                            <input type="file" class="form-control" name="poib10" id="poib10" />
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
                            <input type="file" class="form-control" name="poib11" id="poib11" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                    <div>
                      <button type="submit" class="btn btn-warning">Submit</button>
                      <button type="reset" class="btn btn-default">Reset</button> 
                    </div>
                  </div>
        </form>   
            
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