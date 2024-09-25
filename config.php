<?php
$localhost = "localhost";
$user = "root";
$pass = "";
$dbase = "webdev_act1";
$port = 3307;
//create connection & check connection
$con = mysqli_connect($localhost, $user, $pass, $dbase, $port) or die("Sorry! you can't connect to the database");
  
?>
