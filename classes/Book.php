<?php
require_once('Product.php');

class Book extends Product
{
    public function __construct ($sku, $name, $price, $weight)
    {
        $this->setSku(strtoupper($sku));
        $this->setName($name);
        $this->setPrice($price);
        $this->setWeight($weight);
    }
}