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
    <title>View Admin Profile</title>

    

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

          <!-- Delete Fail Message -->
           <?php
            if(isset($_GET["delete"]) && $_GET["delete"] == 'false' ) {
              //if it is false display error ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to delete the record' ; ?> 
              </div>

            <?php
            }
           ?>


            <div class="panel panel-info">
            <?php 

              while($row = $result->fetch_assoc()) {

                $_SESSION['deleteadminid'] = $row["id"];
              ?>
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $row["first_name"] . ' ' . $row["last_name"] ; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="http://icons.iconarchive.com/icons/dryicons/simplistica/128/user-icon.png" class="img-circle"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>ID:</td>
                        <td><?php echo $row["id"]; ?></td>
                      </tr>
                      <tr>
                        <td>Username:</td>
                        <td><?php echo $row["username"]; ?></td>
                      </tr>
                      <tr>
                        <td>First Name</td>
                        <td><?php echo $row["first_name"]; ?></td>
                      </tr>
                        <tr>
                        <td>Last Name</td>
                        <td><?php echo $row["last_name"]; ?></td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:info@support.com"><?php echo $row["email"]; ?></a></td>
                      </tr>

                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="fa fa-envelope"></i></a>
                        <span class="pull-right">
                            <a href='<?php echo $baseurl . 'editadmin.php?id='. $row['id']; ?>' data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="fa fa-pencil-square-o"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger" href="formaction/deleteadmin_action.php" onclick="return confirm('Are you sure you want to permenantly delete this user?   you cannot recover this profile after you delete');"><i class="fa fa-trash"></i></a>
                        </span>
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