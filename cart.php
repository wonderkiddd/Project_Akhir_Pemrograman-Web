<?php
  session_start();
  require 'conn.php';

  // Cek Login
  if (!isset($_SESSION['login'])) {
      header('Location: index.php');
      exit;
  }

  $total = 0;
  if (isset($_SESSION['cart'])) {
    $cart_item = array();
    foreach ($_SESSION['cart'] as $item) {
      $productnames = $item['productname'];

      $result = mysqli_query($conn, "SELECT * FROM displayfood WHERE Foodname = '$productnames' ");
      $items = mysqli_fetch_assoc($result);
      
      array_push($cart_item, $items);
      //menambahkan item ke array cart item

      $total = $total + (int)$items['Foodprice'];
      //menghitung harga
    }
  }


  if (isset($_POST['remove'])) {
    if ($_GET['action'] == 'remove') {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['productname'] == $_GET['Foodname']) {
          unset($_SESSION['cart'][$key]);
          echo '<script>
                alert("Remove Product Success")
                </script>';
        }
      }
    }
  }
  //loop session cart sbg key dan value sbg value 

  if (isset($_POST['checkout'])){
    $success = true;
    echo '<script>alert("Checkout Success Thank You For Your Purchase")</script>';
    header("Location: mainpage.php");

  }




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cart</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="css/stylecart.css"/>
  </head>
  <body>
    <section class="section-cart">
      <div class="header">
        <img src="image/logotulisan.jpg">
      </div>
      <div class="container">
        <div class="cart-container">
          <?php  foreach ($cart_item as $item) : ?>
          <form action="cart.php?action=remove&Foodname=<?= $item["Foodname"] ?>" method="post">
            <div class="cart-item">
              <img src="image/<?= $item["Picture"]; ?>" alt="" />
              <div class="cart-info">
                <p class="food"><?= $item["Foodname"]; ?></p>
                <p class="price"><sup>Rp</sup><?= $item["Foodprice"]; ?></p>
                <button class="btn" type="submit" name="remove">Remove</button>
              </div>
            </div>
          </form>
          <?php endforeach; ?>   
        </div>

        <div class="cart-checkout">
          <h4>PRICE DETAIL</h4>
          <span class="line"></span>
          <div class="flex">
            <p class="product-payment">
              <?php
                if (isset($_SESSION['cart'])) {
                  $count = count($_SESSION['cart']);
                  echo "<p class='product-total'>Price($count items)</p>";
                } else {
                  echo "<p class='product-total'Price(0)</p>";
                }
              
              ?>
            </p>
            <p><sup>Rp</sup><?= $total ?></p>
          </div>
          <div class="flex">
            <p class="delivery-payment">Delivery Charges</p>
            <p>FREE</p>
          </div>
          <span class="line"></span>
          <div class="flex">
            <p class="total-payment">Amount payable</p>
            <p><sup>Rp</sup><?= $total ?></p>
          </div>
          <form action="" method="post">
          <button class="btn" name="checkout">CHECKOUT</button>
          <?php if( isset($success) ) :?>
              <br>
              <label> Thank You For Your Purchase </label>
          <?php endif; ?>
          </form>
        </div>
      </div>
    </section>
  </body>
</html>
