<?php
    $size = explode(", ", $this->item['size']);
    $div = '';
    foreach($size as $key) {
        $div .= '<div class="form-group">
                        <label>Kích thước '.$key.'</label>
                        <input class="form-control" name="'.$key.'" value="0" />
                </div>';
    }

    if($_GET['add'] == 'success')
        $success = '<div class="alert alert-success">Add success</div>';
    $this->getValue = $_POST;
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thêm số lượng sản phẩm 
                    <small><?php echo $this->item['name'] ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $success; ?>
                <form action="#" method="POST">
                    <?php echo $div; ?>
                    <button type="submit" name="submit" value="true" class="btn btn-default">Thêm mới</button>
                    <button name="back" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->