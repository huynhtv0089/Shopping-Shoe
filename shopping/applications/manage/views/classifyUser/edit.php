<?php
    $form = '';
    foreach($this->load_classify_user as $key => $value) {
        $form = '<div class="form-group">
                    <label>Name</label>
                    <input class="form-control" name="name" value="'.$value['name'].'" disabled />
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <input class="form-control" name="description" value="'.$value['description'].'" />
                </div>';             
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>Edit</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="#" method="POST">
                    <?php echo $form; ?>
                    <button type="submit" name="submit" value="true" class="btn btn-default">Edit</button>
                    <button name="back" value="true" class="btn btn-default">Back</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->