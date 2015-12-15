<style type="text/css">
  .form-group{
    max-width: 20%;
    }
</style>
<div class="page-header">
  <h3>Delete Room</h3>
</div>
<form id="form1" action="" method="post" >
  <div class="alert alert-warning" role="alert">
    The corresponding showings with the room will be deleted as well
  </div>
  <div class="form-group">
    <label>Room Number</label>
    <input class="form-control" type="text" name="roomNum2"></div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Delete"></div>
</form>

<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$roomNum2 = $_POST['roomNum2'];

// run query to check if room number exists
if ($roomNum2 != ""){
$check = "select count(*) as count from Theatre where roomNum = '$roomNum2'";
$result = mysqli_query($connection, $check);
if (!$result){
  echo "<div class='alert alert-danger' role='alert'>
  Query Error: " . $sql . "
  <br>" . mysqli_error($connection) . "</div>";
}
$row = mysqli_fetch_assoc($result);
if ($row["count"] > 0){
// room exist, delete
  $delete = "delete from Theatre where roomNum = '$roomNum2'";
  $result = mysqli_query($connection, $delete);
    if (!$result){
      echo "<div class='alert alert-danger' role='alert'>
      Deletion Error: " . $sql . "
      <br>" . mysqli_error($connection) . "</div>";
    }
    else
    echo "<br><div class='alert alert-success' role='alert'>Deletion successful." . "<br>Room Number: " . $roomNum2 . "</div><br>";
}
else
  echo "<div class='alert alert-danger' role='alert'>The room you entered doesn't exist, please try again</div>";
}
// mysqli_close($connection);

?>