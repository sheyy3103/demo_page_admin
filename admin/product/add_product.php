<?php
include 'connection/connect.php';
$categories = $conn->query("Select * from category");
$products = $conn->query("Select * from products");
$errors = [];
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $sale_price = $_POST['sale_price'];
    $status = $_POST['status'];
    $category_id = $_POST['category_id'];
    if (empty($name)) {
        $errors['name'] = 'Product name cannot be blank';
    }
    if (empty($price)) {
        $errors['price'] = 'Product price cannot be blank';
    } else if ($price < 0) {
        $errors['price'] = 'Product price must be greater than 0';
    }
    if ($sale_price < 0) {
        $errors['sale_price'] = 'Product sale price must be greater or equal than 0';
    } else if ($sale_price > $price) {
        $errors['price'] = 'Sale price cannot be greater than price';
    }
    if (empty($status)) {
        $errors['status'] = 'Please select status';
    }
    if (empty($category_id)) {
        $errors['category'] = 'Please select category';
    }
    if (!empty($_FILES['image']['name'])) {
        $file = $_FILES['image'];
        $file_name = time() . '-' . $file['name'];
        if (preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $file_name)) {
            move_uploaded_file($file['tmp_name'], 'uploads/' . $file_name);
        } else {
            $errors['image'] = 'Invalid image';
        }
    } else {
        $errors['image'] = 'Please select image';
    }
    if (empty($errors)) {
        $sql = "Insert into product(name,price,sale_price,image,status,category_id) values ('$name',$price,$sale_price,'$file_name',$status,$category_id)";
        $conn->query($sql);
        header('location: ?page=product/product.php');
        // echo "<script> location.href = '?page=category/category.php'</script>";
        exit();
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add Prouct
            <small>here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/session11/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li>Category management</li>
            <li class="active"><a href="?page=category/add_category.php">Add category</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">Product name</label>
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter new product name here..." value="<?= isset($name) ? $name : ''; ?>">
                        <?php if (!empty($errors['name'])) : ?>
                            <strong class="text-danger"><?= $errors['name']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" name="price" class="form-control mb-3" placeholder="Enter price here..." value="<?= isset($price) ? $price : ''; ?>">
                        <?php if (!empty($errors['price'])) : ?>
                            <strong class="text-danger"><?= $errors['price']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Sale_price</label>
                        <input type="text" name="sale_price" class="form-control mb-3" placeholder="Enter sale price here..." value="<?= isset($sale_price) ? $sale_price : ''; ?>">
                        <?php if (!empty($errors['sale_price'])) : ?>
                            <strong class="text-danger"><?= $errors['sale_price']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" class="form-control mb-3" placeholder="Choose image...">
                        <?php if (!empty($errors['image'])) : ?>
                            <strong class="text-danger"><?= $errors['image']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="custom-select form-control">
                            <option value="" selected>-- Select --</option>
                            <option value="1">In stock</option>
                            <option value="2">Out of stock</option>
                        </select>
                        <?php if (!empty($errors['status'])) : ?>
                            <strong class="text-danger"><?= $errors['status']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" class="custom-select form-control">
                            <option value="" selected>-- Select --</option>
                            <?php foreach ($categories as $key => $value) : ?>
                                <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if (!empty($errors['category'])) : ?>
                            <strong class="text-danger"><?= $errors['category']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <button type="submit" name="submit" class=" btn btn-success text-uppercase" style="border-radius: 0; width: 10%; padding: 7px 0;">Add</button>
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>