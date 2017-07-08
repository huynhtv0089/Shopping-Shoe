<?php
    $form = '';

    foreach($this->loadCategory as $key) {
        $form = '<div class="form-group">
                    <label>Tên thể loại</label>
                    <input class="form-control" name="name" value="'.$this->loadCategory['name'].'" />
                </div>
                <div class="form-group">
                    <label>Phân loại</label>
                    <input class="form-control" name="classify" value="'.$this->loadCategory['classify'].'" />
                </div>';             
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="#" method="POST">
                    <?php echo $form; ?>
                    <button type="submit" name="submit" value="true" class="btn btn-default">Sửa thể loại</button>
                    <button name="back" value="true" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->