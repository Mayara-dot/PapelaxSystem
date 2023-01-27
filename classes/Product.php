<?php

abstract class Product {

    protected $sku, $name, $price, $height, $width,
    $lenght, $weight, $size;
    public function getSku() { return $this->sku; }
    public function setSku($sku) { $this->sku = $sku; }
    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }
    public function getPrice() { return $this->price; }
    public function setPrice($price) { $this->price = $price; }
    public function getHeight() { return $this->height; }
    public function setHeight($height) { $this->height = $height; }
    public function getWidth() { return $this->width; }
    public function setWidth($width) { $this->width = $width; }
    public function getLenght() { return $this->lenght; }
    public function setLenght($lenght) { $this->lenght = $lenght; }
    public function getWeight() { return $this->weight; }
    public function setWeight($weight) { $this->weight = $weight; }
    public function getSize() { return $this->size; }
    public function setSize($size) { $this->size = $size; }
}