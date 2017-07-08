<?php
    $table = '';
    $i = 1;
    foreach($this->listAdmin as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        if($value['role'] == 0) $role = 'SuperAdmin';
        else if($value['role'] == 1) $role =  'Admin';
        else if($value['role'] == 2) $role =  'Mod';
        
        if(Session::get('role') == 0) {
            $td =   '<td class="center">
                        <i class="fa fa-trash-o  fa-fw"></i>
                        <a href="index.php?module=manage&controller=admin&action=list&idDelete='.$value['id'].'"> Xóa</a>
                    </td>
                    <td class="center">
                        <i class="fa fa-pencil fa-fw"></i> 
                        <a href="index.php?module=manage&controller=admin&action=edit&idEdit='.$value['id'].'">Sửa</a>
                    </td>';
        }else if(Session::get('role') == 1) {
            if($value['role'] == 1) {
                    $td =   '<td class="center">
                                <i class="fa fa-trash-o  fa-fw"></i>
                                <span> Xóa</span>
                            </td>
                            <td class="center">
                                <i class="fa fa-pencil fa-fw"></i> 
                                <span>Sửa</span>
                            </td>';
            } else {
                    $td =   '<td class="center">
                        <i class="fa fa-trash-o  fa-fw"></i>
                        <a href="index.php?module=manage&controller=admin&action=list&idDelete='.$value['id'].'"> Xóa</a>
                    </td>
                    <td class="center">
                        <i class="fa fa-pencil fa-fw"></i> 
                        <a href="index.php?module=manage&controller=admin&action=edit&idEdit='.$value['id'].'">Sửa</a>
                    </td>';
            }
        }

        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['username'].'</td>
                        <td>'.$role.'</td>
                        '.$td.'
                    </tr>';
        $i++;
    }

    if($_GET['add'] == 'success')
        $success = '<div class="alert alert-success">Thêm thành công</div>';
    if($_GET['add'] == 'danger')
        $danger = '<div class="alert alert-danger">Thêm thất bại</div>';
    if($_GET['edit'] == 'success')
        $success = '<div class="alert alert-success">Sửa thông tin thành công</div>';
    if($_GET['edit'] == 'danger')
        $danger = '<div class="alert alert-danger">Sửa thông tin thất bại</div>';
    if($_GET['delete'] == 'success')
        $success = '<div class="alert alert-success">Xóa thành công</div>';

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Quản trị viên
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php echo $success; ?>
            <?php echo $danger; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-ưexample">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên đăng nhập</th>
                        <th>Cấp bậc</th>
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