<div class="page-header">
  <h3>Add/Change Showing Info</h3>
</div>
<form id="form1" action="" method="post" >
  <div class="form-group">
    <label>Showing ID</label>
    <input class="form-control" type="text" name="showingID">
  </div>
  <div class="form-group">
    <label>Showing Date (YY-MM-DD)</label> 
    <!-- YY-MM-DD format -->
    <input class="form-control" type="text" name="showDate">
  </div>
  <div class="form-group">
    <label>Showing Time (24-hour HH:MM)</label>
    <!-- HH:MM format -->
    <input class="form-control" type="text" name="showTime">
  </div>
  <div class="form-group">
    <label>Movie ID</label>
    <input class="form-control" type="text" name="mID">
  </div>
  <div class="form-group">
    <label>Room Number</label>
    <input class="form-control" type="text" name="roomNumTemp">
  </div>
  <div class="form-group">
    <label>Change existing Showing?</label>
    <input type="checkbox" name="trigger" placeholder="">
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Add/Update">
  </div>
</form>

<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$showingID = $_POST['showingID'];
$showDate = $_POST['showDate'];
$showTime = $_POST['showTime'];
$mID = $_POST['mID'];
$roomNumTemp = $_POST['roomNumTemp'];

if ($showingID != "" and $showDate != "" and $showTime != "" and $mID != "" and $roomNumTemp){
  if (!isset($_POST['trigger'])){
  // check if showingID and mID and room exists
    $check = "select count(*) as count from Movie where mID = '$mID'";
    $result = mysqli_query($connection, $check);
    $check = "select count(*) as count from Theatre where roomNum = '$roomNumTemp'";
    $result2 = mysqli_query($connection, $check);
    $row2 = mysqli_fetch_assoc($result);
    $row3 = mysqli_fetch_assoc($result2);

    if ($result != true || $result2 != true){
      echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
    }
    else {
      if ($row2["count"] > 0 and $row3["count"] > 0){
    // all exist
        $insert = "insert into Showing values('$showingID', '$showDate', '$showTime', '$mID', '$roomNumTemp')";
        $result = mysqli_query($connection, $insert);
        if (!$result){
          echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
        }
        else
          echo "<br><div class='alert alert-success' role='alert'>
        Insertion successful."
        . "<br>Showing ID: " . $showingID
        . "<br>Showing Date: " . $showDate
        . "<br>Showing Time: " . $showTime
        . "<br>Movie ID: " . $mID
        . "<br>Room Number: " . $roomNumTemp
        . "</div><br>";
      }  

  // some parameter doesn't exist
      else
        echo "<div class='alert alert-danger' role='alert'>The Showing or Movie doesn't exist, please check again</div>";
    }
  } // end - check for trigger
  else {
    $update = "update Showing set showDate = '$showDate', showTime = '$showTime', mID = '$mID', roomNum = '$roomNumTemp' where showingID = '$showingID'";
    $result = mysqli_query($connection, $update);
    if (!$result){
      echo "<div class='alert alert-danger' role='alert'>
      Query Error: " . $sql . "
      <br>" . mysqli_error($connection) . "</div>";
    }
    else
      echo "<br><div class='alert alert-success' role='alert'>"
    . "<br>Showing ID: " . $showingID
    . "<br>Showing Date: " . $showDate
    . "<br>Showing Time: " . $showTime
    . "<br>Movie ID: " . $mID
    . "<br>Room Number: " . $roomNumTemp
    . "</div><br>";
  } // end - update Showing info
} // end - check for user input
// check if some fields are not filled
else if ($showingID != "" or $showDate != "" or $showTime != "" or $mID != "" or $roomNumTemp){
  echo "<div class='alert alert-danger' role='alert'>Some fields are not filled, please check again</div>";
}

?>