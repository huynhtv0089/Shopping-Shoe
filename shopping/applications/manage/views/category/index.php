<?php
    $table = '';
    $i = 1;
    foreach($this->categorylist as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['name'].'</td>
                        <td>'.$value['classify'].'</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=category&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=category&action=edit&idEdit='.$value['id'].'">Sửa</a></td>
                    </tr>';
        $i++;
    }

    if($_GET['add'] == 'success')
        $success = '<div class="alert alert-success">Thêm thể loại thành công</div>';
    if($_GET['edit'] == 'success')
        $success = '<div class="alert alert-success">Sửa thể loại thành công</div>';
    if($_GET['delete'] == 'success')
        $success = '<div class="alert alert-success">Xóa thể loại thành công</div>';
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thể loại
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php echo $success; ?>
            <?php echo $danger; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Phân loại</th>
                        <th>Xóa thể loại</th>
                        <th>Sửa danh sách</th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $table; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->