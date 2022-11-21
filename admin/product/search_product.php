<?php
$name = isset($_GET['name']) ? $_GET['name'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
header("location: ../?page=product/product.php&name=$name&status=$status");
exit();
