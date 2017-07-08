<?php
    $i = 1;
    foreach($this->infoProduct as $key => $value) {
        $gradeTop = ($i%2==0) ? 'gradeX' : 'gradeC';
        $bodyTop .= '<tr class="odd '.$gradeTop.'" align="center">
                        <td>'.ucfirst($key).'</td>
                        <td>'.$value.'</td>
                </tr>';
    }
    $name = $this->infoProduct['name'];
    $j = 1;
    foreach($this->infoQuantity as $key) {
        $gradeBot = ($j%2==0) ? 'gradeX' : 'gradeC';
        $bodyBot .= '<tr class="odd '.$gradeBot.'" align="center">
                    <td>'.$key['size'].'</td>
                    <td>'.$key['quantity'].'</td>
            </tr>';
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Thông tin sản phẩm
                    <small><?php echo $name; ?></small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <td><b>Nội dung</b></td>
                        <td><b>Thông tin</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $bodyTop; ?>
                </tbody>
            </table>

            <div class="col-lg-12">
                <h1 class="page-header">Quantity </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover">
                <thead>
                    <tr align="center">
                        <td><b>Kích thước</b></td>
                        <td><b>Số lượng</b></td>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $bodyBot; ?>
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->