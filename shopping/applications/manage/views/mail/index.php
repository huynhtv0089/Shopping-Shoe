<?php
    $table = '';
    $i = 1;
    foreach($this->mail as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['mailUser'].'</td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=mail&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                    </tr>';
        $i++;
    }

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Mail
                    <small>Danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Mail</th>
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