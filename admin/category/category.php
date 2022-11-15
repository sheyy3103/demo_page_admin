<?php
include 'connection/connect.php';
$sql = "Select * from category";
$categories = $conn->query($sql);
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ALL CATEGORY
            <small>here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/session11/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li>Category management</li>
            <li class="active"><a href="?page=category/category.php">All category</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div id="example2_wrapper" class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" scope="col">ID</th>
                                        <th class="sorting" scope="col">Category name</th>
                                        <th class="sorting" scope="col">Status</th>
                                        <th class="sorting" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categories as $key => $value) : ?>
                                        <tr role="row" class="odd">
                                            <th scope="row"><?= $value['id']; ?></th>
                                            <td><?= $value['name']; ?></td>
                                            <td><?= $value['status'] == 1 ? "<span class='text-success'>Display</span>" : "<span class='text-warning'>Hidden</span>"; ?></td>
                                            <td style="width: 25%;">
                                                <a href="?page=category/edit_category.php&&id=<?= $value['id']?>" type="button" class="btn btn-primary text-uppercase" style="border-radius: 0;">edit</a>
                                                <a href="?page=category/delete_category.php&&id=<?= $value['id']?>" onclick="return confirm('Are you sure about that?')" type="button" class="btn btn-danger text-uppercase" style="border-radius: 0;">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>