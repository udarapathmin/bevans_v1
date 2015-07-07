<?php 

  include "database.php";
  
  if (!isset($_SESSION['username']))
  {
      header("location:login.php");
  }
  //check for Admin login
  if($_SESSION['user_type'] != 'K' ){
    header("location:index.php");
  }

    $aid = $_SESSION['username'];
  
    $sql="SELECT * FROM agent WHERE username = '$aid'";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
      $aid = $row['agentid'];
    }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Schedule Inspection Requests</title>

    

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
          <div class="panel panel-default">
            <div class="panel-heading">House Inspection Schedule Inquiries</div>
            <div class="panel-body">
                <table id="example" class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Customer</th>
                            <th>Property ID</th>
                            <th>Primary Time</th>
                            <th>Agent Reply</th>
                            <th>Time</th>
                            <th>View</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sql="SELECT c.firstname, cs.propertyid, cs.timeslot1,cs.timestamp,cs.agentreply FROM customer_scheduleinspection cs, customer c WHERE agentid='$aid' AND c.customerid=cs.customerid ORDER BY timestamp desc";
                        $result = mysqli_query($conn, $sql);
                        $no = 1;
                        while($row = mysqli_fetch_array($result)){

                            echo "<tr>" . PHP_EOL;
                            echo "<th scope='row'>".$no."</th>" . PHP_EOL;
                            echo "<td>".$row['firstname']."</td>" . PHP_EOL;
                            echo "<td>".$row['propertyid']."</td>" . PHP_EOL;
                            echo "<td>".$row['timeslot1']."</td>" . PHP_EOL;
                            // echo "<td>".."</td>" . PHP_EOL;
                            if($row['agentreply'] == '0'){ 
                              echo "<td><span class='label label-primary'>Waitng</span></td>". PHP_EOL;
                            } else if($row['agentreply'] == '1'){
                              echo "<td><span class='label label-success'>Approved</span></td>". PHP_EOL;
                            } else{
                              echo "<td><span class='label label-danger'>Rejected</span></td>". PHP_EOL;
                            }
                            echo "<td>".$row['timestamp']."</td>" . PHP_EOL;
                            echo "<td>" . PHP_EOL; ?>
                            <a href='<?php echo $baseurl . 'scheduleinspection.php?id='. $row['propertyid']. '&agid='.$aid ?>' class='btn btn-primary btn-xs'><i class="fa fa-eye"></i></a>
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