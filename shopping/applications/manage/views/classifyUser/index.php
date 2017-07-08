<?php
    $table = '';
    $i = 1;
    foreach($this->classify_user as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['name'].'</td>
                        <td>'.$value['description'].'</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=classifyUser&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=classifyUser&action=edit&idEdit='.$value['id'].'">Sửa</a></td>
                    </tr>';
        $i++;
    }
    if($_GET['add'] == 'success')
        $success = '<div class="alert alert-success">Add success</div>';
    if($_GET['edit'] == 'success')
        $success = '<div class="alert alert-success">Edit success</div>';
    if($_GET['delete'] == 'success')
        $success = '<div class="alert alert-success">Delete success</div>';
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Phân loại khách hàng
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <?php echo $success; ?>
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
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