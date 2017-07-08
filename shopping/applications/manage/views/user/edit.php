<?php
    $form = '';
    foreach($this->edit_user as $key) {
        $form = '<div class="form-group">
                    <label>Username</label>
                    <input class="form-control" name="username" value="'.$this->edit_user['username'].'" disabled />
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input class="form-control" name="firstname" value="'.$this->edit_user['firstname'].'" />
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input class="form-control" name="lastname" value="'.$this->edit_user['lastname'].'" />
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" value="'.$this->edit_user['password'].'" />
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input class="form-control" name="email" value="'.$this->edit_user['email'].'" />
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="address" value="'.$this->edit_user['address'].'" />
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