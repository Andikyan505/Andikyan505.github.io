<?php
include ("db.php");
$con = mysqli_connect(HOST, USERNAME, PASSWORD, DBNAME);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}