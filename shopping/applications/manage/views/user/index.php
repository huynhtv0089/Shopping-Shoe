<?php
    $table = '';
    $i = 1;
    foreach($this->users as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        if($value['classify_id'] ==0) $classify = 'Default user';
        else if($value['classify_id'] == 1) $classify = 'Event user';
        else if($value['classify_id'] == 2) $classify = 'Vip user';

        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['fullname'].'</td>
                        <td>'.$value['username'].'</td>
                        <td>'.$classify.'</td>
                        <td class="center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="index.php?module=manage&controller=user&action=info&idView='.$value['id'].'"> Xem</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=user&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=user&action=edit&idEdit='.$value['id'].'"> Sửa</a></td>
                    </tr>';
        $i++;
    }
    if($_GET['edit'] == 'success')
        $success = '<div class="alert alert-success">Sửa thông tin khách hàng thành công</div>';
    if($_GET['delete'] == 'success')
        $success = '<div class="alert alert-success">Xóa khách hàng thành công</div>';
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User
                    <small>List</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php echo $success; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Tên đăng nhập</th>
                        <th>Cấp độ</th>
                        <th>Thông tin</th>
                        <th>Xóa</th>
                        <th>Sửa</th>
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