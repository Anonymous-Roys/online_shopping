<?php

session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../login.php");
   exit();
}
$user_id = $_SESSION['user_id'];

require_once("../dbconn.php");
$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link rel="shortcut icon" href="img/salemlogo.png" type="image/x-icon">
    <title>Electronic Store</title>
</head>

<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <a href="#"><img src="img/salemlogo.png" alt="Electronic Store Logo">ALEM</a>
            </div>
            <div class="search-box">
                <input type="text" placeholder="Search products...">
            </div>
            <div class="profile">
                <img src="davis.png" alt="Profile Picture">
                <h4><?php echo $_SESSION['username'];?></h4>
            </div>
            <button class="buy-button">Buy</button>
        </nav>
    </header>
    <div class="container">
        <aside class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="#"><img src="img/home2.png" alt="Icon 1" title = "Home"></a></li>
                <li><a href="#"><img src="img/product.png" alt="Icon 2" title = "Product"></a></li>
                <li><a href="#"><img src="img/category.png" alt="Icon 3" title = "Category"></a></li>
                <li><a href="#"><img src="img/cart.png" alt="Icon 4" title = "Cart"></a></li>
                <li><a href="#"><img src="img/search.png" alt="Icon 4" title = "Search"></a></li>
            </ul>
        </aside>
        <main>
            <div class="work-list">
                <?php
                while ($row = mysqli_fetch_assoc($result)){
                    $product_id = $row['product_id'];
                    $name = $row['name'];
                    $description = $row['description'];
                    $price = $row['price'];
                    ?>
                    <div class="work">
                    <img src="img/download (10).jpeg" >
                    <div class="layer" title="<?php echo $description ?>">
                        <h3 name="name"><?php echo $name ?></h3>
                        <a href="../add_to_cart.php?ID=<?php echo $product_id?>">Add to cart</a>
                    </div>
                </div>

               <?php }
                ?>
                
                
                    </div>
                </div>
            </div>
            
            <!-- Content of the website goes here -->
        </main>
    </div>
    <footer>
        <div class="footer-content">
            <p>Contact us at: support@electronicstore.com</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>

</html>