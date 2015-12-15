<div class="page-header">
<h3>Movie/Rating Check</h3>
</div>
<div class="alert alert-warning" role="alert">Enter Customer's <span class="label label-success">First</span> and <span class="label label-success">Last Name</span>, OR just enter the <span class="label label-success">Customer ID</span></div>
<form id="movieCheck" action="" method="post" >
<div class="form-group">
<label>Customer First Name</label><input type="text" class="form-control" name="fname" placeholder="First Name">
</div>
<div class="form-group">
<label>Customer Last Name</label><input type="text" class="form-control" name="lname" placeholder="Last Name">
</div>
<div class="form-group">
<label>CustomerID</label><input type="text" class="form-control" name="custID" placeholder="CustomerID">
</div>
<div class="form-group">
<input type="submit" class= "btn btn-primary"name = "submit" value="Check">
</div>
</form>
<table class='table table-bordered table-hover'>

<?php
echo "<hr>";
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$custID = $_POST['custID'];
if (($fname != "" && $lname != "") || $custID != "") {
$check = "Select * from (SELECT DISTINCT A.custID, A.fname, A.lname, B.movieName, E.rating
FROM Customer A,
Movie B,
CustomerPurchase C,
Showing D,
CustomerRating E
WHERE A.custID = C.custID
AND C.showingID = D.showingID
AND D.mID = B.mID
AND E.showingID = D.showingID) as temp where temp.custID = '$custID' or (temp.fname = '$fname' and temp.lname = '$lname')";
$result2 = mysqli_query($connection, $check);
if (!$result2){
echo "Database Query Failed";
}
echo "";
echo "<h2>Movies Watched/Ratings</h2>";
echo "<tr class='info'><th>CustomerID</th>"
. "<th>First Name</th>"
. "<th>Last Name</th>"
. "<th>Movie Name</th>"
. "<th>Rating</th></tr>";
while ($row = mysqli_fetch_assoc($result2)){
// echo var_dump($row);
echo "<tr class= 'active'><td>"
. $row["custID"] . "</td>" . "<td>"
. $row["fname"] . "</td>" . "<td>"
. $row["lname"] . "</td>" . "<td>"
. $row["movieName"] . "</td>" . "<td>"
. $row["rating"] . "</td>";
}
}
else if ($fname != "" || $lname != "" || $custID != ""){
echo "<p class='bg-danger'>The customer doesn't exist, please try again</p>";
}
?>
</table>