<?php

    $table = '';
    $i = 1;
    foreach($this->message as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $status = ($value['status'] == 0) ? 'Chưa trả lời' : 'Đã trả lời';
        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['id'].'</td>
                        <td>'.$value['name'].'</td>
                        <td>'.$value['mail'].'</td>
                        <td>'.$value['date'].'</td>
                        <td>'.$value['time'].'</td>
                        <td class="center"><i class="fa fa-eye" aria-hidden="true"></i> <a href="index.php?module=manage&controller=message&action=view&idView='.$value['id'].'">Xem</a></td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=message&action=index&idDelete='.$value['id'].'"> Xóa</a></td>
                    </tr>';
        $i++;
    }
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
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên người gửi</th>
                                <th>Mail</th>
                                <th>Ngày</th>
                                <th>Giờ</th>
                                <th>Xem</th>
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