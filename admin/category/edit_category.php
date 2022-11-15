<?php
include 'connection/connect.php';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$result = $conn -> query("Select * from category where id = '$id'");
$row = $result -> fetch_assoc();
$errors = [];
if (isset($_POST['name'], $_POST['status'])) {
    $name = $_POST['name'];
    $status = $_POST['status'];
    if (empty($name)) {
        $errors['name'] = 'Category name cannot be blank';
    } else {
        $category = $conn->query("Select * from category where id <> '$id'");
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
        $sql = "Update category set name = '$name', status = $status where id = '$id'";
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
            <li class="active"><a href="?page=category/edit_category.php">Edit category</a></li>
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
                        <input type="text" name="name" class="form-control mb-3" placeholder="Enter new category name here..." value="<?= isset($name) ? $name : $row['name'];?>">
                        <?php if (!empty($errors['name'])) : ?>
                            <strong class="text-danger"><?= $errors['name']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" class="custom-select form-control">
                            <option value="">-- Select --</option>
                            <option value="1" <?= $row['status'] == 1 ? 'selected' : '';?>>Display</option>
                            <option value="2" <?= $row['status'] == 2 ? 'selected' : '';?>>Hidden</option>
                        </select>
                        <?php if (!empty($errors['status'])) : ?>
                            <strong class="text-danger"><?= $errors['status']; ?></strong>
                        <?php endif; ?>
                    </div>
                    <button type="submit" class=" btn btn-primary text-uppercase" style="border-radius: 0; width: 10%; padding: 7px 0;">Edit</button>
                </form>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>