<?php
  function selectAllCustomers($db) {
    $query = $db->query("SELECT * FROM customers");
    $query = $query->fetchAll(PDO::FETCH_OBJ);
    return $query;
  }

  function insertCustomer($db,$post) {
    $query = $db->prepare("INSERT INTO customers(firstname,lastname) VALUES (:firstname,:lastname)");
    $query = $query->execute(array(
      'firstname' => $post['firstname'],
      'lastname' => $post['lastname']
    ));
    if($query) {
      $req['success'] = 'Customer added successfully!';
    } else {
      $req['errors']['insert'] = 'Cannot add customer';
    }
    return $req;
  }
