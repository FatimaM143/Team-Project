<?php

$severname = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "crnex";

$conn = msqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}
