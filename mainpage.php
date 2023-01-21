<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "lastproject");

if( !isset($_SESSION["login"]) ){
  header("Location: index.php");
  exit;
}


function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ( $row = mysqli_fetch_assoc($result) ){
    $rows[] = $row;
  }
  return $rows;
}

if(isset($_POST['productname']) ) {
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'productname');
            //mencari semua value dari key productname pada session cart

            if (in_array($_POST['productname'], $item_array_id)) {
                echo '<script>alert("Product has been added")</script>';
                echo '<script>window.location="mainpage.php"</script>';
                //mengecek apakah ada post productname didalam variabel item array id
            } else {
                $count = count($_SESSION["cart"]);
                $item_array = array(
                    'productname' => $_POST['productname']
                    //membuat sebuah array baru dengan key productname dengan value post productname
                );

                $_SESSION["cart"][$count] = $item_array;
            }
        } else {
            $item_array = array(
                'productname' => $_POST['productname']
            );

            $_SESSION['cart'][0] = $item_array;
        }
    }

$menu = query("SELECT * FROM displayfood");


 ?>


<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/stylemainpage.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
      integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <title>Document</title>

  </head>
  <body>

    <div class="header">
      <img src="image/logoprojekTULISAN.png">
      <div class="header-btn">
      <button class="cart"><a href="cart.php"><i class="fas fa-shopping-cart"></i>
        <?php
            if (isset($_SESSION['cart'])) {
                  $count = count($_SESSION["cart"]);
                   echo "<span id=\"cart_count\">$count</span>";
                } else {
                echo "<span id=\"cart_count\">0</span>";
              }
        ?>
      </a>
      </button>
      <button class="logout"><a href="logout.php">Logout</a></button>
      </div>
    </div>
    <div class="preview">

    <section class="section">
      <div class="slider">
        <div class="slide">
          <input type="radio" name="radio-btn" id="radio1" />
          <input type="radio" name="radio-btn" id="radio2" />
          <input type="radio" name="radio-btn" id="radio3" />
          <input type="radio" name="radio-btn" id="radio4" />

          <div class="st first">
            <img src="image/feeds1.jpg" alt="" />
          </div>
          <div class="st">
            <img src="image/feeds2v2.jpg" alt="" />
          </div>
          <div class="st">
            <img src="image/feeds3.jpg" alt="" />
          </div>
          <div class="st">
            <img src="image/feeds4.jpg" alt="" />
          </div>

          <div class="nav-auto">
            <div class="a-b1"></div>
            <div class="a-b2"></div>
            <div class="a-b3"></div>
            <div class="a-b4"></div>
          </div>
        </div>

        <div class="nav-m">
          <label for="radio1" class="m-btn"></label>
          <label for="radio2" class="m-btn"></label>
          <label for="radio3" class="m-btn"></label>
          <label for="radio4" class="m-btn"></label>
        </div>
      </div>

      <div class="previewkanan">
      <img src="image/logoprojekTULISANputih.png">
      </div>
    </section>

    
    </div>

    <div class="footer">
      <div class="foodtitle">
        <label>FOOD</label>
      </div>

    <div class="container">
      <?php $i = 1;  ?>
        <?php foreach( $menu as $row ) : ?>
            <div class="card">
              <div class="card-img">
                <img src="image/<?php echo $row["Picture"]; ?>">
              </div>
              <div class="card-detail">
                  <div class="names"><?php echo $row["Foodname"]; ?></div>
                  <div class="prices"><sup>Rp </sup><?php echo $row["Foodprice"]; ?></div>
                  <form action="" method="post">
                   <div class="orderbtn">
                    <button type="submit" name="orderbtn" value=>Add to Cart</button>
                    <input type="hidden" name="productname" value="<?= $row['Foodname']; ?>">
                  </div>
                  </form>
              </div>
            </div>
        <?php $i++; ?>
      <?php endforeach; ?>
    </div>
    </div>

    <script type="text/javascript">
      var counter = 1;
      setInterval(function () {
        document.getElementById("radio" + counter).checked = true;
        counter++;
        if (counter > 4) {
          counter = 1;
        }
      }, 5000);

    </script>

  </body>
</html>
