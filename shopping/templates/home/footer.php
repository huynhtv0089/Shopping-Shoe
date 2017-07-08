<?php
	require_once APPLICATION_PATH . 'home' . DS . 'controllers' . DS . 'Template_Controller.php';
	$footer = new Template_Controller();
	$footer->getPostFooter = $_POST;
	
	$footer->footer_Action($footer->getPostFooter);

	$liFr1 = '';
	for($i=1; $i<=count($footer->fr1); $i++) {
		if(!empty($footer->fr1[$i]['name']))
			$liFr1 .= '<li>'.$footer->fr1[$i]['name'].'</li>';
	}

	$liFr2 = '';
	for($i=1; $i<=count($footer->fr2); $i++) {
		if(!empty($footer->fr2[$i]['name']))
			$liFr2 .= '<li>'.$footer->fr2[$i]['name'].'</li>';
	}
?>
		<div class="news-letter">
			<div class="container">
				<div class="join">
					<h6>Nhập Email của bạn</h6>
					<div class="sub-left-right">
						<form action="" method="post">
							<input type="text" placeholder="Để nhận thông tin mới nhất về cửa hàng" name="mailUser" />
							<input type="submit" name="submit" value="Theo dõi" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
		<div class="footer">
			<div class="container">
				<div class="footer_top">
					<div class="span_of_4">
						<div class="col-md-3 span1_of_4">
							<h4><?php echo $footer->fr1[0]['name']; ?></h4>
							<ul class="f_nav">
								<?php echo $liFr1; ?>
							</ul>
						</div>
						<div class="col-md-3 span1_of_4">
							<h4><?php echo $footer->fr2[0]['name']; ?></h4>
							<ul class="f_nav">
								<?php echo $liFr2; ?>
							</ul>
						</div>
						<div class="col-md-6 span1_of_4">
							<?php echo $footer->map['iframe']; ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="cards text-center">
				</div>
				<div class="copyright text-center">
					<p>
						<?php echo $footer->license['name']; ?>
					</p>
				</div>
			</div>
		</div>
	</body>
</html>