<?php
	$tr = '';
	$i = 1;
	foreach($this->infoCheck as $key) {
		$status = ($key['status'] == 0) ? 'Chưa thanh toán' : 'Thanh toán thành công';
		$tr .= '<tr>
                 	<td>'.$i.'</td>
                 	<td>'.$key['name'].'</td>
                 	<td>'.$status.'</td>
                 	<td>'.$key['date'].'</td>
                </tr>';
        $i++;
	}
?>
<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Tài khoản của tôi
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.html">Quay lại trang chủ</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 <h2>Thông tin tài khoản</h2>
		<div class="cart-gd">
			<div class="cart-header" >
				<table class="table table-bordered" style="text-align: center;">
					<tbody>
						<tr>
							<td>Họ và tên</td>
							<td><?php echo $this->infoAcc['fullname']; ?></td>
						</tr>
						<tr>
							<td>Số điện thoại</td>
							<td><?php echo $this->infoAcc['phone']; ?></td>
						</tr>
						<tr>
							<td>Địa chỉ</td>
							<td><?php echo $this->infoAcc['address']; ?></td>
						</tr>
						<tr>
							<td>Email</td>
							<td><?php echo $this->infoAcc['email']; ?></td>
						</tr>
					</tbody>
			  	</table>
			  	<a href="index.php?module=home&controller=account&action=editInfo" style="float:right;"><< Chỉnh sửa >></a>
		   	<div class="clearfix"></div>
			</div>									
  		</div>
  		<h2>Lịch sử giao dịch</h2>
		 <div class="cart-header2">
			 <div class="close2"> </div>
			  <div class="cart-sec simpleCart_shelfItem">
					<div class="bs-docs-example">
		            	<table class="table">
				            <thead>
				                <tr>
				                  	<th>#</th>
				                  	<th>Tên sản phẩm</th>
				                  	<th>Trạng thái</th>
				                  	<th>Ngày đặt hàng</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php echo $tr; ?>
				            </tbody>
			            </table>
		          	</div>
		          	<a href="index.php?module=home&controller=account&action=history&p=1" style="float:right;"><< Xem thêm >></a>
				   <div class="clearfix"></div>						
			  </div>
		  	</div>
		</div>
	</div>
</div>

<!-- //checkout -->	