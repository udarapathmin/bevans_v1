<?php 

  include "database.php";

  $un = $_SESSION['username'];
 
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'C'){
    header("location:index.php");
  }

    // Search for User
    $sql= "SELECT * FROM customer WHERE username='$un'";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
      header("location:customer.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dissable Customer Profile</title>

    

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
                while($row = $result->fetch_assoc()) {
                // $_SESSION['deleteadminid'] = $row["id"];
              ?>


          <?php
            if( $row["iscomplete"] == '0') {
              //if it is display message to complete profile ?>

              <div class="alert alert-info alert-dismissible" role="alert">
                <strong>Notice!</strong>Your Profile is incomplete. Please complete your profile by editing <strong><a href='<?php echo $baseurl . "editcustomerprofile.php" ?>'>here</a></strong>.
              </div>

            <?php
            }
           ?>


          <div class="panel panel-info">
            
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row["firstname"] . ' ' . $row["lastname"] ; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://icons.iconarchive.com/icons/dryicons/simplistica/128/user-icon.png" class="img-circle">  </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $row["username"]; ?></td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td><?php echo $row["firstname"]; ?></td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><?php echo $row["lastname"]; ?></td>
                      </tr>
                      <tr>
                        <td>Gender</td>
                        <td><?php echo $row["gender"]; ?></td>
                      </tr>
                      <tr>
                        <td>Address</td>
                        <td><?php echo $row["addno"]; ?></td>
                      </tr>
                      <tr>
                        <td>Mobile Phone</td>
                        <td><?php echo $row["phonemobile"]; ?></td>
                      </tr>
                      <tr>
                        <td>Fax</td>
                        <td><?php echo $row["phonefax"]; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php echo $row["email"]; ?></a></td>
                      </tr>

                     
                    </tbody>
                  </table>
                  <a type="button" class="btn btn-danger" href="formaction/deletecutomer_action.php" onclick="return confirm('Are you sure you want to permenantly delete this user?   you cannot recover this profile after you delete');"><i class="fa fa-trash"></i> Delete Account</a>
                  
                </div>
              </div>
            </div>
            
            <?php
          
              }

            ?>  
          </div>
      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>