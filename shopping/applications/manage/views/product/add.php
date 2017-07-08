<?php
    $option = '';
    foreach($this->optionCategory as $key) {
        if($key['parents'] != 0)
            $option .= '<option value="'.$key['id'].'">'.$key['name'].'</option>';
    }

?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm mới</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <?php echo $message; ?>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên</label>
                        <input class="form-control" name="name" placeholder="Vui lòng nhập tên sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea class="form-control" rows="2" name="description"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" name="content"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Xuất xứ</label>
                        <input class="form-control" name="made_in" placeholder="Vui lòng nhập xuất xứ sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giá sản phẩm</label>
                        <input class="form-control" name="price" placeholder="Vui lòng nhập giá sản phẩm" />
                    </div>
                    <div class="form-group">
                        <label>Giảm giá</label>
                        <input class="form-control" name="discount" placeholder="Vui lòng nhập giảm giá bao nhiêu %" />
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
                        <label>Kích thước</label> <br>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="S">S</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="M">M</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="L">L</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="XL">XL</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="XXL">XXL</label> <br>

                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="36">36</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="37">37</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="38">38</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="39">39</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="40">40</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="41">41</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="42">42</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="43">43</label>
                        <label class="checkbox-inline"><input type="checkbox" name="size[]" value="44">44</label>
                    </div>
                    <div class="form-group">
                        <label>Phân loại sản phẩm theo thể loại</label>
                        <select class="form-control" name="category_id">
                            <option>Chọn thể loại cho sản phẩm</option>
                            <?php echo $option; ?>
                        </select>
                    </div>
                    <button type="submit" name="submit" value="true" class="btn btn-default">Thêm mới</button>
                    <button name="back" class="btn btn-default">Quay lại</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->