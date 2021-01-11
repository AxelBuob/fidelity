<?php
  require(__DIR__.'/../config/app.php');
  require($root.'controllers/formsController.php');
  require($root.'models/customersModel.php');


  function getAllCustomers($db) {
    $customers = selectAllCustomers($db);
    return $customers;
  }

  function addCustomer($db,$post) {
    $req['errors'] = checkInput($post);
    if(empty($req['errors'])) {
      trimInput($post);
      $req = insertCustomer($db,$post);
    }
    return $req;
  }

  function deleteCustomer() {

  }

  function editCustomer() {

  }
