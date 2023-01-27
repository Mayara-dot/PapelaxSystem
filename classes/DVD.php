<?php
require_once('Product.php');

class DVD extends Product
{
    public function __construct ($sku, $name, $price, $size)
    {
        $this->setSku(strtoupper($sku));
        $this->setName($name);
        $this->setPrice($price);
        $this->setSize($size);
    }
}