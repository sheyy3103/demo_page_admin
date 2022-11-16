<?php
    include 'connection/connect.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $product = $conn -> query("Select * from product where id = '$id'");
        $row = $product-> fetch_assoc();
        unlink('uploads/'.$row['image']);
        $sql = "DELETE FROM product WHERE id = '$id'";
        $conn -> query($sql);
        header('location: ?page=product/product.php');
        exit();
    }
?>