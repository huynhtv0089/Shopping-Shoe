<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cài đặt
                    <small>Logo, Banner & Dịch vụ</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <h3>Logo</h3>
                        <div>
                            <input style="width:100px; float:left; margin:0 10px 0 15px;" class="form-control" name="pic" value="<?php echo $this->infoLogo['pic']; ?>" />
                            <input style="width:150px;" class="form-control" name="picName" value="<?php echo $this->infoLogo['picName']; ?>" />
                        </div>
                    </div>
                    <button style="margin-left:15px;" type="submit" name="logo" value="true" class="btn btn-default">Thiết lập</button>
                </form>

                <form action="" method="POST" style="margin-top:50px;" enctype="multipart/form-data">
                    <div class="form-group">
                        <h3>Banner</h3>
                    </div>
                    <div class="form-group">
                        <label style="margin-left:20px;">Hình ảnh banner</label>
                        <input style="margin:5px 0 0 40px;" type="file" name="picBanner" />
                    </div>
                    <div class="form-group">
                        <label style="margin:15px 0 0 20px;">Thông tin banner</label>
                        <input style="width:200px; margin:15px 0 0 40px;" class="form-control" name="slideTitle_01" value="<?php echo $this->infoBanner['slideTitle_01']; ?>" />
                        <input style="width:450px; margin:8px 0 0 40px;" class="form-control" name="slidePara_01" value="<?php echo $this->infoBanner['slidePara_01']; ?>" />
                        <input style="width:200px; margin:15px 0 0 40px;" class="form-control" name="slideTitle_02" value="<?php echo $this->infoBanner['slideTitle_02']; ?>" />
                        <input style="width:450px; margin:8px 0 0 40px;" class="form-control" name="slidePara_02" value="<?php echo $this->infoBanner['slidePara_02']; ?>" />
                        <input style="width:200px; margin:15px 0 0 40px" class="form-control" name="slideTitle_03" value="<?php echo $this->infoBanner['slideTitle_03']; ?>" />
                        <input style="width:450px; margin:8px 0 0 40px;" class="form-control" name="slidePara_03" value="<?php echo $this->infoBanner['slidePara_03']; ?>" />
                    </div>
                    <button style="margin-left:15px;" type="submit" name="banner" value="true" class="btn btn-default">Thiết lập</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->