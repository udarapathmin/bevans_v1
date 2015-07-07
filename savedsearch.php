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

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Saved Search</title>

    

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
            if(isset($_GET["delete"]) && $_GET["delete"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Property Deleted from Saved Search' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["delete"]) && $_GET["delete"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to remove' ; ?> 
              </div>

            <?php
            }
           ?>


          <div class="panel panel-default">
            <div class="panel-heading">Saved Property</div>
            <div class="panel-body">
              <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Sreet 1</th>
                            <th>Sreet 2</th>
                            <th>Suburb</th>
                            <th>State</th>
                            <th>Postcode</th>
                            <th>Rent</th>
                            <th>Suitable</th>
                            <th>View</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                          $cid = $_SESSION['username'];
                          $sql="SELECT * FROM customer WHERE username = '$cid'";
                            $result = mysqli_query($conn, $sql);
                            while($row = mysqli_fetch_array($result)){
                              $cid = $row['customerid'];
                            }


                        $sql="SELECT * FROM realestateproperty rs, customer_save cs WHERE cs.propertyid=rs.propertyid AND cs.customerid =  '$cid'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>" . PHP_EOL;
                            echo "<td>".$row['propertytype']."</td>" . PHP_EOL;
                            echo "<td>".$row['street1']."</td>" . PHP_EOL;
                            echo "<td>".$row['street2']."</td>" . PHP_EOL;
                            echo "<td>".$row['suburb']."</td>" . PHP_EOL;
                            echo "<td>".$row['state']."</td>" . PHP_EOL;
                            echo "<td>".$row['postcode']."</td>" . PHP_EOL;
                            echo "<td>".$row['rent']."</td>" . PHP_EOL;
                            echo "<td>".$row['suitablefor']."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                            <a href='<?php echo $baseurl . 'viewproperty.php?id='. $row['propertyid']; ?>' class='btn btn-primary btn-xs'><i class="fa fa-eye"></i></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                             echo "<td>" . PHP_EOL; ?>
                            <a href='<?php echo $baseurl . 'formaction/remove_search_action.php?id='. $row['propertyid']; ?>' class='btn btn-primary btn-xs'><i class="fa fa-trash"></i></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                            echo "</tr>" . PHP_EOL;
                        }

                        ?>



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