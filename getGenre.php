<table class="table table-bordered table-hover">
  <?php
  $query = "select * from MovieGenre order by mID";
  $result = mysqli_query($connection, $query);
  if (!$result){
    echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
  }

  echo "<h2>Movie Genre Info</h2>";
  echo "<tr class='info'><th>Movie ID</th>"
  . "<th>Genre</th></tr>";
  while ($row = mysqli_fetch_assoc($result)){
    echo "<tr class='active'><td>"
    . $row["mID"] . "</td>" . "<td>"
    . $row["genre"] . "</td>";
  }
  mysqli_free_result($result);
  ?>  
</table>
<table class="table table-bordered table-hover">
  <?php
  $query = "select genre, count(*) from MovieGenre group by genre";
  $result = mysqli_query($connection, $query);
  if (!$result){
    echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
  }
  echo "<h2>Movie Count by Genre</h2>";
  echo "<tr class='info'><th>Genre</th>"
  . "<th>Count</th></tr>";
  while ($row = mysqli_fetch_assoc($result)){
    echo "<tr class='active'><td>"
    . $row["genre"] . "</td>" . "<td>"
    . $row["count(*)"] . "</td>";
  }
  mysqli_free_result($result);
  ?>  
</table>
 <table class="table table-bordered table-hover">
  <?php
  $query = "SELECT distinct MovieGenre.genre, ifnull(temp.sales,0) as sales from MovieGenre left join (SELECT temp2.genre,count(*) as sales FROM CustomerPurchase left join(SELECT MovieGenre.mid,MovieGenre.genre,Showing.showingid FROM MovieGenre,Showing WHERE MovieGenre.mid = Showing.mid) AS temp2 on temp2.showingid = CustomerPurchase.showingid GROUP BY temp2.genre) as temp on MovieGenre.genre = temp.genre";
  $result = mysqli_query($connection, $query);
  if (!$result){
    echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
  }
  echo "<h2>Sales by Genre</h2>";
  echo "<tr class='info'><th>Genre</th>"
  . "<th>Tickets Sold</th></tr>";
  while ($row = mysqli_fetch_assoc($result)){
    echo "<tr class='active'><td>"
    . $row["genre"] . "</td>" . "<td>"
    . $row["sales"] . "</td>";
  }
  mysqli_free_result($result);
  ?>  
</table>