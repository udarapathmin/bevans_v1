<?php 

  include "database.php";
  
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
    <title>Add Administrator</title>

    

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

        <div class="row">
          <div class="col-md-12">
            <h3><strong>Add Administrator</strong></h3><hr>
            <?php
            $display = false;

              if(isset($_GET["password"])) {
                  //if it is false display error
                  $message = ' Passwords didnt match. Please try again.';
                  $display = true;
                }

                if(isset($_GET["username"])) {
                   $message = ' Username is already taken. Please try again.';
                   $display = true;
                }
              ?>
               
               <?php 
                 if($display == true){
               ?>
              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo $message ; ?> 
              </div>
              <?php
               }
          ?>
           <!-- Add Success Message -->
           <?php
            if(isset($_GET["add"]) && $_GET["add"] == 'true' ) {
              //if it is false display error
              $message = ' Administrator added.'; ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo $message ; ?> 
              </div>

            <?php
            }
           ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form class="form-horizontal" action="formaction/addadmin_action.php" method="POST">
              <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" id="username" name="username"  placeholder="Username" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input required type="password" class="form-control" id="password" name="password"  placeholder="Password" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input required type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input required type="email" class="form-control" id="email" name="email"  placeholder="Email" >
                    </div>
                  </div>
                  <hr>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                      <input required type="text" class="form-control" id="firstname" name="firstname"   placeholder="First Name" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="lastname" name="lastname"   placeholder="Last Name">
                    </div>
                  </div>
                  <hr>

                  <!-- Submit Button -->
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-warning">Add</button>
                      <button type="reset" class="btn btn-default">Reset</button> 
                    </div>
                  </div>

              </div>
            </div>

            </form>
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