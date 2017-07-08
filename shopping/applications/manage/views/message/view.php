
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo $this->info['name']; ?>
                    <small><?php echo $this->info['mail']; ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nội dung: <i><?php echo $this->info['subject']; ?></i></label>
                        <textarea class="form-control" rows="3" disabled><?php echo $this->info['message']; ?></textarea>
                    </div>
                    <button type="submit" name="back" value="true" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->