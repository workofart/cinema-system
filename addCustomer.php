<div class="page-header">
  <h3>Add/Change Customer Info</h3>
</div>
<form action="" method="post">
  <div class="alert alert-warning" role="alert">
    To change a Customer's info, only enter the <span class="label label-success">Customer ID</span> (refer to customer list table above for ID) and tick the box below
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last Name">
  </div>
  <div class="form-group">
    <label>Customer ID</label>
    <input type="text" class="form-control" name="custID" placeholder="Customer ID">
  </div>
  <div class="form-group">
    <label>Sex</label>
    <input type="text" class="form-control" name="sex" placeholder="Sex">
  </div>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label>Change existing Customer?</label>
    <input type="checkbox" name="trigger" placeholder="">
  </div>
  <div class="form-group">
    <input type = "submit" class="btn btn-primary" name = "submit" value = "Add/Modify">
  </div>
</form>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$custID = $_POST['custID'];
$sex = $_POST['sex'];
$email = $_POST['email'];
if ($fname != "" or $lname != "" or $custID != "" or $sex != "" or $email != "") {
  if (!isset($_POST['trigger'])){
    $insert = "insert into Customer values('$custID', '$fname', '$lname', '$sex', '$email')";
      $result = mysqli_query($connection, $insert);
      if (!$result){
        echo "Customer insertion failed" . $sql . "<br>" . mysqli_error($connection);
      }
      else
        echo "<br><div class='alert alert-success' role='alert'>Insert successful." . "<br>Customer First Name: " . $fname . "<br>Customer Last Name: " . $lname . "<br>Customer ID: " . $custID ."<br>Sex: " . $sex . "<br>Email: " . $email ."</div><br>";
    }
    else {
      $update = "update Customer set fname = '$fname', lname = '$lname', sex = '$sex', email = '$email' where custID = '$custID'";
      $result = mysqli_query($connection, $update);
      if (!$result){
        echo "Customer info update failed";
      }
      else
        echo "<br><div class='alert alert-success' role='alert'>Update successful." . "<br>Customer First Name: " . $fname . "<br>Customer Last Name: " . $lname . "<br>Customer ID: " . $custID ."<br>Sex: " . $sex . "<br>Email: " . $email ."</div><br>";
    }
  }
  ?>