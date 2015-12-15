<!-- Create views in preparation for Showing filters and room full check -->
<?php
$tempView = "create view temp as SELECT showingID, Theatre.roomnum, Theatre.capacity from Showing, Theatre where Showing.roomnum = Theatre.roomnum";
$result = mysqli_query($connection, $tempView);

$tempView2 = "create view temp2 as SELECT count(*) as sales, showingID from CustomerPurchase group by showingID";
$result = mysqli_query($connection, $tempView2);

$view = "create view capacityCheck as select temp.showingID, roomnum, capacity, ifnull(sales,0) as sales from temp left join temp2 on temp.showingID = temp2.showingID";
$result = mysqli_query($connection, $view);

$tempView3 = "create view temp3 as select Movie.mID, Movie.movieName, Movie.YEAR, Showing.showingID, Showing.showDate, Showing.showTime, Showing.roomNum from Showing, Movie where Showing.mID = Movie.mID";
$result = mysqli_query($connection, $tempView3);

$genrefilter = "create view genrefilter as select MovieGenre.genre, temp3.movieName, temp3.YEAR, temp3.showingID, temp3.showDate, temp3.showTime, temp3.roomNum from MovieGenre, temp3 where temp3.mID = MovieGenre.mID";
$result = mysqli_query($connection, $genrefilter);

$datefilter = "create view dateFilter as select Movie.mID, Movie.movieName, Movie.YEAR, Showing.showingID, Showing.showDate, Showing.showTime, Showing.roomNum from Showing, Movie where Showing.mID = Movie.mID";
$result = mysqli_query($connection, $datefilter);

 ?>
<div class="page-header">
	<h3>Showing by Genre</h3>
</div>
<form action="" method="post">
<div class="form-group">
  <select name="genre" class="form-control">
  	<option value="">Select Genre...</option>
  	<option value="Action">Action</option>
  	<option value="SciFi">SciFi</option>
  	<option value="Animated">Animated</option>
  	<option value="Romance">Romance</option>
  	<option value="Drama">Drama</option>
  	<option value="Comedy">Comedy</option>
  </select>
</div>
<div class="form-group">
  <input type="submit" class="btn btn-primary" name="submit" value="Filter">
</div>
</form>

<?php
$genre = $_POST['genre'];
$query = "select movieName,YEAR,genrefilter.showingID,showDate,showTime,genrefilter.roomNum,capacityCheck.sales,capacityCheck.capacity from capacityCheck, genrefilter where genrefilter.genre = '$genre' and genrefilter.showingID = capacityCheck.showingID";
$result = mysqli_query($connection, $query);
if (!$result){
  echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
}
else if ($genre != ""){
	echo "<h2>Showing Info ($genre)</h2>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<hr>";
	
	echo "<tr class='info'><th>Movie Name</th>"
	      . "<th>Year</th>"
	      . "<th>Showing ID</th>"
	      . "<th>Showing Date</th>"
	      . "<th>Showing Time</th>"
	      . "<th>Theatre Room Number</th>"
	      . "<th>Sales</th>"
	      . "<th>Capacity</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
	if((int)$row["sales"] >= (int)$row["capacity"]){
		echo "<div class='alert alert-danger' role='alert'>No seats left in Theatre room: " . $row['roomNum'] . "<br>For showingID: " . $row["showingID"]. "</div>";
	}
	  echo "<tr class='active'><td>"
	  . $row["movieName"] . "</td>" . "<td>"
	  . $row["YEAR"] . "</td>" . "<td>"
	  . $row["showingID"] . "</td>" . "<td>"
	  . $row["showDate"] . "</td>" . "<td>"
	  . $row["showTime"] . "</td>" . "<td>"
	  . $row["roomNum"] . "</td>" . "<td>"
	  . $row["sales"] . "</td>" . "<td>"
	  . $row["capacity"] . "</td>";
	}
}
mysqli_free_result($result);
?>  
</table>

<div class="page-header">
	<h3>Showing by Date Range</h3>
</div>
<form action="" method="post" name="date">
<div class="form-group">
	<label>Start Date (YY-MM-DD)</label><input class="form-control" type="text" name="startDate">
</div>
<div class="form-group">
<label>End Date (YY-MM-DD)</label><input class="form-control" type="text" name="endDate" >
</div>
  <input type="submit" class="btn btn-primary" name="submit" value="Filter">
</form>
<?php
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
$query2 = "select movieName, YEAR, temp.showingID, showDate, showTime, temp.roomNum, capacityCheck.sales, capacityCheck.capacity from (select * from dateFilter where dateFilter.showDate > '$startDate' and dateFilter.showDate < '$endDate') as temp left join capacityCheck on capacityCheck.showingID = temp.showingID";
$result = mysqli_query($connection, $query2);
if (!$result){
  echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
}
else if ($startDate != "" && $endDate != ""){
	echo "<h2>Showing Info From $startDate to $endDate</h2>";
	echo "<table class='table table-bordered table-hover'>";
	echo "<hr>";
	// echo "";
	echo "<tr class='info'><th>Movie Name</th>"
	      . "<th>Year</th>"
	      . "<th>Showing ID</th>"
	      . "<th>Showing Date</th>"
	      . "<th>Showing Time</th>"
  	      . "<th>Theatre Room Number</th>"
	      . "<th>Sales</th>"
	      . "<th>Capacity</th></tr>";
	while ($row = mysqli_fetch_assoc($result)){
	if((int)$row["sales"] >= (int)$row["capacity"]){
		echo "<div class='alert alert-danger' role='alert'>No seats left in Theatre room: " . $row['roomNum'] . "<br>For showingID: " . $row["showingID"]. "</div>";
	}
	  echo "<tr class='active'><td>"
	  . $row["movieName"] . "</td>" . "<td>"
	  . $row["YEAR"] . "</td>" . "<td>"
	  . $row["showingID"] . "</td>" . "<td>"
	  . $row["showDate"] . "</td>" . "<td>"
	  . $row["showTime"] . "</td>" . "<td>"
	  . $row["roomNum"] . "</td>" . "<td>"
	  . $row["sales"] . "</td>" . "<td>"
	  . $row["capacity"] . "</td>";
	}
}
mysqli_free_result($result);
?>  
</table>
