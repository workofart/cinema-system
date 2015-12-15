<style type="text/css">
  .form-group{
    max-width: 20%;
  }
</style>
<div class="page-header">
  <h3>Delete Showing</h3>
</div>
<form id="form1" action="" method="post" >
  <div class="alert alert-warning" role="alert">
    Please refer to the Showing list above for Showing ID
  </div>
  <div class="form-group">
    <label>Showing ID</label>
    <input class="form-control" type="text" name="showingID2">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Delete">
  </div>
</form>

<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$showingID2 = $_POST['showingID2'];

// run query to check if room number exists
if ($showingID2 != ""){
  $check = "select count(*) as count from Showing where showingID = '$showingID2'";
  $result = mysqli_query($connection, $check);
  if (!$result){
    echo "<div class='alert alert-danger' role='alert'>
    Query Error: " . $sql . "
    <br>" . mysqli_error($connection) . "</div>
    ";
  }
  $row = mysqli_fetch_assoc($result);
  if ($row["count"] > 0){
// the Showing exists
    $delete = "delete from Showing where showingID = '$showingID2'";
    $result = mysqli_query($connection, $delete);
    if (!$result){
      echo "<div class='alert alert-danger' role='alert'>
      Deletion Failed: " . $sql . "
      <br>" . mysqli_error($connection) . "</div>
      ";   
    }
    else {
      echo "<br><div class='alert alert-success' role='alert'>Deletion successful."
      . "<br>showingID: " . $showingID2
      . "</div><br>";
    }
  }
  else {
    echo "<div class='alert alert-danger' role='alert'>The showingID you entered doesn't exist, please try again</div>";
  }
}
// mysqli_close($connection);

?>