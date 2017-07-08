<?php
    if($_GET['change'] == 'success')
        $success = '<div class="alert alert-success">Thêm thành công</div>';
    if($_GET['change'] == 'danger')
        $danger = '<div class="alert alert-danger">Thêm thất bại</div>';
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị viên
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php echo $success; ?>
            <?php echo $danger; ?>
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input class="form-control" name="txtUser" value="<?php echo Session::get('username'); ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu hiện tại</label>
                        <input type="password" class="form-control" name="password" placeholder="Nhập mật khẩu hiện tại" />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" name="newPassword" placeholder="Nhập mật khẩu mới" />
                    </div>
                    <div class="form-group">
                        <label>Nhập lại mật khẩu mới</label>
                        <input type="password" class="form-control" name="reNewPassword" placeholder="Nhập lại mật khẩu mới" />
                    </div>
                    <button type="submit" class="btn btn-default" name="submit" value="true">Thay đổi</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->