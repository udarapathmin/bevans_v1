<?php 

  include "database.php";

      //user id
    $uid = $_GET["id"];

    // Search for User
    $sql= "SELECT * FROM users WHERE id='$uid' AND  user_type = 'A'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("location:admin.php");
    }

  if(!isset($_GET["id"])) {
    header("location:admin.php");
  }


  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'A'){
    header("location:index.php");
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Edit Administrator Details</title>

    

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
        <?php include "admin_sidebar.php"; ?>
      </div>
      <div class="col-md-9">
      <!-- Messages -->
      <!-- Password fail -->
          <?php
            if(isset($_GET["password"]) && $_GET["password"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Password didnt match.' ; ?> 
              </div>

            <?php
            }
           ?>


      <!-- Success Edit Message -->
          <?php
            if(isset($_GET["edit"]) && $_GET["edit"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Updated Admin record' ; ?> 
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
                <strong>Error!</strong><?php echo ' Failed to record' ; ?> 
              </div>

            <?php
            }
           ?>


      <?php 

              while($row = $result->fetch_assoc()) {

              ?>

        <div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
            <form style="margin-top:20px;" class="form-horizontal" action="formaction/editadmindetails_action.php" method="POST">
              <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">ID</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control" id="id" name="id" value='<?php echo $row["id"]; ?>'  placeholder="ID" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input  type="text" class="form-control" id="username" name="username" value='<?php echo $row["username"]; ?>'  placeholder="Username" >
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
                      <input type="text" class="form-control" id="firstname" value='<?php echo $row["first_name"]; ?>' name="firstname"   placeholder="First Name" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lastname" value='<?php echo $row["last_name"]; ?>' name="lastname"   placeholder="Last Name">
                    </div>
                  </div>
                  <hr>

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
        <form style="margin-top:20px;" class="form-horizontal" action="formaction/editadminpass_action.php" method="POST">
          <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-6">
              <div class="form-group">
                    <div class="col-sm-10">
                      <input  type="hidden" class="form-control" id="id" name="id" value='<?php echo $row["id"]; ?>'  placeholder="ID" >
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

      <!-- End of middle column -->
    </div>
      

      <!-- End of container -->
    </div>
</div>
    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>