<?php
	$message = '';
	if(isset($_GET['register'])) {
		$message .= '<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s" >
			  	 		<h2>Congratulation</h2>
				 		<p style="color:green;">Xin chúc mừng! Bạn đã đăng ký thành công. Hãy đăng nhập đê bắt đầu mua sắm.</p>
			   		</div>';
	}else{
		$message .= 	'<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
			  	 		<h2>Khách hàng mới</h2>
				 		<p>Tạo một tài khoản trên trang web của chúng tôi, bạn sẽ thể mua hàng nhanh chóng hơn thay vi đến cửa hàng của chúng tôi, xem, theo dõi đơn đặt hàng của bạn trong tài khoản của bạn và nhiều chức năng khác hơn nữa</p>
						<a class="acount-btn" href="index.php?module=home&controller=account&action=register">Đăng ký tài khoản</a>
			   		</div>';
	}
?>

<div class="content">
	<div class="container">
		<div class="login-page">
		    <div class="dreamcrub">
			   	<ul class="breadcrumbs">
	                <li class="home">
	                   <a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Home</a>&nbsp;
	                   <span>&gt;</span>
	                </li>
	                <li class="women">
	                   Đăng nhập
	                </li>
	            </ul>
	            <ul class="previous">
	            	<li><a href="index.php?module=home&controller=home&action=index">Quay về trang trước</a></li>
	            </ul>
	        	<div class="clearfix"></div>
		    </div>
			<div class="account_grid">
			   	<?php echo $message; ?>
			   	<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
			  		<h3>Đăng nhập</h3>
					<p>Nếu bạn đã có tài khoản thì vui lòng đăng nhập.</p>
					<form action="#" method="post">
				 		<div>
							<span>Tên đăng nhập <label>*</label></span>
							<?php echo $this->_errorUser; ?>
							<input type="text" name="username" /> 
				  		</div>
				 		<div>
							<span>Mật khẩu <label>*</label></span>
							<?php echo $this->_errorPass; ?>
							<input type="password" name="password" /> 
				 		</div>
				 		<input type="submit" name="submit" value="Đăng nhập">
			    	</form>
			   	</div>	
			   	<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>