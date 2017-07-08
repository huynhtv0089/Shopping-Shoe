<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cài đặt
                    <small>Quảng cáo</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:80px;">
                <h3>Khu vực nội dung</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Chiều dài</label>
                        <input class="form-control" name="heightCenter" value="<?php echo $this->infoAdsCenter['width'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Chiều rộng</label>
                        <input class="form-control" name="widthCenter" value="<?php echo $this->infoAdsCenter['height'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh quảng cáo</label>
                        <input type="file" name="picAdsCenter" />
                    </div>
                     <div class="form-group">
                        <label>Mã code</label>
                        <textarea class="form-control" rows="3" name="codeCenter"><?php echo $this->infoAdsCenter['code'] ?></textarea>
                    </div>
                    <button type="submit" name="adsCenter" value="true" class="btn btn-default">Thiết lập</button>
                <form>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px;">
                <h3>Khu vực bên trái</h3>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Chiều dài</label>
                        <input class="form-control" name="heightLeft" value="<?php echo $this->infoAdsleft['width'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Chiều rộng</label>
                        <input class="form-control" name="widthLeft" value="<?php echo $this->infoAdsleft['height'] ?>" />
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh quảng cáo</label>
                        <input type="file" name="picAdsLeft" />
                    </div>
                     <div class="form-group">
                        <label>Mã code</label>
                        <textarea class="form-control" rows="3" name="codeLeft"><?php echo $this->infoAdsleft['code'] ?></textarea>
                    </div>
                    <button type="submit" name="adsLeft" value="true" class="btn btn-default">Thiết lập</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->