<?php
    include 'connection/connect.php';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "DELETE FROM category WHERE id = '$id'";
        $conn -> query($sql);
        header('location: ?page=category/category.php');
        exit();
    }
