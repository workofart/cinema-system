<?php 
$root = realpath($_SERVER["DOCUMENT_ROOT"]);
include $root . '/connectdb.php';

//  Variables corresponding to table attributes

$mID = $_POST["mID"];
$genre = $_POST["genre"];
echo "<br>
";
if ($_POST['genre'] != ""){
  // Delete genre based on form submission
  $delete = "delete from movieGenre where mID = '$mID' and genre = '$genre'";
  $result = mysqli_query($connection, $delete);
  if (!$result){
    echo "Error: " . $sql . "
<br>
" . mysqli_error($connection);
    die("Deletion Failed");
  }
  else {
    echo "
<br> <b>Deleted Genre:</b>
<br>
";
    echo "mid:" . $mID;
    echo "Genre:" . $genre;
  }  
}
else {
  echo "
<h3> <b>You forgot to select your genre</b>
</h3>
<br>
";
}


mysqli_close($connection);

?>
<a href= "backend_staff.php">Go back to Staff Dashboard</a>