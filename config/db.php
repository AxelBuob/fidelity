<?php
  if($_SERVER['HTTP_HOST'] == 'localhost') {
    $db_name = 'axel_buob';
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'password';
  } else {
    $db_name = 'axel_buob';
    $db_host = 'sql.free.fr';
    $db_user = 'axel.buob';
    $db_pass = 'jbpM7596';
  }

  try {
      $db = new PDO('mysql:dbname='.$db_name.';host='.$db_host.'',$db_user,$db_pass);
  } catch (PDOException $e) {
      echo 'Connection failed: ' . $e->getMessage();
  }
