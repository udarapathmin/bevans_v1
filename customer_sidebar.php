
<?php include "template/config.php"; ?>

<?php

include "database.php";
$un = $_SESSION['username'];
//Validate for correct tenant
  $s="SELECT * FROM customer WHERE username='$un'";
  $re = mysqli_query($conn, $s);
  while($r = mysqli_fetch_array($re)){
      $tenant = $r['istenant'];
  }

  if($tenant == '1'){


?>


<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-building-o"></i> Property Management
        </a>
      </h4>
    </div>
    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
        <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "listtenantproperty.php" ?>'>My Property</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . ".php" ?>'>Notices</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . ".php" ?>'>Schedules</a></li>
        </ul>
      </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-user"></i> Profile Management
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
        <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "viewcustomerprofile.php" ?>'>View Profile</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "editcustomerprofile.php" ?>'>Edit Profile</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "dissablecustomer.php" ?>'>Dissable Account</a></li>
        </ul>
      </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa fa-search"></i> Search
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "advancesearch.php" ?>'>Advance Search</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . ".php" ?>'>Search</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "savedsearch.php" ?>'>Saved Search</a></li>
        </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <i class="fa fa-external-link"></i> Requests
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
       <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "addadmin.php" ?>'>Request Alerts</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "submitedtenants.php" ?>'>Tenant Requests</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "askedmorereply.php" ?>'>Requested More Details</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "scheduleds.php" ?>'>Scheduled Inspections</a></li>
        </ul>
    </div>
  </div>
</div>

<?php } else { ?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          <i class="fa fa-user"></i> Profile Management
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="collapseListGroupHeading1" aria-expanded="true">
        <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "viewcustomerprofile.php" ?>'>View Profile</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "editcustomerprofile.php" ?>'>Edit Profile</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "dissablecustomer.php" ?>'>Dissable Account</a></li>
        </ul>
      </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          <i class="fa fa-search"></i> Search
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
        <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "advancesearch.php" ?>'>Advance Search</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . ".php" ?>'>Search</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "savedsearch.php" ?>'>Saved Search</a></li>
        </ul>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <i class="fa fa-external-link"></i> Requests
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
       <ul class="list-group">
          <li class="list-group-item"><a href='<?php echo $baseurl . "addadmin.php" ?>'>Request Alerts</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "submitedtenants.php" ?>'>Tenant Requests</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "askedmorereply.php" ?>'>Requested More Details</a></li>
          <li class="list-group-item"><a href='<?php echo $baseurl . "scheduleds.php" ?>'>Scheduled Inspections</a></li>
        </ul>
    </div>
  </div>
</div>
<?php } ?>

