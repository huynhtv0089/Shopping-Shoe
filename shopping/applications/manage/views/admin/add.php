<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Quản trị viên
                            <small>Tạo mới</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label>Tên đăng nhập</label>
                                <input class="form-control" name="user" placeholder="Nhập tên đăng nhập" />
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" class="form-control" name="pass" placeholder="Nhập mật khẩu" />
                            </div>
                            <div class="form-group">
                                <label>Cấp độ quản trị</label>
                                <label class="radio-inline">
                                    <input name="role" value="1" checked="" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="2" type="radio">Mod
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default" name="submit" value="true">Thêm người quản trị</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->