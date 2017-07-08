<div class="cart-items">
	<div class="container">
	<div class="dreamcrub">
			   	 <ul class="breadcrumbs">
                    <li class="home">
                       <a href="index.php?module=home&controller=home&action=index" title="Go to Home Page">Home</a>&nbsp;
                       <span>&gt;</span>
                    </li>
                    <li class="women">
                       Chỉnh sửa thông tin
                    </li>
                </ul>
                <ul class="previous">
                	<li><a href="index.php?module=home&controller=account&action=home">Quay lại trang chủ</a></li>
                </ul>
                <div class="clearfix"></div>
			   </div>
			 <h2>Thành viên: <?php echo Session::get('fullname'); ?></h2>
		<div class="cart-gd">
			<div class="cart-header" >
				<div class="contact-form">
					<form action="#" method="post">
						<div class="contact-left">
							<p>Firstname: </p>
							<input type="text" name="firstname" value="<?php echo $this->infoAccount['firstname']; ?>" />
							<p>Lastname: </p>
							<input type="text" name="lastname" value="<?php echo $this->infoAccount['lastname']; ?>" />
						</div>
						<div class="contact-left" style="margin-left:30px;">
							<p>Mật khẩu hiện tại: </p>
							<input type="password" placeholder="Mật khẩu hiện tại" name="currentPassword">
							<p>Mật khẩu mới: </p>
							<input type="password" placeholder="Mật khẩu mới" name="newPassword">
							<p>Nhập lại mật khẩu mới: </p>
							<input type="password" placeholder="Nhập lại mật khẩu mới" name="reNewPassword">
						</div>
						<div class="contact-left" style="margin-left:30px;">
							<p>Số điện thoại: </p>
							<input type="text" name="phone" value="<?php echo $this->infoAccount['phone']; ?>" />
							<p>Địa chỉ: </p>
							<input type="text" name="address" value="<?php echo $this->infoAccount['address']; ?>" />
						</div>
						<div class="clearfix"></div>
						<input type="submit" value="Thay đổi" name="submit">
					</form>
				</div>
		   	<div class="clearfix"></div>
			</div>									
  		</div>
	</div>
</div>