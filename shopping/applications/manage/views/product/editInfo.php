<?php
    $option = '';
    foreach($this->category as $key) {
        if($key['parents'] != 0 && $key['id'] != $this->selectedOption['id'])
            $option .= '<option value="'.$key['id'].'">'.$key['name'].'</option>';
    }

    $checkbox = '';
    foreach($this->checkHot as $key)
        if($key['id'] == $_GET['idEdit'])
            $checkbox = 'checked';

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Sửa</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input class="form-control" name="name" value="<?php echo $this->editProduct['name']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="2" name="description"><?php echo $this->editProduct['description']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="content"><?php echo $this->editProduct['content']; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label>Xuất xứ</label>
                        <input class="form-control" name="made_in" value="<?php echo $this->editProduct['made_in']; ?> " />
                    </div>
                    <div class="form-group">
                        <label>Giá</label>
                        <input class="form-control" name="price" value="<?php echo $this->editProduct['price']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Giảm giá</label>
                        <input class="form-control" name="discount" value="<?php echo $this->editProduct['discount']; ?>" />
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện sản phẩm  </label> - <span> (kích thước chuẩn: 384 x 480)</span>
                        <input type="file" name="image_link">
                    </div>
                    <div class="form-group">
                        <label>Ảnh liên quan đến sản phẩm  </label> - <span> (kích thước chuẩn: 384 x 480)</span>
                        <input type="file" name="image_list[]" multiple="">
                    </div>
                    <div class="form-group">
                        <label>Phân lại sản phẩm theo thể loại</label>
                        <select class="form-control" name="category_id">
                            <option value="<?php echo $this->selectedOption['id']; ?>" selected="selected"><?php echo $this->selectedOption['name']; ?></option>
                            <?php echo $option; ?>
                        </select>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox" value="1" name="hotProduct" <?php echo $checkbox; ?> />Hiển thị trên slideshow trong trang Home</label>
                    </div>
                    <button type="submit" name="submit" value="true" class="btn btn-default">Sửa</button>
                    <button name="back" value="true" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->