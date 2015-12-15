<?php
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "henrypan";
$dbname = "moviedb";
$connection = mysqli_connect($dbhost, $dbuser,$dbpass,$dbname);
if (mysqli_connect_errno()) {
     die("database connection failed :" .
     mysqli_connect_error() .
     "(" . mysqli_connect_errno() . ")"
         );
    }
    // echo("Connection success");
?>