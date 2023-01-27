<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/static/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/static/css/style.css">
    <title>Papelax List:.</title>
</head>
<body>
    <nav class="navbar">
        <h1>Product List</h1>
        <nav class="navitems">
        <a href="/static/html/addproduct.php">ADD</a>
        <button id="delete-product-btn" name="delete-product-btn" type="submit" form="card">MASS DELETE</button>
        </nav>
    </nav>
    <?php
    if(isset($_SESSION['success'])):
    ?>
    <div class="notification-success">
    <p>Success</p>
    </div>
    <?php
    endif;
    unset($_SESSION['success']);
    ?>
    <div class="container">
     <form action="./PHP/deleteProduct.php" method="POST" class="container" id="card">
     <?php 
     include_once('./classes/RenderDB.php');
     $render = new RenderDB;
     $render->renderDVD();
     $render->renderBook();
     $render->renderFurniture();

    ?>
     </form>
    </div>
    <footer>
    <div>
        <p>Scandiweb Test assigment</p>
    </div>
     </footer>
</body>
</html>