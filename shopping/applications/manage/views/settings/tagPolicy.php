<?php
    $table = '';
    $i = 1;
    foreach($this->infoPolicy as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['name'].'</td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=settings&action=editPolicy&idEdit='.$value['id'].'">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=settings&action=tagPolicy&idDelete='.$value['id'].'"> Xóa</a></td>
                    </tr>';
        $i++;
    }
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Cài đặt
                    <small>Tag</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="" method="POST">
                    <div class="form-group">
                        <label>Nhập thẻ</label>
                        <textarea class="form-control" rows="3" name="tagHTML"><?php echo $this->infoTag['tagHTML']; ?></textarea>
                    </div>
                    
                    <button type="submit" name="tag" value="true" class="btn btn-default">Thiết lập</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
        <div class="row" style="padding-bottom:40px;">
            <div class="col-lg-12">
                <h1 class="page-header">Cài đặt
                    <small>Chính sách ưu đãi</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Tên chính sách</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $table; ?>
                </tbody>
            </table>
            <form action="" method="POST">
                <button type="submit" name="policy" value="true" class="btn btn-default">Thêm chính sách</button>
            <form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->