    <?php
    $bootstrapCoreCss = '<link href="'. CSS_DIST_BOOTSTRAP .'bootstrap.min.css" rel="stylesheet">';
    $metisMenuCss = '<link href="'. DIST_METIS_MENU .'metisMenu.min.css" rel="stylesheet">';
    $customCss = '<link href="'. CSS_DIST .'sb-admin-2.css" rel="stylesheet">';
    $customFonts = '<link href="'. CSS_FONT_AWESOME .'font-awesome.min.css" rel="stylesheet" type="text/css">';
    $dataTablesCss = '<link href="'. THREE .'dataTables.bootstrap.css" rel="stylesheet">';
    $dataTablesResponsiveCss = '<link href="'. CSS_DATATABLES_RESPONSIVE .'dataTables.responsive.css" rel="stylesheet">';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Thực tập chuyên môn">
    <meta name="author" content="">
    <title>Trung tâm quản trị</title>

    <!-- Bootstrap Core CSS -->
    <?php echo $bootstrapCoreCss; ?>

    <!-- MetisMenu CSS -->
    <?php echo $metisMenuCss; ?>

    <!-- Custom CSS -->
    <?php echo $customCss; ?>

    <!-- Custom Fonts -->
    <?php echo $customFonts; ?>

    <!-- DataTables CSS -->
    <?php echo $dataTablesCss; ?>

    <!-- DataTables Responsive CSS -->
    <?php echo $dataTablesResponsiveCss; ?>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php?module=home&controller=home&action=index">Shopping Online</a>
            </div>
            <!-- /.navbar-header -->
            <?php if(Session::get('timeoutManager') + 1800 > time()) { ?>
            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php echo Session::get('username'); ?>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="index.php?module=manage&controller=admin&action=changepass"><i class="fa fa-gear fa-fw"></i> Đổi mật khẩu</a></li>
                        <li class="divider"></li>
                        <li><a href="index.php?module=manage&controller=admin&action=logout"><i class="fa fa-sign-out fa-fw"></i> Đăng xuất</a></li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
            <?php 
            } else {
                unset($_SESSION['flagManager']);
                unset($_SESSION['idManager']);
                unset($_SESSION['username']);
                unset($_SESSION['role']);
                unset($_SESSION['timeoutManager']);
                header('Location: index.php?module=manage&controller=admin&action=logout');
            }
            ?>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <?php if(Session::get('role') != 2) { ?>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Thể loại<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=category&action=index">Dánh sách thể thoại</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=category&action=add">Thêm thể loại</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i> Sản phẩm<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=product&action=index">Danh sách sản phẩm</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=product&action=add">Thêm sản Phẩm</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Khách hàng<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=user&action=index">Danh sách khách hàng</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=classifyUser&action=index">Phân loại khách hàng</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=classifyUser&action=add">Thêm phân loại khách hàng</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o fa-fw"></i> Tin nhắn & Thư theo dõi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=message&action=index">Danh sách tin nhắn</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=mail&action=index">Danh sách thư theo dõi</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php if(Session::get('role') != 2) { ?>
                        <li>
                            <a href="#"><i class="fa fa-male" aria-hidden="true"></i> Người quản trị<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=admin&action=list">Danh sách</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=admin&action=add">Thêm mới</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-gear fa-fw"></i> Cài đặt</a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php?module=manage&controller=settings&action=index">Logo & Banner</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=settings&action=tagPolicy">Tag & Chính sách</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=settings&action=advertisement">Quảng cáo</a>
                                </li>
                                <li>
                                    <a href="index.php?module=manage&controller=settings&action=footer">Cuối trang web</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>