<?php 

  include "database.php";
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Sign -Up</title>

    

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

    <!-- header -->
    <?php include "template/header.php"; ?>

    <!-- Begin page content -->
    <div class="container">

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-11">
          <h3><strong>Registration</strong></h3><hr>
          <?php
            //checks of login status
            if(isset($_GET["password"]) || isset($_GET["username"]) || isset($_GET["telephone"])) {
              //if it is false display error
              if($_GET["password"] == 'true') {
                $message = ' Passwords didnt match. Please try again.';
              }
              if($_GET["username"] == 'true'){
                 $message = ' Username is already taken. Please try again.';
              }
              if($_GET["telephone"] == 'true'){
                 $message = ' Invalid Telephone Number. Please try again.';
              }
            ?>
             
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Error!</strong><?php echo $message ; ?> 
            </div>
            <?php
             }
        ?> 
        </div>
      </div>
          <form class="form-horizontal" action="formaction/signup_action.php" method="POST">
            <div class="row">
              <div class="col-md-1"></div>
              <div class="col-md-6">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username"  placeholder="Username" >
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
                <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email"  placeholder="Email" >
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label">First Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="firstname" name="firstname"   placeholder="First Name" >
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Other Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="othername" name="othername"   placeholder="Other Name">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Last Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="lastname" name="lastname"   placeholder="Last Name">
                  </div>
                </div>
                <hr>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" id="phone" name="phone"  placeholder="Mobile Phone" maxlength="13" size="13" >
                  </div>
                </div>
                <div class="form-group">
                <label class="col-sm-2 control-label"></label>
                <div class="col-sm-10">
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="agent" name="agent" value="true"> I am an Agent
                  </label>
                </div></div>
                </div>
                              

                <!-- Submit Button -->
                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-warning">Sign-up</button>
                    <button type="reset" class="btn btn-default">Reset</button> 
                  </div>
                </div>

            </div>
          </div>

          </form>
        
      
      </div>

      <!-- End of container -->

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>