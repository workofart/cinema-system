<style type="text/css">
  .form-group{
    max-width: 20%;
    }
</style>
<div class="page-header">
  <h3>Add/Change Room Info</h3>
</div>
<form id="form1" action="" method="post" >
  <div class="alert alert-warning" role="alert">
    If changing room capacity to existing movie, fill
    <span class="label label-success">room number</span>
    and new
    <span class="label label-success">capacity</span>
  </div>
  <div class="form-group">
    <label>Room Number</label>
    <input class="form-control" type="text" name="roomNum"></div>
  <div class="form-group">
    <label>Capacity</label>
    <input class="form-control" type="text" name="capacity"></div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Add/Update"></div>
</form>

<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$roomNum = $_POST['roomNum'];
$capacity = $_POST['capacity'];



// run query to check if room number exists
if ($roomNum != ""){
$check = "select count(*) as count from Theatre where roomNum = '$roomNum'";
$result = mysqli_query($connection, $check);
if (!$result){
  echo "<div class='alert alert-danger' role='alert'>
Query Error: " . $sql . "
<br>" . mysqli_error($connection) . "</div>
";
}
$row = mysqli_fetch_assoc($result);
if ($row["count"] > 0){
// the room exists, check for capacity
  if ($capacity ==""){
    echo "
<div class='alert alert-danger' role='alert'>Please enter a capacity!</div>
";
  }
  else{
    $update = "update Theatre set capacity = '$capacity' where roomNum = '$roomNum'";
    $result = mysqli_query($connection, $update);
    if (!$result){
      echo "
      <div class='alert alert-danger' role='alert'>
      Query Error: " . $sql . "
      <br>" . mysqli_error($connection) . "</div>
      ";
    }
   echo "<br><div class='alert alert-success' role='alert'>Update successful." . "
   <br>Room Number: " . $roomNum . "
   <br>New Capacity: " . $capacity . "</div>
   <br>";
  }
}
// room doesn't exist, insert
else {
  $insert = "insert into Theatre values ('$roomNum', '$capacity')";
  $result = mysqli_query($connection, $insert);
    if (!$result){
      echo "
<div class='alert alert-danger' role='alert'>
Query Error: " . $sql . "
<br>" . mysqli_error($connection) . "</div>
";
    }
    else
   echo "
<br>
<div class='alert alert-success' role='alert'>
Insert successful." . "
<br>
New Room Number: " . $roomNum . "
<br>Capacity: " . $capacity . "</div>
<br>
";
  } 
}
// mysqli_close($connection);

?>