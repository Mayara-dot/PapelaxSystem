<?php
require_once('../static/con/Con.php');
require_once('../classes/Items.php');
$DB = new DB_CONNECT;
$DB->connect();

$sku = $_POST['check_list'];
$btnDelete = $_POST['delete-product-btn'];
$delete = new Item();
$delete->deleteProducts($DB->getConnection(), $sku, $btnDelete);