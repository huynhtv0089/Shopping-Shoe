<?php
	$headerTopStrip = '';
	if(Session::get('timeout') + 1800 > time()) {
		$headerTopStrip = 	'<div class="container">
								<div class="header-top-left">
									<ul>
										<li><a href="index.php?module=home&controller=account&action=home"><span
											class="glyphicon glyphicon-user"> </span>'.Session::get('fullname').'</a></li>
										<li><a href="index.php?module=home&controller=account&action=logout"><span
											class="glyphicon glyphicon-log-out"> </span> Đăng xuất</a></li>
									</ul>
								</div>
								<div class="header-right">
									<div class="cart box_1">
										<a href="index.php?module=home&controller=checkout&action=index&p=1" class="simpleCart">
											<h3>
												 <img src="'. IMAGES_URL.'/bag.png" alt="">
											</h3>
										</a>
										<p> <a href="index.php?module=home&controller=checkout&action=index&p=1" class="simpleCart">Giỏ hàng</a> </p>
										<div class="clearfix"></div>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>';
		for($i = 1; $i <= count($this->showProduct); $i++) {
			$cartHeader .= ', .cart-header'.$i;
			$close .= ', .close'. $i;
		}
		$cartHeader = substr($cartHeader, 2);
		$close = substr($close, 2);

		$style = $cartHeader . ' {position: relative; background-color: #FDFDFD;} 													 '.$close.' { background: url("'. IMAGES_URL .'close_1.png") no-repeat 0px 0px; cursor: pointer; width: 28px; height: 28px; position: absolute; right: 0px; top: 25px; -webkit-transition: color 0.2s ease-in-out; -moz-transition: color 0.2s ease-in-out; -o-transition: color 0.2s ease-in-out; transition: color 0.2s ease-in-out; }';

	}else {
		$headerTopStrip = 	'<div class="container">
								<div class="header-top-left">
									<ul>
										<li><a href="index.php?module=home&controller=account&action=index"><span
											class="glyphicon glyphicon-user"> </span>Đăng nhập</a></li>
										<li><a href="index.php?module=home&controller=account&action=register"><span
											class="glyphicon glyphicon-lock"> </span>Tạo tài khoản mới</a></li>
									</ul>
								</div>
							</div>';
	}

	require_once APPLICATION_PATH . 'home' . DS . 'controllers' . DS . 'Template_Controller.php';
	$header = new Template_Controller();
	$header->header_Action();

	$li = '';
	foreach($header->getMenus as $key => $value) {
		$li .= '<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.$value['classify'].' 
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">';
		foreach($header->listCategory as $keys => $values) {
			if($value['classify'] == $values['classify']){
				$li .= '<li><a href="index.php?module=home&controller=product&action=index&idCate='.$values['id'].'&p=1">'.$values['name'].'</a></li>';
			}
		}
		$li .= '</ul></li>';
	}


?>

<!DOCTYPE html>
<html>
	<head>
	<title>Shopping Online</title>
	<!-- Custom Theme files -->

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Shopping online." />

	<link href="<?php echo CSS_URL; ?>bootstrap.css" rel="stylesheet" type="text/css" />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?php echo JS_URL; ?>jquery.min.js"></script>

	<!-- Custom Theme files -->
	<link href="<?php echo CSS_URL; ?>style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo CSS_URL; ?>component.css" rel='stylesheet' type='text/css' />
	
	<script type="application/x-javascript">
		addEventListener("load", function() {setTimeout(hideURLbar, 0);}, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
	</script>

	<!--webfont-->
	<!-- for bootstrap working -->
	<script type="text/javascript" src="<?php echo JS_URL; ?>bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<!-- cart -->
	<script src="<?php echo JS_URL; ?>simpleCart.min.js"></script>
	<!-- cart -->	
	<link rel="stylesheet" href="<?php echo CSS_URL; ?>flexslider.css" type="text/css" media="screen" />

	<style>
		<?php echo $style; ?>
	</style>

	</head>
	<body>
		<!-- header-section-starts -->
		<div class="header">
			<div class="header-top-strip">
				<?php echo $headerTopStrip; ?>
			</div>
		</div>
		<!-- header-section-ends -->
		<div class="banner-top">
			<div class="container">
				<nav class="navbar navbar-default" role="navigation">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse"
							data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span> <span
								class="icon-bar"></span> <span class="icon-bar"></span> <span
								class="icon-bar"></span>
						</button>
						<div class="logo">
							<h1>
								<a href="index.php?module=home&controller=home&action=index"><span><?php echo $header->logo['pic']; ?></span> <?php echo $header->logo['picName']; ?></a>
							</h1>
						</div>
					</div>
					<!--/.navbar-header-->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li>
								<a href="index.php?module=home&controller=home&action=index">Home</a>
							</li>
							<?php echo $li; ?>
							<li><a href="index.php?module=home&controller=contact&action=index">CONTACT</a></li>
						</ul>
					</div>
					<!--/.navbar-collapse-->
				</nav>
				<!--/.navbar-->
			</div>
		</div>