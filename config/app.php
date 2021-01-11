<?php
  $root = preg_replace('#config#','',__DIR__);

  if($_SERVER['HTTP_HOST'] == 'localhost') {
    $host = '/~axel/free/';
  }
