<div class="page-header">
  <h3>Add Movie/Genre</h3>
</div>
<form id="form1" action="" method="post" enctype="multipart/form-data">
  <div class="alert alert-warning" role="alert">
    If adding genre to existing movie, only fill
    <span class="label label-success">MovieID</span>
    and
    <span class="label label-success">Genre</span>
  </div>
  <div class="form-group">
    <label>MovieID</label>
    <input class="form-control" type="text" name="mID"></div>
    <div class="form-group">
      <label>MovieName</label>
      <input class="form-control" type="text" name="movieName"></div>
      <div class="form-group">
        <label>Year</label>
        <input class="form-control" type="text" name="YEAR"></div>
        <div class="form-group">
          <label>Genre</label>
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="Action">
          Action
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="SciFi">
          SciFi
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="Animated">
          Animated
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="Romance">
          Romance
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="Drama">
          Drama
          <br>
          <input type="checkbox" name="genre[]" id="genre" value="Comedy">
          Comedy
          <br>
          <input type="file" name="file" id="file">
        </div>
        <div class="form-group">
          <input type="submit" class="btn btn-primary" name = "submit" value="Add">
        </div>
      </form>
<?php
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';
include $root . '/upload_file.php';
//  Variables corresponding to table attributes
$mID = $_POST["mID"];
$movieName = $_POST["movieName"];
$YEAR = $_POST["YEAR"];
$genres = $_POST['genre'];
if ($mID != "" or $movieName != "" or $year != "" or $genre != ""){
foreach((array)$genres as $genre) {
  $insert = "INSERT INTO MovieGenre VALUES ('$mID', '$genre')";
  $result = mysqli_query($connection, $insert);
  if (!$result){
    echo "
    <br>
    <div class='alert alert-danger' role='alert'>
      Genre Insertion Failed" . $sql . "
      <br>" . mysqli_error($connection) . "</div>";
    }
    else {
      echo "
      <div class='alert alert-success' role='alert'>
        Inserted Movie Genre:
        <br>
        mID: " . $mID . "
        <br>Genre:" . $genre . "</div>
        ";
      }
} // end foreach loop
// Perform insertions in movie table
$insert = "INSERT INTO Movie VALUES ('$mID', '$movieName', '$YEAR', '$moviePoster')";
$result = mysqli_query($connection, $insert);
if (!$result){
  echo "
  <br>
  <div class='alert alert-danger' role='alert'>
    Movie Insertion Failed" . $sql . "
    <br>" . mysqli_error($connection) . "</div>
    ";
  }
  else {
    echo "
    <br>
    <div class='alert alert-success' role='alert'>
      Inserted Movie Info:" . "
      <br>
      mid:" . $mID . "
      <br>
      movieName:" . $movieName . "
      <br>YEAR:" . $YEAR . "</div>";
    }
  }
  ?>