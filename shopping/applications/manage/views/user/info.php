<?php
    $i = 1;
    foreach($this->info_User as $key => $value) {
        $grade = ($i%2==0) ? 'gradeX' : 'gradeC';
        $body .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.ucfirst($key).'</td>
                        <td>'.$value.'</td>
                </tr>';
    }
    $fullname = $this->info_User['fullname'];

    $table = '';
    $j = 1;
    foreach($this->infoCheckout as $key => $value) {
        $grade = ($j%2==0) ? 'gradeX' : 'gradeC';
        ($value['status'] ==0) ? $status = 'Chưa thanh toán' : $status = 'Đã thanh toán';

        $table .= '<tr class="odd '.$grade.'" align="center">
                        <td>'.$value['name'].'</td>
                        <td>'.$value['date'].'</td>
                        <td>'.$value['time'].'</td>
                        <td>'.$value['size'].'</td>
                        <td>'.$value['quantity'].'</td>
                        <td>'.$status.'</td>
                        <td>'.$value['discount'].'%</td>
                        <td>'.$value['total'].'</td>';

        if($value['status'] == 0)
            $table .=   '<td class="center"><a href="index.php?module=manage&controller=user&action=info&idView=4&idEdit='.$value['id'].'"><i class="fa fa-check" aria-hidden="true"></i></a></td>';
        else
            $table .=   '<td class="center"><i class="fa fa-money" aria-hidden="true"></i></td>';

        $table .=       '<td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="index.php?module=manage&controller=user&action=info&idView=4&idDelete='.$value['id'].'&status='.$value['status'].'&idPro='.$value['id_product'].'&size='.$value['size'].'&quantity='.$value['quantity'].'"> Xóa</a></td>
                    </tr>';
        $j++;
    }
?>  

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin
                    <small><?php echo $fullname; ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <td><b>Field</b></td>
                        <td><b>Infomation</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $body; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lịch sử
                    <small>mua hàng</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>Tên</th>
                        <th>Ngày</th>
                        <th>Giờ</th>
                        <th>Sise</th>
                        <th>sl</th>
                        <th>Trạng thái</th>
                        <th>Giảm giá</th>
                        <th>Tổng tiền</th>
                        <th>Xác nhận</th>
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