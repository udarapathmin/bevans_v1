<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'K'){
    header("location:index.php");
  }
  
  $un = $_SESSION['username'];
  //Selecting Agent ID

    $sql="SELECT * FROM agent WHERE username = '$un'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $agid = $row['agentid'];
    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Customer Requests</title>

    

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
        <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
        
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>

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
            if(isset($_GET["message"]) && $_GET["message"] == 'true' ) {
              //if it is false display error
               ?>

              <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Success!</strong><?php echo ' Message Sent to Customer' ; ?> 
              </div>

            <?php
            }
           ?>
           <!-- Fail Edit Message -->
          <?php
            if(isset($_GET["message"]) && $_GET["message"] == 'false' ) {
              //if it is false display error
               ?>

              <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>Error!</strong><?php echo ' Failed to send message' ; ?> 
              </div>

            <?php
            }
           ?>
        <div class="panel panel-default">
          <div class="panel-heading">Customer Requests</div>
          <div class="panel-body">
            <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable();
                    } );
                </script>
                <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Property ID</th>
                            <th>Customer</th>
                            <th>Subject</th>
                            <th>Timestamp</th>
                            <th>Status</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql= "SELECT cs.id,c.firstname, cs.propertyid, cs.subject, cs.timestamp, cs.status FROM customer_askmore cs, customer c WHERE agentid ='$agid' 
                              AND c.customerid = cs.cutomerid ORDER BY cs.timestamp desc";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$no."</th>" . PHP_EOL;
                            echo "<td>".$row['propertyid']."</td>" . PHP_EOL;
                            echo "<td>".$row['firstname']."</td>" . PHP_EOL;
                            echo "<td>".$row['subject']."</td>" . PHP_EOL;
                            echo "<td>".$row['timestamp']."</td>" . PHP_EOL;
                            if($row['status'] == '0'){
                              echo "<td><span class='label label-primary'>Pending</span></td>" . PHP_EOL;
                            } else {
                              echo "<td><span class='label label-success'>Replied</span></td>" . PHP_EOL;
                            }
                            echo "<td>" . PHP_EOL; ?>
                            <a href='<?php echo $baseurl . 'askmore.php?id='. $row['propertyid'].'&mid='.$row['id']; ?>' class='btn btn-primary btn-xs'><i class="fa fa-eye"></i></a>
                        <?php
                            echo "</td>" . PHP_EOL;
                            echo "</tr>" . PHP_EOL;
                            $no++;
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