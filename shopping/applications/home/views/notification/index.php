<?php
	$div = '';
	if($_GET['option'] == 'contact') {
		$div = '<div class="contact-map" style="font-size:16px;">
					Cảm ơn bạn đã gửi tin nhắn cho chúng tôi. <br/>
					Tin nhắn của bạn đã được gửi thành công. Bạn vui lòng chờ trong ít phút, người quản trị sẽ phản hồi qua mail cho bạn.
				</div>';
	}
	if($_GET['option'] == 'mail') {
		$div = '<div class="contact-map" style="font-size:16px;">
					Cảm ơn bạn đã tin tưởng trang web của chúng tôi. <br/>
					Chúng tôi sẽ gửi mail thông báo cho bạn khi có các sự kiện mới của chúng tôi.
				</div>';
	}
?>
<!-- contact-page -->
<div class="contact">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Contact
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php?module=home&controller=home&action=index">Quay về trang chủ</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<div class="contact-info">
			<h2>Thông báo </h2>
		</div>
		<?php echo $div; ?>

	</div>
</div>
<!-- //contact-page -->