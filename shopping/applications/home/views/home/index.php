<?php

	$product = '';
	foreach($this->listItem as $key => $value) {
		$product .= '<div class="col-md-4 product simpleCart_shelfItem text-center">
						<a href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">';

		if($value['discount'] != 0)
			$product .= '<div class="offer"> <p>- '.$value['discount'].'%</p> </div>';

		$product .='	<img src="'. IMAGES_URL . $value['image_link'] .'" alt="" />
						</a>
						<div class="mask">
							<a href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">Quick View</a>
						</div>
						<a class="product_name" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">'.$value['name'].'</a>
						<p>';
		if($value['discount'] != 0)
			$product .= '<a class="item_add" href="#"><i></i> <span class="item_price"><strike>'.$value['price'].'</strike> '. ((100 - $value['discount']) * $value['price']) / 100 .' VND</span></a>';
		else 
			$product .= '<a class="item_add" href="#"><i></i> <span class="item_price">$'.$value['price'].'</span></a>';
		$product .= 	'</p>
					</div>';
	}

	$otherProducts = '';
	foreach($this->hotItem as $key => $value) {
		$otherProducts .= '<li style="margin-right:2px;">
							<a href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">';

		if($value['discount'] != 0)
			$otherProducts .= '<div class="offer"> <p>- '.$value['discount'].'%</p> </div>';

		$otherProducts .= '<img src="'. IMAGES_URL . $value['image_link'] .'" class="img-responsive"/>
							</a>
							<div class="product liked-product simpleCart_shelfItem">
							<a class="like_name" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'">'.$value['name'].'</a>
							<p>';
		if($value['discount'] != 0)
			$otherProducts .= '<a class="item_add" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'"><i></i> <span class="item_price"><strike>'.$value['price'].'</strike> '. ((100 - $value['discount']) * $value['price']) / 100 .' VND</span></a>';
		else
			$otherProducts .= '<a class="item_add" href="index.php?module=home&controller=product&action=single&idP='.$value['id'].'"><i></i> <span class=" item_price">'.$value['price'].' VND</span></a>';
		$otherProducts  .= '</p>
							</div>
						</li>';
	}

?>

<div class="banner" style="background:url('<?php echo IMAGES_URL . $this->banner['picBanner']; ?>') no-repeat 0px 0px;" >
	<div class="container">
		<div class="banner-bottom">
			<div class="banner-bottom-right">
				<div class="callbacks_container">
					<ul class="rslides" id="slider4">
						<li>
							<div class="banner-info">
								<h3><?php echo $this->banner['slideTitle_01']; ?></h3>
								<p><?php echo $this->banner['slidePara_01']; ?></p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h3><?php echo $this->banner['slideTitle_02']; ?></h3>
								<p><?php echo $this->banner['slidePara_02']; ?></p>
							</div>
						</li>
						<li>
							<div class="banner-info">
								<h3><?php echo $this->banner['slideTitle_03']; ?></h3>
								<p><?php echo $this->banner['slidePara_03']; ?></p>
							</div>
						</li>
						
					</ul>
				</div>
				<!--banner-->
				<script src="<?php echo JS_URL; ?>responsiveslides.min.js"></script>
				<script>
					// You can also use "$(window).load(function() {"
					$(function() {
						// Slideshow 4
						$("#slider4")
								.responsiveSlides(
										{
											auto : true,
											pager : true,
											nav : false,
											speed : 500,
											namespace : "callbacks",
											before : function() {
												$('.events')
														.append(
																"<li>before event fired.</li>");
											},
											after : function() {
												$('.events')
														.append(
																"<li>after event fired.</li>");
											}
										});

					});
				</script>
			</div>
			<div class="clearfix"></div>


		</div>
	</div>
</div>

<!-- content-section-starts-here -->
<div class="container">
	<div class="main-content">
		<div class="online-strip">
			<div class="join">
				<h6>TÌM KIẾM SẢN PHẨM</h6>
				<div class="sub-left-right">
					<form action="" method="post">
						<input type="text" name="search" placeholder="Vui lòng nhập từ khóa không dấu" />
						<input type="submit" name="submit" value="TÌM KiẾM" />
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>

		<div class="products-grid">
			<header>
				<h3 class="head text-center">Sản phẩm mới nhất</h3>
			</header>

			<?php echo $product; ?>

			<div class="clearfix"></div>
		</div>
	</div>
	<div style="text-align:center;">
		<nav>
			  <ul class="pagination">
				<li><a href="index.php?module=home&controller=product&action=index&p=1">Xem thêm</a></li>
			 </ul>
		   </nav>
	</div>
</div>

<div class="other-products">
	<div class="container">
		<h3 class="like text-center">Sản phẩm hot nhất</h3>        			
		<ul id="flexisel">
			<?php echo $otherProducts; ?>
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