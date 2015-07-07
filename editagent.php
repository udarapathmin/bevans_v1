<?php 

  include "database.php";

  $un = $_SESSION['username'];
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }

  // Search for User
    $sql= "SELECT * FROM agent WHERE username='$un'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("location:agent.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Agent Profile</title>

    

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


                  <!-- Success Edit Message -->
          <?php
            if(isset($_GET["edit"]) && $_GET["edit"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Updated Agent Profile' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["edit"]) && $_GET["edit"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to update record' ; ?> 
              </div>

            <?php
            }
           ?>

            <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["password"]) && $_GET["password"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Password didnt match' ; ?> 
              </div>

            <?php
            }
           ?>

           

              <?php 
                while($row = $result->fetch_assoc()) {
                // $_SESSION['deleteadminid'] = $row["id"];
              ?>
          
          <div class="well">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
          <li><a href="#profile" data-toggle="tab">Password</a></li>
        </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
            <form style="margin-top:20px;" class="form-horizontal" action="formaction/update_agentdetails_action.php" method="POST">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input disabled   type="text" class="form-control" id="username" name="username" value='<?php echo $row["username"]; ?>'  placeholder="Username" >
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" value='<?php echo $row["email"]; ?>' name="email"  placeholder="Email" >
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="firstname" value='<?php echo $row["firstname"]; ?>' name="firstname"   placeholder="First Name" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Other Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="othername" value='<?php echo $row["othername"]; ?>' name="othername"   placeholder="Other Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="lastname" value='<?php echo $row["lastname"]; ?>' name="lastname"   placeholder="Last Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Gender</label>
                    <div class="col-sm-10">
                      <select class="form-control" name="gender">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Date of Birth</label>
                    <div class="col-sm-10">
                      <input type="date" required class="form-control" id="dob" value='<?php echo $row["dob"]; ?>' name="dob"   placeholder="Date of Birth">
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Phone Mobile</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="phonemobile" value='<?php echo $row["phonemobile"]; ?>' name="phonemobile"   placeholder="Phone Mobile">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Phone Work</label>
                    <div class="col-sm-10">
                      <input type="text" required class="form-control" id="phonework" value='<?php echo $row["phonework"]; ?>' name="phonework"   placeholder="Phone Work">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Fax</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="phonefax" value='<?php echo $row["phonefax"]; ?>' name="phonefax"   placeholder="Fax">
                    </div>
                  </div>

                  <!-- Submit Button -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-warning">Update</button>
                      <button type="reset" class="btn btn-default">Reset</button> 
                    </div>
                  </div>

              </div>
            </div>

            </form>
      </div>
      <div class="tab-pane fade" id="profile">
        <form style="margin-top:20px;" class="form-horizontal" action="formaction/update_agentpass_action.php" method="POST">
          <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-6">
              <div class="form-group">
                    <div class="col-sm-10">
                      <input  type="hidden" class="form-control" id="id" name="id" value='<?php echo $row["username"]; ?>'  placeholder="ID" >
                    </div>
                  </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="password" name="password"  placeholder="Password" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Confirm Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" >
                </div>
              </div>

          <!-- Submit Button -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-warning">Update</button>
              <button type="reset" class="btn btn-default">Reset</button> 
            </div>
          </div>
          </div>
          </div>
        </form>

      </div>
    </div>

      </div>

    <?php
      }
    ?>
      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>