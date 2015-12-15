<table class="table table-bordered table-hover">
  <?php
  $query = "select * from Customer";
  $result = mysqli_query($connection, $query);
  if (!$result){
  echo "Database Query Failed";
  }
  echo "<hr>";
  echo "<h2>Customer Info</h2>";
  echo "<tr class='info'><th>CustomerID</th>"
  . "<th>First Name</th>"
  . "<th>Last Name</th>"
  . "<th>Sex</th>"
  . "<th>Email</th>"
  . "<th> Selection</th></tr>";
  while ($row = mysqli_fetch_assoc($result)){
  echo "<tr class='active'><td>"
  . $row["custID"] . "</td>" . "<td>"
. $row["fname"] . "</td>" . "<td>"
. $row["lname"] . "</td>" . "<td>"
. $row["sex"] . "</td>" . "<td>"
. $row["email"] . "</td>" . "<td>"
. "<center><label class='btn btn-primary'><input type='checkbox' autocomplete='off' name='purchaseCustID' value=" . $row['custID'] . "></label></td></center>";
}
mysqli_free_result($result);
?>
</table>
