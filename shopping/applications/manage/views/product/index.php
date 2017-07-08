<?php
    $table = '';
    $i = 1;
    foreach($this->listProduct as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['name'].'</td>
                        <td>'.$value['category_id'].'</td>
                        <td class="center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="index.php?module=manage&controller=product&action=info&idView='.$value['id'].'"> Xem</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=product&action=editInfo&idEdit='.$value['id'].'">Sửa</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="index.php?module=manage&controller=product&action=editSize&idEdit='.$value['id'].'">Sửa</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=product&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                    </tr>';
        $i++;
    }

    if($_GET['add'] == 'success')
        $success = '<div class="alert alert-success">Thêm sản phẩm thành công</div>';
    if($_GET['edit'] == 'success')
        $success = '<div class="alert alert-success">Sửa sản phẩm thành công</div>';
    if($_GET['delete'] == 'success')
        $success = '<div class="alert alert-success">Xóa sản phẩm thành công</div>';
?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
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
                        <th>Thể loại</th>
                        <th>Thông tin</th>
                        <th>Sửa thông tin</th>
                        <th>Sửa kích thước và số lượng</th>
                        <th>Xóa</th>
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