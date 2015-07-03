<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Home</title>

    

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
<div class="container" style="margin-top:10%">
    <div class="">
      <div class="col-sm-6 col-md-4 col-md-offset-4">

        <?php
        //checks of login status
        if(isset($_GET["loginFailed"])) 
          //if it is false display error
          if($_GET["loginFailed"] == 'true') {
        ?>
         
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Error!</strong><?php echo ' Incorrect Username / Password. Please try again.' ; ?> 
        </div>
        <?php
         }
        ?> 
        <div class="panel panel-default">
          <div class="panel-heading">
            <center><strong>USER LOGIN</strong></center>
          </div>
          <div class="panel-body">
          
            <form role="form" method="post" action="checklogin.php">
              <fieldset>
              <div class="row">
                  <div class="center-block">
                    <img class="profile-img"
                      src="img/sym.jpg" alt="">
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-user"></i>
                        </span> 
                        <input class="form-control" placeholder="Username" id="username" name="username" type="text" autofocus>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon">
                          <i class="glyphicon glyphicon-lock"></i>
                        </span>
                        <input class="form-control" placeholder="Password" id="password" name="password" type="password" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-lg btn-primary btn-block" value="Sign in">
                    </div>
                    <div class="form-group">
                      <a href="#" onClick="">Forget Password or Username</a>

                    </div>
                  </div>

                </div>
                
              </fieldset>
            </form>

          </div>
          <div class="panel-footer ">
            <a href="signup.php" onClick=""> Create an Account! </a>
          </div>
                </div>
      </div>
    </div>
  </div>


</body>
</html>