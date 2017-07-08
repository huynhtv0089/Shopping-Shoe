<?php
    $sizeView = explode(", ", $this->editSize['size']);
    $check_box = '';
    foreach($sizeView as $key => $value) {
        $check_box .= '<label class="checkbox-inline"><input type="checkbox" name="size[]" value="'.$value.'" checked>'.$value.'</label>';   
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="#" method="POST">
                    <div class="form-group">
                        <label>Chọn kích thước</label> <br>
                        <?php echo $check_box; ?><br>
                    </div>
                    <div class="form-group">
                        <label>Thêm kích thước mới</label>
                        <input class="form-control" name="newSize" placeholder="A, B, C" />
                    </div>
                    <button type="submit" name="next" value="true" class="btn btn-default">Tiếp theo</button>
                    <button name="back" value="true" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->