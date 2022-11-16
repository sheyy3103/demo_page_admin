<?php
include 'connection/connect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $products = $conn->query("Select * from product where category_id = '$id'");
    foreach ($products as $key => $value) {
        unlink('uploads/' . $value['image']);
        $conn->query("Delete from product where category_id = $id");
    }
    $sql = "DELETE FROM category WHERE id = '$id'";
    $conn->query($sql);
    header('location: ?page=category/category.php');
    exit();
}
?>
