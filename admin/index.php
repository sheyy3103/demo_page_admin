<?php ob_start() ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sheyy | Admin page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/AdminLTE.css">
    <link rel="stylesheet" href="assets/css/_all-skins.min.css">
    <link rel="stylesheet" href="assets/css/jquery-ui.css">
    <link rel="stylesheet" href="assets/css/style.css" />
    <script src="assets/assets/js/angular.min.js"></script>
    <script src="assets/assets/js/app.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">

        <?php include 'layouts/header.php'; ?>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <?php include 'layouts/sidebar.php'; ?>

        <!-- =============================================== -->
        <?php if (isset($_GET['page'])) {
            $page = $_GET['page'];
        } else {
            $page = 'dashboard/index.php';
        }
        include $page;
        ?>
        <!-- Content Wrapper. Contains page content -->
        <!-- /.content-wrapper -->

        <?php include 'layouts/footer.php'; ?>

    </div>
    <!-- ./wrapper -->

    <!-- jQuery 3 -->

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-ui.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/adminlte.min.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/tinymce/tinymce.min.js"></script>
    <script src="assets/tinymce/config.js"></script>
    <script src="assets/js/function.js"></script>
</body>

</html>