<?php
session_start();
$servername = "localhost";
$username  = "root";
$password = "";
$dbname = "ecom";

$con = mysqli_connect($servername, $username, $password, $dbname);
define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/ecom/');
define('SITE_PATH', 'http://localhost/ecom/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'media/product/');
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
