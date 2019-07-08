<?php 
$connection = mysqli_connect("localhost", "id8349832_db_test", "admin", "id8349832_db_test");
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
$select_db = mysqli_select_db($connection, "id8349832_db_test");
if (!$select_db){
    die("Database Selection Failed" . mysqli_error($connection));
}