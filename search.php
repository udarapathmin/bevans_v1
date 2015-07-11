<?php 

  include "database.php";

if(isset($_GET['search']))
  $string = $_GET['search'];
  



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Search for <?php echo "$string"; ?></title>

    

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

    <!-- DataTables Plugin -->
    <script src="js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.css">
        
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/1.10.7/integration/bootstrap/3/dataTables.bootstrap.js"></script>


  </head>

<body>
    <?php include "template/header.php"; ?>

    
    <!-- Begin page content -->
    <div class="container">
    <div class="row">
      <div class="col-md-5">
          <form>
                <div class="form-group">
                <label for="exampleInputEmail1">Search</label>
                    <input class="form-control" name="search" placeholder="State, Suburb, Postcode, Street" name="search" type="text">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">

                  <?php
                        $sql="SELECT * FROM realestateproperty WHERE ( state LIKE '%$string%' OR  suburb LIKE '%$string%' OR  postcode LIKE '%$string%' OR  street2 LIKE '%$string%' ) AND status = '1' AND agentid !=''";
                        $result = mysqli_query($conn, $sql);
                        if ($result->num_rows > 0) {
                        while($row = mysqli_fetch_array($result)){

                          $pid = $row['propertyid'];
                          $sql= "SELECT * FROM property_image WHERE propertyid='$pid' LIMIT 1";
                          $imgs = $conn->query($sql);
                          while($ele = $imgs->fetch_assoc()) {
                            $imgid = $ele['id'];
                          }


                  ?>
                    <!-- Begin Listing: 609 W GRAVERS LN--> 
                    <div class="brdr bgc-fff pad-10 box-shad btm-mrg-20 property-listing">
                        <div class="media">
                            <a class="pull-left" href="<?php echo $baseurl. 'viewproperty.php?id='.$pid; ?>" target="_parent">
                            <img alt="image" style="width:350px; height:350pxpx;" class="img-responsive"
                            src="<?php echo $baseurl ."image.php?id=".$imgid; ?>"></a>

                            <div class="clearfix visible-sm"></div>

                            <div class="media-body fnt-smaller">
                                <a href="#" target="_parent"></a>

                                <h4 class="media-heading">
                                  <a href="<?php echo $baseurl. 'viewproperty.php?id='.$pid; ?>" target="_parent">For Rent $<?php echo $row['rent']; ?> <small class="pull-right">
                                    <?php echo $row['houseno'].", ".$row['street1'].", ".$row['street2'].", ".$row['suburb'].", ".$row['state'].", ".$row['postcode']; ?>
                                  </small></a></h4>


                                <ul class="list-inline mrg-0 btm-mrg-10 clr-535353">
                                    <li><?php echo $row['suitablefor']; ?></li>

                                    <li style="list-style: none">|</li>

                                    <li><?php echo $row['propertytype']; ?></li>

                                    <li style="list-style: none">|</li>

                                    <li>Bond - $<?php echo $row['bond']; ?></li>
                                </ul>

                                <p class="hidden-xs"><?php echo $row['comments']; ?></p>
                            </div>
                        </div>
                    </div><!-- End Listing-->

                    <?php } } else {
                        echo "<h2>No Results Found</h2>";
                      } ?>


     
      </div>
    </div>
      

      <!-- End of container -->
    </div>

    <!-- footer -->
    <?php include "template/footer.php"; ?>
</body>
</html>