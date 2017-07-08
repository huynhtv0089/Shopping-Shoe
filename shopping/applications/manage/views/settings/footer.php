<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cài đặt
                    <small>Thông tin, Bản đồ, Bản quyền</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:90px">
                <form action="" method="POST">
                    <div class="form-group">
                        <h3>Khung thông tin 1</h3>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name0" value="<?php echo $this->footerInfo1['0']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name1" value="<?php echo $this->footerInfo1['1']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name2" value="<?php echo $this->footerInfo1['2']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name3" value="<?php echo $this->footerInfo1['3']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name4" value="<?php echo $this->footerInfo1['4']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name5" value="<?php echo $this->footerInfo1['5']['name']; ?>" />
                        </div>
                    </div>
                    <button style="margin-left:15px;" type="submit" name="submitFr1" value="true" class="btn btn-default">Thiết lập</button>
                </form>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:90px">
                <form action="" method="POST">
                    <div class="form-group">
                        <h3>Khung thông tin 2</h3>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name0" value="<?php echo $this->footerInfo2['0']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name1" value="<?php echo $this->footerInfo2['1']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name2" value="<?php echo $this->footerInfo2['2']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name3" value="<?php echo $this->footerInfo2['3']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name4" value="<?php echo $this->footerInfo2['4']['name']; ?>" />
                        </div>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="name5" value="<?php echo $this->footerInfo2['5']['name']; ?>" />
                        </div>
                    </div>
                    <button style="margin-left:15px;" type="submit" name="submitFr2" value="true" class="btn btn-default">Thiết lập</button>
                </form>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:90px">
                <form action="" method="POST">
                    <div class="form-group">
                        <h3>Bản đồ</h3>
                        <div>
                            <textarea style="margin:0 10px 10px 15px;" class="form-control" rows="3" name="codeMap"><?php echo $this->map['iframe'] ?></textarea>
                        </div>
                    </div>
                    <button style="margin-left:15px;" type="submit" name="submitMap" value="true" class="btn btn-default">Thiết lập</button>
                </form>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:50px">
                <form action="" method="POST">
                    <div class="form-group">
                        <h3>Bản quyền</h3>
                        <div>
                            <input style="margin:0 10px 10px 15px;" class="form-control" name="nameLicense" value="<?php echo $this->license['name']; ?>" />
                        </div>
                    </div>
                    <button style="margin-left:15px;" type="submit" name="submitLicense" value="true" class="btn btn-default">Thiết lập</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->