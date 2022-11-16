<?php
include 'connection/connect.php';
$name = isset($_GET['name']) ? $_GET['name'] : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
$sql = "Select p.*, c.name as category_name from product p join category c on p.category_id = c.id WHERE p.name LIKE '%$name%' and p.status like '%$status%'";

$products = $conn->query($sql);
$total = mysqli_num_rows($products);
$limit = 4;
$total_page = ceil($total / $limit);
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
$start = ($current_page - 1) * $limit;
$products = $conn->query("$sql LIMIT $start, $limit");
$url = $_SERVER['REQUEST_URI'];

if (!empty(strpos($url,'&p='))) {
    $urli = substr($url,0,-4);
}else{
    $urli = $url;
}
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            ALL PRODUCT
            <small>here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="/session11/admin"><i class="fa fa-dashboard"></i>Home</a></li>
            <li>Product management</li>
            <li class="active"><a href="?page=product/product.php">All product</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-body">
                <div class="container">
                    <form action="product/search_product.php" method="GET">
                        <label for="" class="h3">Search<small>&nbsp;here</small></label>
                        <div class="form-group" style="display: flex; width: 60%;">
                            <input type="text" class="form-control" name="name" style="width: 55%;" id="" aria-describedby="helpId" placeholder="Enter product's name..." value="<?= isset($name) ? $name : ''; ?>">
                            <select name="status" class="custom-select form-control" style="width: 30%;">
                                <option value="">-- Choose status --</option>
                                <option value="1" <?= $status == 1 ? 'selected' : ''; ?>>In stock</option>
                                <option value="2" <?= $status == 2 ? 'selected' : ''; ?>>Out of stock</option>
                            </select>
                            <button type="submit" name="submit" class="btn btn-warning" style="border-radius: 0;">Search</button>
                        </div>
                    </form>
                </div>
                <div id="example2_wrapper" class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-12">
                            <table class="table table-bordered table-striped dataTable">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" scope="col">ID</th>
                                        <th class="sorting" scope="col">Product name</th>
                                        <th class="sorting" scope="col">Price</th>
                                        <th class="sorting" scope="col">Sale price</th>
                                        <th class="sorting" scope="col">Image</th>
                                        <th class="sorting" scope="col">Status</th>
                                        <th class="sorting" scope="col">Category</th>
                                        <th class="sorting" scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $key => $value) : ?>
                                        <tr role="row" class="odd">
                                            <th scope="row">
                                                <?= $value['id']; ?>
                                            </th>
                                            <td>
                                                <?= $value['name']; ?>
                                            </td>
                                            <td>
                                                <?php if ($value['sale_price'] > 0) { ?>
                                                    <strong><strike class="text-muted"><?= $value['price']; ?></strike></strong>
                                                <?php } else { ?>
                                                    <strong><?= $value['price']; ?></strong>
                                                <?php } ?>
                                            </td>
                                            <td>
                                                <?= $value['sale_price'] == 0 ? "<span class='text-muted'>0</span>" : $value['sale_price']; ?>
                                            </td>
                                            <td>
                                                <img src="uploads/<?= $value['image']; ?>" alt="..." height="50px" width="auto">
                                            </td>
                                            <td>
                                                <?= $value['status'] == 1 ? "<span class='text-success'>In stock</span>" : "<span class='text-warning'>Out of stock</span>"; ?>
                                            </td>
                                            <th>
                                                <?= $value['category_name']; ?>
                                            </th>
                                            <td style="width: 25%;">
                                                <a href="?page=product/edit_product.php&id=<?= $value['id'] ?>" type="button" class="btn btn-primary text-uppercase" style="border-radius: 0;">edit</a>
                                                <a href="?page=product/delete_product.php&id=<?= $value['id'] ?>" onclick="return confirm('Are you sure about that?')" type="button" class="btn btn-danger text-uppercase" style="border-radius: 0;">delete</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="<?= $urli ?>&p=<?= $current_page > 1 ? $current_page - 1 : 1; ?>">&laquo;</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_page; $i++) : ?>
                            <li class="page-item <?= $i == $current_page ? 'active' : ''; ?>"><a class="page-link" href="<?= $urli ?>&p=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php endfor; ?>
                        <li class="page-item">
                            <a class="page-link" href="<?= $urli ?>&p=<?= $current_page < $total_page ? $current_page + 1 : $total_page; ?>">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>