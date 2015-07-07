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
    <title>Add Property</title>

    

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
                <strong>Success!</strong><?php echo ' New Property Added' ; ?> 
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
                <strong>Error!</strong><?php echo ' Failed to add record' ; ?> 
              </div>

            <?php
            }
           ?>


          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Add Property</h3>
            </div>
            <div class="panel-body">
              
              <form action="formaction/addproperty_action.php" method="POST" enctype="multipart/form-data">

                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Property Type</label>
                        <div>
                          <select name="propertytype" class="form-control">
                          <?php 
                            $sql= "SELECT * FROM propertytype";
                            $result = $conn->query($sql);
                            while($row = $result->fetch_assoc()) {
                              echo "<option value='". $row['propertytypename'] ."'>". $row['propertytypename'] ."</option>";
                            } ?>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group">
                    <label class="">Address No</label>
                    <div class="">
                      <input required type="text" class="form-control" id="houseno" name="houseno" placeholder="Address No">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                    <label class="">Street 1</label>
                    <div>
                      <input required type="text" class="form-control" id="addstreet1" name="addstreet1"   placeholder="Street 1">
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group">
                    <label>Street 2</label>
                    <div>
                      <input required type="text" class="form-control" id="addstreet2" name="addstreet2" placeholder="Street 2">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                    <label >Suburb</label>
                    <div>
                      <input required type="text" class="form-control" id="addsuburb" name="addsuburb"   placeholder="Suburb">
                    </div>
                  </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group">
                    <label>State</label>
                    <div>
                      <input required type="text" class="form-control" id="addstate" name="addstate"   placeholder="State">
                    </div>
                  </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label>Post Code</label>
                      <div>
                        <input required type="number" class="form-control" id="addpostcode" name="addpostcode"   placeholder="Post Code">
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Owner Fee</label>
                      <div>
                        <input required type="number" class="form-control" id="ownerfee" placeholder="Owner Fee" name="ownerfee" >
                      </div>
                    </div> 
                  </div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Rent</label>
                      <div>
                        <input required type="number" class="form-control" id="rent" placeholder="Rent per week" name="rent" >
                      </div>
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Bond</label>
                      <div>
                        <input required type="number" class="form-control" id="bond" placeholder="Bond" name="bond" >
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Bond Period</label>
                      <div>
                        <input required type="number" class="form-control" id="bondperiod" placeholder="Bond Period in months" name="bondperiod" >
                      </div>
                    </div>  
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Down Payment</label>
                      <div>
                        <input required type="number" class="form-control" id="downpayment" placeholder="Down Payment" name="downpayment" >
                      </div>
                    </div> 
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Inspection Type</label>
                        <div>
                          <select name="inspectiontype" class="form-control">
                            <option value="0">By Appoinment</option>
                            <option value="1">Open</option>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Smoking Allowed</label>
                      <div>
                        <label class="radio-inline">
                          <input required type="radio" name="smokingallowed" id="smokingallowed" value="0"> No
                        </label>
                        <label class="radio-inline">
                          <input  type="radio" name="smokingallowed" id="smokingallowed" value="1"> Yes
                        </label>
                      </div>
                    </div> 
                  </div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Pet Allowed</label>
                      <div>
                        <label class="radio-inline">
                          <input required type="radio" name="petsallowed" id="petsallowed" value="0"> No
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="petsallowed" id="petsallowed" value="1"> Yes
                        </label>
                      </div>
                    </div> 
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Furniture Statis</label>
                        <div>
                          <select name="furnishedstatus" class="form-control">
                            <option value="Full Furnished">Full Furnished</option>
                            <option value="Partially Furnished">Partially Furnished</option>
                            <option value="Not Furnished">Not Furnished</option>
                          </select>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Suitable For</label>
                        <div>
                          <select name="suitablefor" class="form-control">
                            <option value="Single">Single</option>
                            <option value="Couple">Couple</option>
                            <option value="Student">Student</option>
                            <option value="Family">Family</option>
                            <option value="Other">Other</option>
                          </select>
                        </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="form-group"> 
                      <label>Interior Features</label>
                      <div>
                      <?php
                        $sql="SELECT * FROM features WHERE featuretype = 'Interior'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<label class='checkbox-inline'>". PHP_EOL;
                            echo "<input type='checkbox' id='interiorfeatures' name='interiorfeatures[]' value='".$row['featureid'] ."'>". $row['featurename'] ." ". PHP_EOL;
                            echo "</label>". PHP_EOL;
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="form-group"> 
                      <label>Exterior Features</label>
                      <div>
                      <?php
                        $sql="SELECT * FROM features WHERE featuretype = 'Exterior'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<label class='checkbox-inline'>". PHP_EOL;
                            echo "<input type='checkbox' id='exteriorfeatures' name='exteriorfeatures[]' value='".$row['featureid'] ."'>". $row['featurename'] ." ". PHP_EOL;
                            echo "</label>". PHP_EOL;
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-10">
                    <div class="form-group"> 
                      <label>Other Features</label>
                      <div>
                      <?php
                        $sql="SELECT * FROM features WHERE featuretype = 'Other'";
                        $result = mysqli_query($conn, $sql);
                        while($row = mysqli_fetch_array($result)){
                            echo "<label class='checkbox-inline'>". PHP_EOL;
                            echo "<input type='checkbox' id='otherfeatures' name='otherfeatures[]' value='".$row['featureid'] ."'>". $row['featurename'] ." ". PHP_EOL;
                            echo "</label>". PHP_EOL;
                          }
                      ?>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Status</label>
                      <div>
                        <label class="radio-inline">
                          <input required type="radio" name="status" id="status" value="1"> Active
                        </label>
                        <label class="radio-inline">
                          <input type="radio" name="status" id="status" value="0"> In-Active
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group">
                      <label for="exampleInputFile">Image</label>
                      <input type="file" name="images[]" id="images" accept="image/*" multiple>
                      <p class="help-block">Property Images.</p>
                    </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <div class="form-group"> 
                      <label>Comments</label>
                      <div>
                        <textarea type="text" class="form-control" id="comments" placeholder="Comments" name="comments" ></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    <!-- Submit Button -->
                  <div class="form-group">
                    <div>
                      <button type="submit" class="btn btn-warning">Add</button>
                      <button type="reset" class="btn btn-default">Reset</button> 
                    </div>
                  </div>
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-1"></div>
                  <div class="col-md-5">
                    
                  </div>
                  <div class="col-md-5">
                    
                  </div>
                </div>


              </form>
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