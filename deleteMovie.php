<div class="page-header">
  <h3>Delete Movie/Genre</h3>
</div>
<form id="addform" action="#" method="post" >
  <div class="alert alert-warning" role="alert">
    Removing the movie will remove all the associated genres as well.
  </div>
  <div class="form-group">
    <label>MovieID</label>
    <input type="text" class="form-control" name="mID2"></div>
  <div class="form-group">
    <label>MovieName</label>
    <input type="text" class="form-control" name="movieName2"></div>
  <div class="form-group">
    <label>Year</label>
    <input type="text" class="form-control" name="YEAR2"></div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Remove"></div>
</form>
<!--  Delete a genre from a Movie -->
<div class="page-header">
  <h3>Remove genre</h3>
</div>
<form id="deleteform" action="" method="post" >
  <div class="alert alert-warning" role="alert">Removing a certain genre from a specified movie</div>
  <div class="form-group">
    <label>MovieID</label>
    <input type="text" class="form-control" name="mID3"></div>
  <div class="form-group">
    <label>Genre</label>
    <select name="genre2">
      <option  value="">Select...</option>
      <option  value="Action">Action</option>
      <option  value="SciFi">SciFi</option>
      <option  value="Animated">Animated</option>
      <option  value="Romance">Romance</option>
      <option  value="Drama">Drama</option>
      <option  value="Comedy">Comedy</option>
    </select>
  </div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Remove"></div>
</form>

<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$mID2 = $_POST["mID2"];
$movieName2 = $_POST["movieName2"];
$YEAR2 = $_POST["YEAR2"];


// check for empty fields
if ($mID2 != "" or $movieName2 !="" or $YEAR2 != ""){
// delete from showing
// $delete = "delete from Showing where mID = '$mID2'";
// $result = mysqli_query($connection, $delete);
// if (!$result){
//   echo "Deletion Failed:" . $sql . "<br>
// " . mysqli_error($connection);
// }
// Perform deletions in movie table
$delete = "delete from Movie where mID = '$mID2' and movieName = '$movieName2'";
$result = mysqli_query($connection, $delete);
if (!$result){
  echo "Deletion Failed:" . $sql . "<br>
" . mysqli_error($connection);
}

else {
  echo "
<div class='alert alert-success' role='alert'>
  Deleted Movie:
  <br>
  mid:" . $mID2 . "movieName:" . $movieName2. "YEAR:" . $YEAR2 . "
</div>
";
}

// delete associated genres
$delete = "delete from MovieGenre where mID = '$mID2'";
$result = mysqli_query($connection, $delete);
if (!$result){
  echo "Deletion Failed:" . $sql . "
<br>
" . mysqli_error($connection);
}
else {
  echo "
<br>
<div class='alert alert-success' role='alert'>Deleted associated movie genre</div>
<br>
";
}
} // end check the first form empty

// Perform deletions in movie genre table
$mID3 = $_POST["mID3"];
$genre2 = $_POST["genre2"];
if ($mID3 != "" || $genre2 != ""){
  $delete = "delete from MovieGenre where mID = '$mID3' and genre = '$genre2'";
  $result = mysqli_query($connection, $delete);
  if (!$result){
    echo "Deletion Failed:" . $sql . "<br>" . mysqli_error($connection);
  }  
  else{
  echo "<br><div class='alert alert-success' role='alert'>Deleted associated movie genre</div><br>";
}
} // end check second form empty


// mysqli_close($connection);

?>