<?php
	class Account_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			if(Session::get('flag') == true) {
				if(Session::get('timeout') + 1800 > time())
					header('Location: index.php?module=home&controller=home&action=index');
				else {
					unset($_SESSION['flag']);
					unset($_SESSION['id']);
					unset($_SESSION['sumPrice']);
					unset($_SESSION['countId']);
					unset($_SESSION['fullname']);
					unset($_SESSION['timeout']);
					header('Location: index.php?module=home&controller=account&action=index');
				}
			}else if(isset($this->_getUrl['submit'])) {
				$user = $this->_getUrl['username'];
				$pass = $this->_getUrl['password'];

				$validate = new Validate();
				$this->view->_errorUser = $validate->checkInput($user, 'name', 'username');
				$this->view->_errorPass = $validate->checkInput($pass, 'password', 'password');

				if($this->view->_errorUser == '' && $this->view->_errorPass == '') {
					$infoUser = $this->model->login($user, $pass);
					foreach($infoUser as $key =>$value) {
						$fullname = $value['fullname'];
						$id = $value['id'];
					}

					if(!empty($fullname) && !empty($id)) {
						Session::set('flag', true);
						Session::set('id', $id);
						Session::set('sumPrice', $arrCart['sumPrice']);
						Session::set('countId', $arrCart['countId']);
						Session::set('fullname', $fullname);
						Session::set('timeout', time());
						header('Location: index.php?module=home&controller=home&action=index');
					}
				}
			}
			
			$this->view->render();
		}

		public function logout_Action() {
			unset($_SESSION['flag']);
			unset($_SESSION['id']);
			unset($_SESSION['sumPrice']);
			unset($_SESSION['countId']);
			unset($_SESSION['fullname']);
			unset($_SESSION['timeout']);
			header('Location: index.php?module=home&controller=account&action=index');
		}

		public function register_Action() {	
			if(!$this->_getUrl['submit'])
			 	$this->view->render();
			
			
			$firstname = $this->_getUrl['firstname'];
			$lastname = $this->_getUrl['lastname'];
			$username = $this->_getUrl['username'];
			$password = $this->_getUrl['password'];
			$repassword = $this->_getUrl['repassword'];
			$email = $this->_getUrl['email'];
			$phone = $this->_getUrl['phone'];
			$address = $this->_getUrl['address'];

			//$this->view->getInfo;
			$validate = new Validate();
			$this->view->errorFirstname = $validate->checkInput($firstname, 'name', 'Firstname');
			$this->view->errorLastname = $validate->checkInput($lastname, 'name', 'Lastname');
			$this->view->errorUsername = $validate->checkInput($username, 'name', 'Username');
			$this->view->errorPassword = $validate->checkInput($password, 'password', 'Password');
			$this->view->errorRePassword = $validate->checkInput($repassword, 'password', 'Re-Password');
			$this->view->errorEmail = $validate->checkInput($email, 'email', 'Email');
			$this->view->errorPhone = $validate->checkInput($phone, 'phone', 'Phone');
			$this->view->errorAddress = $validate->checkInput($address, 'address', 'Address');

			if($this->view->errorFirstname == '' && $this->view->errorLastname == '' && $this->view->errorUsername == '' && $this->view->errorPassword == '' && $this->view->errorRePassword == '' && $this->view->errorEmail == '' && $this->view->errorPhone == '' && $this->view->errorAddress == '') {

				if(isset($firstname) && isset($lastname) && isset($username) && isset($password) && isset($repassword) && isset($email) && isset($phone) && isset($address) && ($password == $repassword) ) {

					$data = array(
									'firstname' => $firstname,
									'lastname' => $lastname,
									'username' => $username,
									'password' => $password,
									'email' => $email,
									'phone' => $phone,
									'address' => $address
								);
					$result = $this->model->register($data);
					if(isset($result))
						header('Location: index.php?module=home&controller=account&action=index&register=success');

				}

			}

			if(isset($this->_getUrl['submit']))
				$this->view->render();	
		}
		

		public function home_Action() {
			$this->view->infoAcc = $this->model->infoAccount(Session::get('id'));
			$this->view->infoCheck = $this->model->infoCheckout(Session::get('id'), 0, 5);
			$this->view->render();
		}

		public function editInfo_Action() {
			$this->view->infoAccount = $this->model->infoNeedEdit(Session::get('id'));

			$firstname = $this->_getUrl['firstname'];
			$lastname = $this->_getUrl['lastname'];
			$currentPassword = $this->_getUrl['currentPassword'];
			$newPassword = $this->_getUrl['newPassword'];
			$reNewPassword = $this->_getUrl['reNewPassword'];
			$phone = $this->_getUrl['phone'];
			$address = $this->_getUrl['address'];

			if(isset($this->_getUrl['submit'])) {
				// Nếu có thay đổi password
				if(!empty($currentPassword) && !empty($newPassword) && !empty($reNewPassword)) {
					if($currentPassword == $this->view->infoAccount['password']) {
						if($newPassword == $reNewPassword) {
							$data = array(
										array('id' => Session::get('id')),
										array(	
												'firstname' => $firstname,
												'lastname' => $lastname,
												'password' => $newPassword,
												'phone' => $phone,
												'address' => $address
											)
									);
							$this->model->updateInfo($data);
							header('Location: index.php?module=home&controller=account&action=home');
						}
					}
				}else { // Nếu không muốn thay đổi password
					$data = array(
										array('id' => Session::get('id')),
										array(	
												'firstname' => $firstname,
												'lastname' => $lastname,
												'phone' => $phone,
												'address' => $address
											)
									);
							$this->model->updateInfo($data);
							header('Location: index.php?module=home&controller=account&action=home');
				}
			}

			$this->view->render();
		}

		public function history_Action() {	
			$sumTmp = $this->model->sumItem(Session::get('id'));
			$sumItem = $sumTmp['sumItem'];

			$itemPage = 20;
			$location = ($this->_getUrl['p']-1) * $itemPage;
			$pagination = new Pagination($this->_getUrl['p'], $itemPage, $sumItem);
			$this->view->sumPage = ceil($sumItem/$itemPage);
			$this->view->page = $pagination->showPagination('index.php?module=home&controller=account&action=history');

			$this->view->infoHistory = $this->model->infoCheckout(Session::get('id'), 0, 20);

			$this->view->render();
		}

	}
?>