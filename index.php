<?php
  require(__DIR__.'/config/app.php');
  require($root.'/config/db.php');
  require($root.'controllers/customersController.php');
  $customers = getAllCustomers($db);

  if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $req = addCustomer($db,$_POST);
    echo '<pre>';
    print_r($req);
    echo '</pre>';
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <!-- App -->
  <link rel="stylesheet" href="./css/app.css">
  <title>Fidelity cards</title>
</head>
  <body>
    <!-- NAV -->
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#addUser" aria-expanded="false" aria-controls="addUser"><span class="fas fa-user-plus"></span></button>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit"><i class="fas fa-search"></i></button>
        </form>
      </div>
    </nav>
    <main class="container">
      <!-- FORM -->
      <div class="collapse" id="addUser">
        <form action="<?php echo htmlspecialchars('#'); ?>" method="POST">
          <div>
            <label for="firstname">Firstname:</label>
            <input class="form-control" type="text" name="firstname">
          </div>
          <div>
            <label for="lastname">Lastname:</label>
            <input class="form-control" type="text" name="lastname">
          </div>
          <div class="text-right padding-top-1">
            <input type="submit" class="btn btn-outline-primary" value="Save"/>
          </div>
        </form>
      </div>
      <!-- ACCORDION -->
      <div class="accordion padding-top-1" id="accordionCustomer">
        <?php
          foreach($customers as $customer) {
            $customerPurchaseLink = '<a href="#" role="button" class="btn btn-outline-primary"><span class="fas fa-plus"></span></a>';
            $customerDiscountLink = '<a href="#" role="button" class="btn btn-outline-primary">Discount '.$customer->discount.'€</a>';
        ?>
          <div class="accordion-item">
            <h2 class="accordion-header" id="heading-<?php echo $customer->id; ?>">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $customer->id; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $customer->id; ?>">
                <?php echo $customer->firstname.' '.$customer->lastname; ?>
              </button>
            </h2>
            <div id="collapse-<?php echo $customer->id; ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo $customer->id; ?>" data-bs-parent="#accordionCustomer">
              <div class="accordion-body">
                <table class="table text-center">
                  <tbody>
                    <tr>
                      <td><?php echo $purchase0 = $customer->purchase0 == '0.00'? $customerPurchaseLink : $customer->purchase0.' €'; ?></td>
                      <td><?php echo $purchase1 = $customer->purchase1 == '0.00'? $customerPurchaseLink : $customer->purchase1.' €'; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $purchase2 = $customer->purchase2 == '0.00'? $customerPurchaseLink : $customer->purchase2.' €'; ?></td>
                      <td><?php echo $purchase3 = $customer->purchase3 == '0.00'? $customerPurchaseLink : $customer->purchase3.' €'; ?></td>
                    </tr>
                    <tr>
                      <td><?php echo $purchase4 = $customer->purchase4 == '0.00'? $customerPurchaseLink : $customer->purchase4.' €'; ?></td>
                      <td><?php echo $purchase5 = $customer->purchase5 == '0.00'? $customerPurchaseLink : $customer->purchase5.' €'; ?></td>
                    </tr>
                  </tbody>
                </table>
                <div class="text-right">
                  <?php echo $discount = $customer->discount == '0.00' ? '' : $customerDiscountLink; ?>
                  <a href="#" role="button" class="btn btn-outline-success"><span class="fas fa-user-edit"></span></a>
                  <a href="#" role="button" class="btn btn-outline-danger deleteCustomer"><span class="fas fa-trash-alt"></span></a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </main>
    <footer>

    </footer>
    <!-- Bootstrap Js -->
    <script src="./js/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="./js/bootstrap.min.js"></script>
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/7be4a1afd8.js" crossorigin="anonymous"></script>
    <!-- App -->
    <script src="./js/app.js"></script>
  </body>
  </html>
