<?php

if(isset($_POST["submit"])) {
  $date = $_POST["Date"];
  $timeslot = $_POST["Timeslot"];
  $Uid = $_SESSION["Uid"];

  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  echo var_dump($Uid);
  addOrder($Uid, $date, $timeslot);
}

?>
