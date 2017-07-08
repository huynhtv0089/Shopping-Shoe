<?php	
	$this->getInfo = $_POST;
	$message = '';

	if($this->errorFirstname != '' 
		&& $this->errorLastname != ''
		&& $this->errorUsername != ''
		&& $this->errorPassword != ''
		&& $this->errorRePassword != ''
		&& $this->errorEmail != ''
		&& $this->errorPhone != ''
		&& $this->errorAddress != '') {
		$message .= '<p>'.$this->errorFirstname.'</p>';
		$message .= '<p>'.$this->errorLastname.'</p>';
		$message .= '<p>'.$this->errorUsername.'</p>';
		$message .= '<p>'.$this->errorPassword.'</p>';
		$message .= '<p>'.$this->errorRePassword.'</p>';
		$message .= '<p>'.$this->errorEmail.'</p>';
		$message .= '<p>'.$this->errorPhone.'</p>';
		$message .= '<p>'.$this->errorAddress.'</p>';
	}
?>

<!-- registration-form -->
<div class="registration-form">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Đăng ký
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php?module=home&controller=home&action=index">Quay lại trang chủ</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
		<h2>Đăng ký tài khoản</h2>
		<div class="registration-grids">
			<div class="reg-form">
				<div class="reg">
					 <?php echo $message; ?>
					 <p>Vui lòng các trường nhập không dấu</p>
					 <form action="#" method="post">
						 <ul>
							 <li class="text-info">Họ: </li>
							 <li><input type="text" name="firstname" value="" placeholder="vd: Mark M"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Tên: </li>
							 <li><input type="text" name="lastname" value="" placeholder="vd: Henry"></li>
						 </ul>				 
						<ul>
							 <li class="text-info">Tên đăng nhập: </li>
							 <li><input type="text" name="username" value="" placeholder="vd: MarkMHenry"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Mật khẩu: </li>
							 <li><input type="password" name="password" value="" placeholder="vd: OCika8tie!"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Nhập lại mật khẩu:</li>
							 <li><input type="password" name="repassword" value="" placeholder="vd: OCika8tie!"></li>
						 </ul>
						 <ul>
							 <li class="text-info">eMail:</li>
							 <li><input type="text" name="email" value="" placeholder="vd: MarkMHenry@teleworm.us"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Số điện thoại:</li>
							 <li><input type="text" name="phone" value="" placeholder="84+"></li>
						 </ul>
						 <ul>
							 <li class="text-info">Địa chỉ:</li>
							 <li><input type="text" name="address" value="" placeholder="vd: 2332 Cost Avenue"></li>
						 </ul>						
						 <ul>
							 <li class="text-info">Ngày, tháng, năm sinh:</li>
							 <li><input type="text" name="birthday" placeholder="vd: 1970-01-01" ></li>
						 </ul>			
						 <input type="submit" name="submit" value="Đăng ký">
					 </form>
				 </div>
			</div>
			<div class="reg-right">
				 <h3>Completely Free Account</h3>
				 <div class="strip"></div>
				 <p>Pellentesque neque leo, dictum sit amet accumsan non, dignissim ac mauris. Mauris rhoncus, lectus tincidunt tempus aliquam, odio 
				 libero tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
				 <h3 class="lorem">Lorem ipsum dolor.</h3>
				 <div class="strip"></div>
				 <p>Tincidunt metus, sed euismod elit enim ut mi. Nulla porttitor et dolor sed condimentum. Praesent porttitor lorem dui, in pulvinar enim rhoncus vitae. Curabitur tincidunt, turpis ac lobortis hendrerit, ex elit vestibulum est, at faucibus erat ligula non neque.</p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- registration-form -->