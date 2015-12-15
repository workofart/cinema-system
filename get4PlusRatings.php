<table class="table table-bordered table-hover">
  <?php
  $query = "select * from (select Movie.movieName, avg(CustomerRating.rating) as avgRating from CustomerRating, Showing, Movie where CustomerRating.showingID = Showing.showingID and Showing.mID = Movie.mID group by Movie.mID) as temp where temp.avgRating >= 4";
  $result = mysqli_query($connection, $query);
  if (!$result){
  die("Database Query Failed");
  }
  echo "<h2>Movie Info</h2>";
  echo "<tr class='info'><th>Movie Name</th>"
  . "<th>Avg Rating</th></tr>";
  while ($row = mysqli_fetch_assoc($result)){
  echo "<tr class='active'><td>"
  . $row["movieName"] . "</td>" . "<td>"
. round($row["avgRating"], 2) . "</td>";
}
mysqli_free_result($result);
?>
</table>