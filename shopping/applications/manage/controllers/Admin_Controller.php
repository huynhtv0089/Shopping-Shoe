<?php
	class Admin_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			if(Session::get('flagManager') == true) {
				if(Session::get('timeoutManager') + 1800 > time())
					if(Session::get('role') != 2) 
						header('Location: index.php?module=manage&controller=category&action=index');
					else
						header('Location: index.php?module=manage&controller=message&action=index');
				else {
					unset($_SESSION['flagManager']);
					unset($_SESSION['idManager']);
					unset($_SESSION['username']);
					unset($_SESSION['role']);
					unset($_SESSION['timeoutManager']);
					header('Location: index.php?module=manage&controller=admin&action=logout');
				}
			}else if(!empty($this->_getUrl['login'])) {
				$user = $this->_getUrl['user'];
				$pass = $this->_getUrl['pass'];

				$validate = new Validate();
				$errorUser = $validate->checkInput($user, 'name', 'Username');
				$errorPass = $validate->checkInput($pass, 'password', 'Password');

				if($errorPass == '' && $errorPass == '') {
					$open = $this->model->login_Admin($user, $pass);
					
					if(isset($open['username'])) {
						Session::set('flagManager', true);
						Session::set('idManager', $open['id']);
						Session::set('username', $open['username']);
						Session::set('role', $open['role']);
						Session::set('timeoutManager', time());

						if($open['role'] != 2)
							header("Location: index.php?module=manage&controller=category&action=index");
						else
							header('Location: index.php?module=manage&controller=message&action=index');
					}else {
						header("Location: index.php?module=manage&controller=admin&action=index");
					}
				}
			}	
			
			$this->view->render('single');
		}

		public function logout_Action() {
			unset($_SESSION['flagManager']);
			unset($_SESSION['idManager']);
			unset($_SESSION['username']);
			unset($_SESSION['role']);
			unset($_SESSION['timeoutManager']);
			header('Location: index.php?module=manage&controller=admin&action=index');
		}

		public function list_Action() {

			// Lọc danh sách không cho thấy user superAdmin
			$count = $this->model->countAdmin();
			$rangeAdmin = $count - 1;
			$this->view->listAdmin = $this->model->listAdmin($rangeAdmin);

			// Delete Admin
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->deleteAdmin($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=admin&action=list&delete=success');
			}

			$this->view->render();
		}

		public function add_Action() {
			$this->view->render();

			$data = array(
							'username' => $this->_getUrl['user'],
							'password' => $this->_getUrl['pass'],
							'role' => $this->_getUrl['role'],
						);

			$validate = new Validate();
			$errorUsername = $validate->checkInput($data['username'], 'name', 'Username');
			$errorPassword = $validate->checkInput($data['password'], 'password', 'Password');
			$errorRole = $validate->checkInput($data['role'], 'number', 'Role');

			if($this->_getUrl['submit'] == 'true') {
				if($errorUsername == '' && $errorPassword == '' && $errorRole == '') {
					$result = $this->model->addAdmin($data);
					if(isset($result))
						header('Location: index.php?module=manage&controller=admin&action=list&add=success');
				}else {
					header('Location: index.php?module=manage&controller=admin&action=list&add=danger');
				}
			}
		}

		public function edit_Action() {
			$this->view->showAdmin = $this->model->getAdmin($this->getUrl['idEdit']);

			$this->view->render();	

			if(empty($this->_getUrl['newPassword']) && !empty($this->_getUrl['role'])) {
				$dataNoPass = array(
								array('id' => $this->getUrl['idEdit']),
								array('role' => $this->_getUrl['role'])
							);
			}else if(!empty($this->_getUrl['newPassword']) && !empty($this->_getUrl['role'])) {
				$data = array(
								array('id' => $this->getUrl['idEdit']),
								array(
										'password' => $this->_getUrl['newPassword'],
										'role' => $this->_getUrl['role']
									)
							);
			}

			$validate = new Validate();
			$errorPassword = $validate->checkInput($data['password'], 'password', 'Password');

			if($this->_getUrl['submit'] == 'true') {
				// Neu khong co password
				if(empty($this->_getUrl['newPassword'])) {
					$this->model->updateAdmin($dataNopass);
					header('Location: index.php?module=manage&controller=admin&action=list&edit=success');
				}else if($errorPassword == '') { //Neu co password thi validate
					$this->model->updateAdmin($data);
					header('Location: index.php?module=manage&controller=admin&action=list&edit=success');
				}else {
					header('Location: index.php?module=manage&controller=admin&action=list&edit=danger');
				}
			}
		}

		public function changePass_Action() {
			if(!isset($this->_getUrl['submit']))
				$this->view->render();

			$password = $this->_getUrl['password'];
			$newPassword = $this->_getUrl['newPassword'];
			$reNewPassword = $this->_getUrl['reNewPassword'];

			if(!empty($this->_getUrl['password']) || !empty($this->_getUrl['newPassword']) || !empty($this->_getUrl['reNewPassword'])) {
				$this->view->render();
			}

			$validate = new Validate();
			$errorPass = $validate->checkInput($password, 'password', 'Current Password');
			$errorNewPass = $validate->checkInput($newPassword, 'password', 'New Password');
			$errorReNewPass = $validate->checkInput($reNewPassword, 'password', 'Re New Password');

			$getPass = $this->model->checkPassword(Session::get('idManager'));

			if($this->_getUrl['submit'] == 'true') {
				if($errorPass == '' && $errorNewPass == '' && $errorReNewPass == '')
					if($password == $getPass['password'])
						if($newPassword == $reNewPassword) {
							$data = array(
											array('id' => Session::get('idManager')),
											array('password' => $newPassword)
										);
								$this->model->updateAdmin($data);
								header('Location: index.php?module=manage&controller=admin&action=changepass&change=success');
						}else {
							header('Location: index.php?module=manage&controller=admin&action=changepass&change=danger');
						}
					else
						header('Location: index.php?module=manage&controller=admin&action=changepass&change=danger');
				else
					header('Location: index.php?module=manage&controller=admin&action=changepass&change=danger');
			}
				
		}
	}
?>