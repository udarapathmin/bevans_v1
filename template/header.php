<?php

  include "template/config.php";
?>
<div style="background-color:#333;">
      <img style="margin-left:10%" src="img/logo.jpg"></div>
    </div>

  <!-- Fixed navbar -->
    <div class="navbar navbar-inverse " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- <a class="navbar-brand" href="#">Bevans</a> -->
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href='<?php echo $baseurl ?>'><i class="fa fa-home"></i> Home</a></li>
            <li ><a href="#"><i class="fa fa-building"></i> Rent</a></li>
            <li ><a href="#"><i class="fa fa-university"></i> Resources</a></li>
            <li ><a href="#"><i class="fa fa-comments"></i> Blog</a></li>
            <li ><a href="#"><i class="fa fa-bullhorn"></i> About Us</a></li>
            <li ><a href="#"><i class="fa fa-envelope"></i> Contact Us</a></li>
          </ul>
      <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>
              <?php 
                if(isset($_SESSION["firstname"])){ 

                  $usertype = $_SESSION['user_type'];
                  if($usertype == 'A')
                    $profilelink = "admin.php";
                  if($usertype == 'C')
                    $profilelink = "customer.php";
                  if($usertype == 'K')
                    $profilelink = "agent.php";
                  echo " ". $_SESSION["firstname"];
                  echo "<b class='caret'></b></a><ul class='dropdown-menu'>";
                  echo "<li><a href='$profilelink'>Profile</a></li>"; 
                  echo "<li><a href='logout.php'>Log-out</a></li>"; 
                }
                else {
                  echo "User";
                  echo "<b class='caret'></b></a><ul class='dropdown-menu'>";
                  echo "<li><a href='login.php'>Login</a></li>"; 
                  echo "<li><a href='signup.php'>Sign-up</a></li>"; 
                } 
              ?>
<!--               <b class="caret"></b>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#">Profile</a></li>
                <li><a href="logout.php">Log-out</a></li> -->
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>