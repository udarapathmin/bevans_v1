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
    <title>Add Features</title>

    

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

        <!-- Success Edit Message -->
          <?php
            if(isset($_GET["add"]) && $_GET["add"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' New Feature Added' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["add"]) && $_GET["add"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to add new record' ; ?> 
              </div>

            <?php
            }
           ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Add Features</h3>
        </div>
        <div class="panel-body">
          <form style="margin-top:20px;" class="form-horizontal" action="formaction/add_features_action.php" method="POST">
          <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-8">
              <div class="form-group">
                <label class="col-sm-2 control-label">Feature Type</label>
                <div class="col-sm-10">
                  <select class="form-control" id="featuretype" name="featuretype"  placeholder="Feature Type" >
                    <option value="Interior">Interior</option>
                    <option value="Exterior">Exterior</option>
                    <option value="Other">Other</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Feature Name</label>
                <div class="col-sm-10">
                  <input required  type="text" class="form-control" id="featurename" name="featurename" placeholder="Feature Name" >
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Description</label>
                <div class="col-sm-10">
                  <textarea  type="text" class="form-control" id="description" name="description" placeholder="Description" ></textarea>
                </div>
              </div>

          <!-- Submit Button -->
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-primary">Add</button>
              <button type="reset" class="btn btn-default">Reset</button> 
            </div>
          </div>
          </div>
          </div>
        </form>
        </div>
      </div>

      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Existing Features</h3>
        </div>
        <div class="panel-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Feature Type</th>
                <th>Feature Name</th>
                <th>Description</th>
              </tr>
            </thead>
            <tbody>
            <?php
              $sql= "SELECT * FROM features Order BY featuretype desc";
              $result = $conn->query($sql); 
              while($row = $result->fetch_assoc()) {
              echo "<tr>". PHP_EOL;
                echo "<th>" . $row['featureid']. "</th>". PHP_EOL;
                echo "<td>" . $row['featuretype']. "</td>". PHP_EOL;
                echo "<td>" . $row['featurename']. "</td>". PHP_EOL;
                echo "<td>" . $row['description']. "</td>". PHP_EOL;
              echo "</tr>". PHP_EOL;
               } ?>
            </tbody>
          </table>
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