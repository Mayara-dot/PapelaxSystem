<?php
require_once('Product.php');
require_once('DVD.php');
require_once('Book.php');
require_once('Furniture.php');

class Item extends Product{

    function deleteProducts($conn, $sku, $btnDelete) {
        try {
            if (isset($btnDelete)) {
                if (!empty($sku)) {
                    foreach ($sku as $record) {
                        mysqli_begin_transaction($conn);
                        $queryDVD = "DELETE FROM heroku_ec6c458e2e8f5f7.DVD
                        WHERE SKU = '{$record}';";
                        $queryBook = "DELETE FROM heroku_ec6c458e2e8f5f7.Book 
                        WHERE SKU = '{$record}';";
                        $queryFurniture = "DELETE FROM heroku_ec6c458e2e8f5f7.Furniture 
                        WHERE SKU = '{$record}';";
                        mysqli_query($conn, $queryDVD);
                        mysqli_query($conn, $queryBook);
                        mysqli_query($conn, $queryFurniture);
                        mysqli_commit($conn);
                        header("Location: /");
                    }
                } else {
                    header("Location: /");
                }
            }
        } catch (PDOException $e) {
            echo 'Database Error ' . $e->getMessage() . ' in ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }
   
	public function validateSKU($sku, $conn)
    {
        $querySELECT = "SELECT COUNT(*) AS total FROM heroku_ec6c458e2e8f5f7.DVD WHERE SKU = '{$sku}'
        UNION ALL
        SELECT COUNT(*) AS total FROM heroku_ec6c458e2e8f5f7.Furniture WHERE SKU = '{$sku}'
        UNION ALL    
        SELECT COUNT(*) AS total FROM heroku_ec6c458e2e8f5f7.Book WHERE SKU = '{$sku}';";
        $result = mysqli_query($conn, $querySELECT);
        $row = mysqli_fetch_assoc($result);
        if ($row['total'] >= 1) {
            return true;
        }
        return false;
    }

    public function DVD($conn, $args) {
        $sku = $args['sku'];
        $name = $args['name'];
        $price = $args['price'];
        $size = $args['size'];
        $DVD = new DVD($sku, $name, $price, $size);
        try {
            $sku = mysqli_real_escape_string($conn, $DVD->getSku());
            if ($this->validateSKU($sku, $conn)) {
                $_SESSION['not_unique_sku'] = true;
                header("Location: ../static/html/addproduct.php");
                exit();
            } else {
                $name = mysqli_real_escape_string($conn, $DVD->getName());
                $price = mysqli_real_escape_string($conn, $DVD->getPrice());
                $size = mysqli_real_escape_string($conn, $DVD->getSize());
                $queryINSERT = "INSERT INTO heroku_ec6c458e2e8f5f7.DVD (SKU, name, price, size, date) VALUES ('{$sku}', '{$name}', {$price}, {$size}, NOW());";
                $conn->query($queryINSERT);
                $_SESSION['success'] = true;
                header("Location: /");                
            } 
            $conn->close();
            exit();      
        } catch (PDOException $e) {
            echo 'Database Error // Erro de conexão ' . $e->getMessage() . ' in / em ' . $e->getFile() .
                ': ' . $e->getLine();
        }

    }

    public function Book($conn, $args) {
        $sku = $args['sku'];
        $name = $args['name'];
        $price = $args['price'];
        $weight = $args['weight'];
        $Book = new Book($sku, $name, $price, $weight);
        try {
            $sku = mysqli_real_escape_string($conn, $Book->getSku());
            if ($this->validateSKU($sku, $conn)) {
                $_SESSION['not_unique_sku'] = true;
                header("Location: ../static/html/addproduct.php");
                exit();
            } else {
                $name = mysqli_real_escape_string($conn, $Book->getName());
                $price = mysqli_real_escape_string($conn, $Book->getPrice());
                $weight = mysqli_real_escape_string($conn, $Book->getWeight());
                $queryINSERT  = "INSERT INTO heroku_ec6c458e2e8f5f7.Book (SKU, name, price, weight, date) VALUES ('{$sku}', '{$name}', {$price}, {$weight}, NOW());";
                $conn->query($queryINSERT);
                $_SESSION['success'] = true;
                header("Location: /");
            } 
            $conn->close();
            exit();      
        } catch (PDOException $e) {
            echo 'Database Error // Erro de conexão ' . $e->getMessage() . ' in / em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

    public function Furniture($conn, $args) {
        $sku = $args['sku'];
        $name = $args['name'];
        $price = $args['price'];
        $height = $args['height'];
        $width = $args['width'];
        $length = $args['length'];
        $Furniture = new Furniture($sku, $name, $price, $height, $width, $length);
        try {
            $sku = mysqli_real_escape_string($conn, $Furniture->getSku());
            if ($this->validateSKU($sku, $conn)) {
                $_SESSION['not_unique_sku'] = true;
                header("Location: ../static/html/addproduct.php");
                exit();
            } else {
                $name = mysqli_real_escape_string($conn, $Furniture->getName());
                $price = mysqli_real_escape_string($conn, $Furniture->getPrice());
                $height = mysqli_real_escape_string($conn, $Furniture->getHeight());
                $width = mysqli_real_escape_string($conn, $Furniture->getWidth());
                $length = mysqli_real_escape_string($conn, $Furniture->getLenght());
                $queryINSERT  = "INSERT INTO heroku_ec6c458e2e8f5f7.Furniture (SKU, name, price, height, width, length, date) VALUES ('{$sku}', '{$name}', {$price}, {$height}, {$width}, {$length}, NOW());";
                $conn->query($queryINSERT);
                $_SESSION['success'] = true;
                header("Location: /");
            } 
            $conn->close();
            exit();      
        } catch (PDOException $e) {
            echo 'Database Error // Erro de conexão ' . $e->getMessage() . ' in / em ' . $e->getFile() .
                ': ' . $e->getLine();
        }
    }

}