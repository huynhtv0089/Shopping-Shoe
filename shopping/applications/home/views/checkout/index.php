<?php
	$cart = '';
	$i = 1;
	foreach($this->showProduct as $key) {
		$status = ($key['status'] == 0) ? "Chưa thanh toán" : "Đã thanh toán";

		$cart .= '<div class="cart-header'.$i.'">
					<div class="cart-sec simpleCart_shelfItem">
						<div class="cart-item cyc">
							 <img src="'. IMAGES_URL . $key['image_link'] .'" class="img-responsive" alt="">
						</div>
					    <div class="cart-item-info">
							<h3><a href="#"> '. $key['name'] .' </a><h4>Trạng thái: '.$status.'</h4></h3>
							<ul class="qty">
								<li><p>Giá : '. $key['price'] .' VND<p></li>
								<li><p>Kích thước: '. $key['size'] .'</p></li>
								<li><p>Số lượng: '. $key['quantity'] .' </p></li>
								<li><p>Giảm giá: '. $this->saleOff[$i-1] .' %</p></li>
							</ul>
							<div class="delivery">
								<p>Tổng tiền : '. $this->total[$i-1] .' VND</p>
								<div class="clearfix"></div>
					        </div>	
						</div>
						<div class="clearfix"></div>						
					</div>
				</div>';
		$i++;
	}

	$title = '';
	if($this->items > 0)
		$title = '<h2>Giỏ hàng của bạn ('. $this->items .')</h2>';
	else
		$title = '<h2>Giỏ của hàng bạn đang rỗng</h2>';
	
?>
<!-- checkout -->
<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
		<ul class="breadcrumbs">
			<li class="home">
				<a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Trang chủ</a>&nbsp;
				<span>&gt;</span>
			</li>
			<li class="women">
				Giỏ hàng
			</li>
		</ul>
		<ul class="previous">
			<li><a href="index.php?module=home&controller=product&action=index&p=1">Quay về</a></li>
		</ul>
		<div class="clearfix"></div>
		</div>
		<?php echo $title; ?>
		<div class="cart-gd">
			<?php echo $cart; ?>
		</div>
	</div>
	<div style="text-align:center; margin-right:50px;">
		  	<ul class="women_pagenation">
		  		<li>Trang 1 of <?php echo $this->sumPage; ?>:</li>
				<?php echo $this->page; ?>
		 	</ul>
		</div>
</div>

<!-- //checkout -->	