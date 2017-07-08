<?php

    $checked = '';
    if($this->showAdmin['role'] == 1) {
        $checked = '<label class="radio-inline">
                            <input name="role" value="1" checked="" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="role" value="2" type="radio">Mod
                    </label>';
    }else if($this->showAdmin['role'] == 2) {
        $checked = '<label class="radio-inline">
                            <input name="role" value="1" type="radio">Admin
                        </label>
                        <label class="radio-inline">
                            <input name="role" value="2" checked="" type="radio">Mod
                    </label>';
    }

?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị viên
                    <small><?php echo $this->showAdmin['username']; ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Tên đăng nhập</label>
                        <input class="form-control" name="username" value="<?php echo $this->showAdmin['username']; ?>" disabled />
                    </div>
                    <div class="form-group">
                        <label>Mật khẩu mới</label>
                        <input type="password" class="form-control" name="newPassword" placeholder="Nhập mật khẩu mới" />
                    </div>
                    <div class="form-group">
                        <label>Cấp độ quản trị</label>
                        <?php echo $checked; ?>
                    </div>
                    <button type="submit" class="btn btn-default" name="submit" value="true">Chỉnh sửa</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->