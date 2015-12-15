<form id="sellTicket" action="" method="post" >
  <?php include $root . '/getShowings.php'; include $root. '/getCustomers.php'; ?>
  <div class="form-group">
    <input type="text" name = "price" placeholder="Enter dollar value">
  </div>
  <div class="form-group">
    <input type="submit" class= "btn btn-danger" name = "submit" value="Purchase">
  </div>
</form>

<?php
$showingID = $_POST['purchaseShowingID'];
$custID = $_POST['purchaseCustID'];
$price = $_POST['price'];
// echo "showingID:" . $showingID;
// echo "custID: ". $custID;
// echo "price: " . $price;
if ($showingID != "" && $custID != "" && $price !=""){
  $query = "insert into CustomerPurchase (showingID, custID, price) values ('$showingID', '$custID', '$price')";
  $result = mysqli_query($connection, $query);
  if (!$result){
    echo "Insertion Failed";
  }
  echo "<br><div class='alert alert-success' role='alert'>Ticket Sold" . "<br>Customer ID: " . $custID . "<br>Showing ID: " . $showingID . "<br>Price " . $price . "</div><br>";
}
//  alert if at least one field is empty
else if (isset($showingID) || isset($custID) || isset($price)){
  echo "<p class='bg-danger'>You forgot to select a customer or a showing or the price</p>";
}
?>