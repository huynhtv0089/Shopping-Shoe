<?php
	$li = '';
	if(!empty($this->listProduct))
		foreach($this->listProduct as $items) {
			$li .= '<li>
						<a class="cbp-vm-image" href="index.php?module=home&controller=product&action=single&idP='.$items['id'].'">
							<div class="simpleCart_shelfItem">
								<div class="view view-first">
						   		  	<div class="inner_content clearfix">
										<div class="product_image">';
			
			if($items['discount'] != 0) {
					$li .= '<div class="offer"> <p>- '.$items['discount'].'%</p> </div>';
			}

			$li	.=	'<img src="'. IMAGES_URL . $items['image_link']. '" class="img-responsive" alt="" />
										<div class="mask">
				                       		<div class="info">Quick View</div>
					                  	</div>
										<div class="product_container">
										   	<div class="cart-left">
											 	<p class="title">'.$items['name'].'</p>
										   	</div><br>';
			if($items['discount'] != 0)
			   	$li .= '<div class="pricey"><span class=" item_price"><strike>'.$items['price'].'</strike> '. ((100 - $items['discount']) * $items['price']) / 100 .' VND</span></div>';
			else
				$li .= '<div class="pricey"><span class="item_price">'.$items['price'].' VND</span></div>';
			$li .= '<div class="clearfix"></div>
								     	</div>		
								  	</div>
			                    </div>
		                  </div>
		                </a>
						<div class="cbp-vm-details">'.$items['description'].'</div>
					
						</div>
					</li>';
		}
	else
		$li = '<p>Kết quả tìm kiếm không thấy.</p>';

	// Tag
	$tagLi = '';
	foreach($this->tag as $key => $value) {
		$tagLi .= '<li><a href="index.php?module=home&controller=product&action=index&search='.$value.'&p=1">'. $value .'</a></li>';
	}

	// Advertisement	
	(empty($this->ads['width'])) ? $width = '0px' : $width = $this->ads['width'];
	(empty($this->ads['height'])) ? $height = '0px' : $height = $this->ads['height'];
	if(empty($this->ads['picAds'])) {
		$tmp = $this->ads['code'];
	}else if(empty($this->ads['code'])) {
		$tmp = '<img src="'. IMAGES_URL . $this->ads['picAds'] .'" class="img-responsive" alt=""/>';
	}
	
	// Sidebar left menu
	$liMenu = '';
	foreach($this->menu as $key => $value) {
		if($value['classify'] != 'x') {
			$liMenu .= '<li><a href="index.php?module=home&controller=product&action=index&idCate='.$value['id'].'&p=1">'.$value['name'].'</a></li>';
		}
	}

?>

<!-- content-section-starts -->
<div class="container">
   	<div class="products-page">
		
   		<div class="products">
				<div class="product-listy">
					<h2>Chính sách ưu đãi</h2>
					<ul class="product-list">
						<li><a>Giao hàng toàn quốc</a></li>
						<li><a>Thanh toán khi nhận hàng</a></li>
						<li><a>Đổi trả trong 15 ngày</a></li>
						<li><a>Đảm bảo chất lượng</a></li>
						<li><a>Miễn phí vận chuyển</a></li>
					</ul>
				</div>
				<div class="latest-bis" style="height:<?php echo $height; ?>; width:<?php echo $width; ?>">
					<?php echo $tmp; ?>
				</div> 	
				<div class="tags">
			    	<h4 class="tag_head">Từ khóa sản phẩm</h4>
			         <ul class="tags_links">
						<?php echo $tagLi; ?>
					</ul> 
			    </div>
			</div>
		
		<div class="new-product">
			<div class="new-product-top">
				<ul class="product-top-list">
					<li><a href="index.html">Trang chủ</a>&nbsp;<span>&gt;</span></li>
					<li><span class="act">Sản phẩm</span>&nbsp;</li>
				</ul>
				<p class="back"><a href="index.php?module=home&controller=home&action=index">Quay lại trang chủ</a></p>
				<div class="clearfix"></div>
			</div>
			<div class="mens-toolbar">
    	        <ul class="women_pagenation">
			     <li>Trang 1 of <?php echo $this->sumPage; ?>:</li>
		  	     <?php echo $this->page; ?>
		  	    </ul>
           		 <div class="clearfix"></div>		
	        </div>
	        <div id="cbp-vm" class="cbp-vm-switcher cbp-vm-view-grid" style="margin-top:-45px;">
				<div class="cbp-vm-options">
					<a href="#" class="cbp-vm-icon cbp-vm-grid cbp-vm-selected" data-view="cbp-vm-view-grid" title="grid">Grid View</a>
					<a href="#" class="cbp-vm-icon cbp-vm-list" data-view="cbp-vm-view-list" title="list">List View</a>
				</div>
				
				<div class="clearfix"></div>
				<ul>
				  	<?php echo $li; ?>
				</ul>
			</div>
			<script src="<?php echo JS_URL; ?>cbpViewModeSwitch.js" type="text/javascript"></script>
            <script src="<?php echo JS_URL; ?>classie.js" type="text/javascript"></script>
		</div>
		<div class="clearfix"></div>
		</div>
		<div style="text-align:center; margin:0 50px 50px 0;">
		  	<ul class="women_pagenation">
		  		<li>Trang 1 of <?php echo $this->sumPage; ?>:</li>
				<?php echo $this->page; ?>
		 	</ul>
		</div>
		<div class="clearfix"></div>
</div>
<!-- content-section-ends -->