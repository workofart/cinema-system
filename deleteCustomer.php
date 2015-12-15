<div class="page-header">
  <h3>Delete Customer Info</h3>
</div>
<form action="" method="post">
  <div class="alert alert-warning" role="alert">
    Enter <span class="label label-success">Customer ID</span> (refer to the Customer list above) to delete a Customer. <br>Note that all related information (purchase records, ratings will also be deleted).
  </div>
  <div class="form-group">
    <label>Customer ID</label>
    <input type="text" class="form-control" name="custID2" placeholder="Customer ID">
  </div>
  <div class="form-group">
    <input type = "submit" class="btn btn-primary" name = "submit" value = "Delete">
  </div>
</form>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';
$custID2 = $_POST['custID2'];

if ($custID2 != "") {
  // check if customer exists
  $check = "select count(*) from Customer where custID = '$custID2'";
  $result = mysqli_query($connection, $check);
  if (!$result){
    echo "<br><div class='alert alert-danger' role='alert'>Customer check failed</div><br>";
  }
  $rowCheck = mysqli_fetch_assoc($result);
  if ($rowCheck["count(*)"] > 0){
    // customer exists
    $delete = "delete from Customer where custID = '$custID2'";
    $result = mysqli_query($connection, $delete);
    if (!$result){
      echo "<br><div class='alert alert-danger' role='alert'>Customer table deletion failed</div><br>";
    }
    else
      echo "<br><div class='alert alert-success' role='alert'>Customer table deletion successful.</div><br>";

      // Delete from customerPurchase table
    $delete = "delete from CustomerPurchase where custID = '$custID2'";
    $result = mysqli_query($connection, $delete);
    if (!$result){
      echo "<br><div class='alert alert-danger' role='alert'>customerPurchase table deletion failed</div><br>";
    }
    else
      echo "<br><div class='alert alert-success' role='alert'>customerPurchase table deletion successful.</div><br>";

        // Delete from customerRating table
    $delete = "delete from CustomerRating where custID = '$custID2'";
    $result = mysqli_query($connection, $delete);
    if (!$result){
      echo "<br><div class='alert alert-danger' role='alert'>customerRating table deletion failed</div><br>";
    }
    else
      echo "<br><div class='alert alert-success' role='alert'>customerRating table deletion successful.</div><br>";
  }
  else
    echo "<div class='alert alert-danger' role='alert'>The customer doesn't exist, please try again</div>";
}
?>