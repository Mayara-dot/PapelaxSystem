<?php
require_once('../static/con/Con.php');
require_once('../classes/Items.php');

session_start();
$DB = new DB_CONNECT;
$DB->connect();

$args = [];

$sku = isset($_POST['sku']) ? $args['sku'] = $_POST['sku'] : null;
$name = isset($_POST['name']) ? $args['name'] = $_POST['name'] : null;
$price = isset($_POST['price']) ? $args['price'] = $_POST['price'] : null;

$size = isset($_POST['size']) ? $args['size'] = $_POST['size'] : null; //DVD

$weight = isset($_POST['weight']) ? $args['weight'] = $_POST['weight'] : null; //BOOK

$height = isset($_POST['height']) ? $args['height'] = $_POST['height'] : null; //FURNITURE
$width = isset($_POST['width']) ? $args['width'] = $_POST['width'] : null;//FURNITURE
$length = isset($_POST['length']) ? $args['length'] = $_POST['length'] : null;//FURNITURE

$type = isset($_POST['productType']) ? isset($_POST['productType']) : 'DVD';

$Product = new Item();
$Product->$type($DB->getConnection(), $args);
?>