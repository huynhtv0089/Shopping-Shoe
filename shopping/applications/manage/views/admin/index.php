<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Khóa Học Lập Trình Laravel Framework 5.x Tại Khoa Phạm">
    <meta name="author" content="">

    <title>Quản trị viên</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo CSS_DIST_BOOTSTRAP; ?>bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo DIST_METIS_MENU; ?>metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo CSS_DIST; ?>sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo CSS_FONT_AWESOME; ?>font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

  <div class="container">
          <div class="row">
              <div class="col-md-4 col-md-offset-4">
                  <div class="login-panel panel panel-default">
                      <div class="panel-heading">
                          <h3 class="panel-title">Vui lòng đăng nhập</h3>
                      </div>
                      <div class="panel-body">
                          <form role="form" action="" method="POST">
                              <fieldset>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Tên đăng nhập" name="user" type="text" autofocus>
                                  </div>
                                  <div class="form-group">
                                      <input class="form-control" placeholder="Mật khẩu" name="pass" type="password" value="">
                                  </div>
                                  <button type="submit" name="login" value="true" class="btn btn-lg btn-success btn-block">Đăng nhập</button>
                              </fieldset>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

    <!-- jQuery -->
    <script src="<?php echo DIST_JQUERY; ?>jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo JS_DIST_BOOTSTRAP; ?>bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo DIST_METIS_MENU; ?>metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo JS_DIST; ?>sb-admin-2.js"></script>

</body>

</html>