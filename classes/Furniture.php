<?php
require_once('Product.php');

class Furniture extends Product
{
    public function __construct ($sku, $name, $price, $height, $width, $length)
    {
        $this->setSku(strtoupper($sku));
        $this->setName($name);
        $this->setPrice($price);
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLenght($length);
    }
}