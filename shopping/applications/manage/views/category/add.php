<?php
    $option = '';
    foreach($this->categorylist as $key => $value)
        if($value['parents'] == 0)
            $option .= '<option value="'.$value['id'].'">'.$value['name'].'</option>';
?>
<!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
                            <small>Thêm mới</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <form action="#" method="POST">
                            <div class="form-group">
                                <label>Tên thể loại</label>
                                <input class="form-control" name="name" placeholder="Vui lòng nhập tên thể loại" />
                            </div>
                            <div class="form-group">
                                <label>Phân loại</label>
                                <select class="form-control" name="parents">
                                        <option value=0>Tạo 1 thể loại mới</option>
                                        <?php echo $option; ?>
                                </select>
                            </div>
                            <button type="submit" name="submit" value="true" class="btn btn-default">Thêm thể loại</button>
                            <button type="submit" name="back" class="btn btn-default">Quay lại</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->