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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <title>Product Add:.</title>
</head>
<body>
    <nav class="navbar">
        <h1>Product Add</h1>
        <nav class="navitems">
        <button type="submit" form="product_form">Save</button>
        <a href="/">Cancel</a>
        </nav>
    </nav>
    <?php
    if(isset($_SESSION['not_unique_sku'])):
    ?>
    <div class="notification-danger">
    <p>ERROR: This SKU already exist.</p>
    </div>
    <?php
    endif;
    unset($_SESSION['not_unique_sku']);
    ?>
    <form action="/PHP/saveProduct.php" method="POST" id="product_form">
        <label for="sku">SKU</label>
        <input type="text" name="sku" id="sku" required maxlength="250"><br>
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required><br>
        <label for="price">Price</label>
        <input type="decimal" name="price" id="price" required><br>

        <label for="productType">Type Switcher</label>
        <select name="productType" id="productType" onchange="myFunction()">
            <option value="DVD" id="DVD" selected>DVD</option>
            <option value="Furniture" id="Furniture" >Furniture</option>
            <option value="Book" id="Book" >Book</option>
        </select>
        <div id="DVDForm">
            <label for="size">Size (MB)</label>
            <input type="number" name="size" id="size" required>
            <p>Please, provide size(MB).</p>
        </div>
        <div id="FurnitureForm" style="display: none;">
            <label for="height">Height (CM)</label>
            <input type="number" name="height" id="height" required><br>
            <label for="width">Width (CM)</label>
            <input type="number" name="width" id="width" required><br>
            <label for="length">Length (CM)</label>
            <input type="number" name="length" id="length" required>
            <p>Please, provide dimensions height(CM), width(CM), length(CM).</p>
        </div>
        <div id="BookForm" style="display: none;">
            <label for="weight">Weight (KG)</label>
            <input type="number" name="weight" id="weight" required>
            <p>Please, provide weight (KG).</p>
        </div>
    </form>

    <div class="footer">
        <p>Scandiweb Test assigment</p>
    </div>
    <script src="/static/js/script.js">
        
        
    </script>
    <script>
        $('option[value="DVD"]').prop('selected', true);
        // JQuery to set DVD optionas default value, because attribute 'selected' was not working properly
    </script>
</body>
</html>