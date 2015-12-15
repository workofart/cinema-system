<form action="" method="post">
  <div class="page-header">
    <h3>Customer Personal Info</h3>
  </div>
  <div class="alert alert-warning" role="alert">
    Enter Customer's
    <span class="label label-success">First</span>
    and
    <span class="label label-success">Last Name</span>
    , OR just enter the
    <span class="label label-success">Customer ID</span>
  </div>
  <div class="form-group">
    <label>First Name</label>
    <input type="text" class="form-control" name="fname" placeholder="First Name"></div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" class="form-control" name="lname" placeholder="Last Name"></div>
  <div class="form-group">
    <label>Customer ID</label>
    <input type="text" class="form-control" name="custID" placeholder="Customer ID"></div>
  <div class="form-group">
    <input type = "submit" class="btn btn-primary" name = "submit" value = "Search"></div>
</form>
<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$custID = $_POST['custID'];
if (($fname != "" and $lname != "") or $custID != "") {
$query = "select * from Customer where (fname = '$fname' and lname = '$lname') or custID = '$custID'";
$result = mysqli_query($connection, $query);
if (!$result){
echo "<div class='alert alert-danger' role='alert'>Query Error: " . $sql . "<br>" . mysqli_error($connection) . "</div>";
}
echo "<table class='table table-bordered table-hover'>
";
  echo "
<hr>
";
  echo "
<h2>Customer Info</h2>
";
  echo "
<tr class='info'>
  <th>CustomerID</th>
  "
  . "
  <th>First Name</th>
  "
  . "
  <th>Last Name</th>
  "
  . "
  <th>Sex</th>
  "
  . "
  <th>Email</th>
</tr>
";
  
  while ($row = mysqli_fetch_assoc($result)){
  echo "
<tr class='active'>
  <td>
    "
  . $row["custID"] . "
  </td>
  " . "
  <td>
    "
. $row["fname"] . "
  </td>
  " . "
  <td>
    "
. $row["lname"] . "
  </td>
  " . "
  <td>
    "
. $row["sex"] . "
  </td>
  " . "
  <td>
    "
. $row["email"] . "
  </td>
  ";
}
mysqli_free_result($result);
}
else if ($fname != "" || $lname != "" || $custID != ""){
echo "
  <p class='bg-danger'>The customer doesn't exist, please try again</p>
  ";
}
echo "
</table>
";
?>