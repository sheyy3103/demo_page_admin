<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="assets/images/sabo.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>Fanboiz Sabo1</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->

        <ul class="sidebar-menu" data-widget="tree">

            <li>
                <a href="/session11/admin">
                    <i class="fa fa-th"></i> <span>Quản lý Menu </span>
                    <span class="pull-right-container">
                        <small class="label pull-right bg-green">FE</small>
                    </span>
                </a>
            </li>

            <li class="treeview">
                <a href="">
                    <i class="fa fa-dashboard"></i> <span>Category management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=category/category.php"><i class="fa fa-circle-o"></i> All category</a></li>
                    <li><a href="?page=category/add_category.php"><i class="fa fa-circle-o"></i> Add category</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="">
                    <i class="fa fa-dashboard"></i> <span>Product management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="?page=product/product.php"><i class="fa fa-circle-o"></i> All product</a></li>
                    <li><a href="?page=product/add_product.php"><i class="fa fa-circle-o"></i> Add product</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>