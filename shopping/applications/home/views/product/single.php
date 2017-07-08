<?php
	
	// Discount
	$offer = '';
	$price = '';
	if($this->itemSingle['discount'] != 0) {
		$offer = '<p>- '.$this->itemSingle['discount'].'%</p>';
		$price = '<strike>'.$this->itemSingle['price'].'VND</strike> <br>'. ((100 - $this->itemSingle['discount']) * $this->itemSingle['price']) / 100;
	}else {
		$price = $this->itemSingle['price'];
	}

	$size = explode(", ", $this->itemSingle['size']);
	
	foreach($size as $key) {
		$option .= 	'<option value="'.$key.'">'.$key.'</option>';
	}

	$arrImages = explode(", ", $this->itemSingle['image_list']);
	
	$liImages = '';
	foreach($arrImages as $key => $value) {
		$liImages .=  '<li data-thumb="'. IMAGES_URL . $value .'">
					<div class="thumb-image"> <img src="'. IMAGES_URL . $value .'" data-imagezoom="true" class="img-responsive" alt="" /> </div>
				</li>';
	}

	$a = '';
	if(!empty($this->checkAdded)) {
		$a = '<span>Added to cart</span>';
	}else {
		$a = '<input style="border: 1px solid; border-radius: 5px; height: 30px;	" type="submit" name="submit" value="Thêm vào giỏ hàng" />';
	}

	$li = '';
	foreach($this->otherProducts as $key => $value) {
		$li .= '<li style="margin-right:2px;">
					<a href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">';
		if($value['discount'] != 0)
			$li .= '<div class="offer"> <p>- '.$value['discount'].'%</p> </div>';
		
		$li .= '<img src="'. IMAGES_URL . $value['image_link'] .'" class="img-responsive"/>
					</a>
					<div class="product liked-product simpleCart_shelfItem">
					<a class="like_name" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">'.$value['name'].'</a>
					<p>
						<a class="item_add" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">
							<i></i>';
		if($value['discount'] == 0)
			$li .= '<span class=" item_price">'. $value['price'] .' VND</span>';
		else
			$li .= '<span class=" item_price"><strike>'.$value['price'].'</strike> '. ((100 - $value['discount']) * $value['price']) / 100 .' VND</span>';
		$li	.=		'</a>
					</p>
					</div>
				</li>';
	}

	$listPro = '';
	foreach($this->productList as $key => $value) {
		if($value['id'] != $this->firstProList['id'])
			$listPro .= '<li><a href="?'. $value['id'] .'">'.$value['name'].'</a></li>';
	}

	// Tag
	$tagLi = '';
	foreach($this->tag as $key => $value) {
		$tagLi .= '<li><a href="index.php?module=home&controller=product&action=index&search='.$value.'&p=1">'. $value .'</a></li>';
	}

	/* Advertisement */
	// Center
	(empty($this->adsCenter['width'])) ? $widthCenter = '0px' : $widthCenter = $this->ads['width'];
	(empty($this->adsCenter['height'])) ? $heightCenter = '0px' : $heightCenter = $this->ads['height'];
	if(empty($this->adsCenter['picAds'])) {
		$tmpCenter = $this->adsCenter['code'];
	}else if(empty($this->adsCenter['code'])) {
		$tmpCenter = '<img src="'. IMAGES_URL . $this->ads['picAds'] .'" class="img-responsive" alt=""/>';
	}


	// Left
	(empty($this->adsLeft['width'])) ? $widthLeft = '0px' : $widthLeft = $this->ads['width'];
	(empty($this->adsLeft['height'])) ? $heightLeft = '0px' : $heightLeft = $this->ads['height'];
	if(empty($this->adsLeft['picAds'])) {
		$tmpLeft = $this->adsLeft['code'];
	}else if(empty($this->adsLeft['code'])) {
		$tmpLeft = '<img src="'. IMAGES_URL . $this->adsLeft['picAds'] .'" class="img-responsive" alt=""/>';
	}
	/* END - Advertisement*/

?>

<!-- content-section-starts -->
<div class="container">
	   <div class="products-page">
			
	   		<div class="products">
				<div class="product-listy">
					<h2><?php echo $this->firstProList['name']; ?></h2>
					<ul class="product-list">
						<?php echo $listPro; ?>
					</ul>
				</div>
				<div class="latest-bis" style="height:<?php echo $heightLeft; ?>; width:<?php echo $widthLeft; ?>">
					<?php echo $tmpLeft; ?>
				</div> 	
				<div class="tags">
			    	<h4 class="tag_head">Từ khóa sản phẩm</h4>
			         <ul class="tags_links">
						<?php echo $tagLi; ?>
					</ul>
			    </div>
			</div>

			<div class="new-product">
				<div class="col-md-5 zoom-grid">
					<div class="flexslider">
						<ul class="slides">
							<?php echo $liImages; ?>
						</ul>
					</div>
					<div class="offer">
						<?php echo $offer; ?>
					</div>
				</div>
				<div class="col-md-7 dress-info">
					<form action="#" method="post">
						<div class="dress-name">
							<h3><?php echo $this->itemSingle['name']; ?></h3>
							<span><?php echo $price; ?> VND</span>
							<div class="clearfix"></div>
							<p><?php echo $this->itemSingle['description']; ?> <?php echo $this->itemSingle['content']; ?></p>
						</div>
						<div class="span span1">
							<p class="left">Xuất xứ</p>
							<p class="right"><?php echo $this->itemSingle['made_in']; ?></p>
							<div class="clearfix"></div>
						</div>
						<div class="span span2">
							<p class="left">Kích thước</p>
							<p class="right">
								<span class="selection-box">
									<select class="domains valid" name="size">
										<?php echo $option; ?>
									</select>
							   	</span>
							</p>
							<div class="clearfix"></div>
						</div>
						<div class="span span3">
							<p class="left">Số lượng</p>
							<p class="right">
								<input style="width:57px;" type="number" name="quantity" min="1" max="100" value="1">
							</p>
							<div class="clearfix"></div>
						</div>
						<div class="span span4" style="text-align:center">
							<?php echo $a; ?>
							<?php echo $this->message; ?>
							<div class="clearfix"></div>
						</div>

					</form>
					</div>
				<script src="<?php echo JS_URL; ?>imagezoom.js"></script>
					<!-- FlexSlider -->
					<script defer src="<?php echo JS_URL; ?>jquery.flexslider.js"></script>
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
						  $('.flexslider').flexslider({
							animation: "slide",
							controlNav: "thumbnails"
						  });
						});
					</script>
				<div class="clearfix"></div>
				<div class="reviews-tabs" style="height:<?php echo $heightCenter; ?>; width:<?php echo $widthCenter; ?>">
					<?php echo $tmpCenter; ?>
				</div>

			</div>
			<div class="clearfix"></div>
    
<div class="other-products">
	<div class="container">
		<h3 class="like text-center">Sản phẩm cùng danh mục</h3>        			
		<ul id="flexisel">
			<?php echo $li; ?>
		</ul>
	    <script type="text/javascript">
		 $(window).load(function() {
			$("#flexisel").flexisel({
				visibleItems: 4,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	   </script>
	   <script type="text/javascript" src="<?php echo JS_URL; ?>jquery.flexisel.js"></script>
    </div>
</div>
<!-- content-section-ends-here -->