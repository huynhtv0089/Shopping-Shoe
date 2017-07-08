<?php
	$tr = '';
	$i = 1;
	foreach($this->infoHistory as $key) {
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
                       Lịch sử giao dịch
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php?module=home&controller=account&action=home">Quay lại trang chủ</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 <h2>Danh sách giao dịch</h2>
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
		          	<ul class="women_pagenation">
				  		<li>Trang 1 of <?php echo $this->sumPage; ?>:</li>
						<?php echo $this->page; ?>
				 	</ul>
				   <div class="clearfix"></div>						
			  </div>
		  	</div>
		</div>
	</div>
</div>

<!-- //checkout -->	