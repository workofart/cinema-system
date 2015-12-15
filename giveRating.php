<div class="page-header">
  <h3>Give Ratings</h3>
</div>
<form id="form1" action="" method="post" >
  <div class="form-group">
    <label>Customer ID</label><input class="form-control" type="text" name="custID2">
  </div>
  <div class="form-group">
    <label>Showing ID</label><input class="form-control" type="text" name="showingID2">
  </div>
  <div class="form-group">
    <label>Rating (1-5)</label> <input class="form-control" type="text" name="rating2">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Add">
  </div>
</form>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';
//  Variables corresponding to table attributes
$custID2 = $_POST['custID2'];
$showingID2 = $_POST['showingID2'];
$rating2 = $_POST['rating2'];
if ($custID2 != "" || $showingID2 != "" || $rating2 != ""){
// run query to check if room number exists
$check = "select count(*) as count from CustomerPurchase where custID = '$custID2' and showingID = '$showingID2'";
$result = mysqli_query($connection, $check);
if (!$result){
echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
}
$row = mysqli_fetch_assoc($result);
// check if showing exists
if ($row["count"] > 0){
// the showing is confirmed, check for invalid rating2
if (!($rating2 >= 1 && $rating2 <= 5)){
echo "<div class='alert alert-danger' role='alert'>Please enter a valid rating (1-5 only)</div>";
}
// valid rating2
else{
$rate = "insert into CustomerRating values ('$showingID2', '$custID2', '$rating2')";
$result = mysqli_query($connection, $rate);
if (!$result){
echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
}
echo "<br><div class='alert alert-success' role='alert'>Rating added successfully" . "<br>Customer ID: " . $custID2 . "<br>Showing ID: " . $showingID2 . "<br>Rating: " . $rating2 . "</div><br>";
}
}
// showing doesn't exist for the given customer
else {
echo "<div class='alert alert-danger' role='alert'>The customer hasn't watched the showing yet, please try again after watching the showing</div>";
}
}

// mysqli_close($connection);
?>