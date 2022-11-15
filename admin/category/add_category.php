<?php
include 'connection/connect.php';
$errors = [];
if (isset($_POST['name'], $_POST['status'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    if (empty($name)) {
        $errors['name'] = 'Category name cannot be blank';
    } else {
        $category = $conn->query("Select * from category");
        foreach ($category as $key => $value) {
            if ($name == $value['name']) {
                $errors['name'] = 'Category name is unique, please enter a different category name';
                break;
            }
        }
    }
    if (empty($status)) {
        $errors['status'] = 'Please select status';
    }
    if (empty($errors)) {
        $sql = "Insert into category(name,status) values ('$name',$status)";
        $conn->query($sql);
        header('location: ?page=category/category.php');
        // echo "<script> location.href = '?page=category/category.php'</script>";
        exit();
    }
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Add CATEGORY
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
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="">Category name</label>
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter new category name here..." value="<?= isset($name) ? $name : ''; ?>">
                        <?php if (!empty($errors['name'])) : ?>
                            <strong class="text-danger"><?= $errors['name']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="custom-select form-control">
                            <option value="" selected>-- Select --</option>
                            <option value="1">Display</option>
                            <option value="2">Hidden</option>
                        </select>
                        <?php if (!empty($errors['status'])) : ?>
                            <strong class="text-danger"><?= $errors['status']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class=" btn btn-success text-uppercase" style="border-radius: 0; width: 10%; padding: 7px 0;">Add</button>
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>