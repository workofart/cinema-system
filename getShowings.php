<table class="table table-bordered table-hover">
  <?php
$query = "select Movie.movieName, Movie.YEAR, Showing.showingID, Showing.showDate, Showing.showTime, Showing.roomNum from Showing, Movie where Showing.mID = Movie.mID";
$result = mysqli_query($connection, $query);
if (!$result){
  echo "Database Query Failed";
}

echo "<h2>Showing Info</h2>";
echo "<hr>";
// echo "";
echo "<tr class='info'><th>Movie Name</th>"
      . "<th>Year</th>"
      . "<th>Showing ID</th>"
      . "<th>Showing Date</th>"
      . "<th>Showing Time</th>"
      . "<th>Theatre Room Number</th>"
      . "<th> Selection</th></tr>"
      . "<div class='btn-group' data-toggle='buttons'>";
while ($row = mysqli_fetch_assoc($result)){
  echo "<tr class='active'><td>"
  . $row["movieName"] . "</td>" . "<td>"
  . $row["YEAR"] . "</td>" . "<td>"
  . $row["showingID"] . "</td>" . "<td>"
  . $row["showDate"] . "</td>" . "<td>"
  . $row["showTime"] . "</td>" . "<td>"
  . $row["roomNum"] . "</td>" . "<td>"
  . "<center><label class='btn btn-primary'><input type='checkbox' autocomplete='off' name='purchaseShowingID' value=" . $row['showingID'] . "></label></td></center>";
}
echo "</div>";
mysqli_free_result($result);
?>  
</table>
