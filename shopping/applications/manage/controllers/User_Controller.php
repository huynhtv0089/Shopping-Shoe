<?php
	class User_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->users = $this->model->listUser();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->deleteUser($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=user&action=index&delete=success');
			}
		}

		public function info_Action() {
			$this->view->info_User = $this->model->infoUser($this->_getUrl['idView']);
			$this->view->infoCheckout = $this->model->selectCheckout($this->_getUrl['idView']);

			$this->view->render();
			if(isset($this->_getUrl['idDelete'])) {
				$this->model->deleteCheckout($this->_getUrl['idDelete']);
				if($this->_getUrl['status'] == 0) {
					$quantityCurrent = $this->model->getQuantity($this->_getUrl['idPro'], $this->_getUrl['size']);
					$quantity = $quantityCurrent['quantity'] + $this->_getUrl['quantity'];
					$this->model->updateQuantity($quantity, $this->_getUrl['idPro'], $this->_getUrl['size']);
				}
				header("Location: index.php?module=manage&controller=user&action=info&idView=4&delete=success");
			}

			if(isset($this->_getUrl['idEdit'])) {
				$this->model->editStatus($this->_getUrl['idEdit']);
				header("Location: index.php?module=manage&controller=user&action=info&idView=4&status=success");
			}
		}

		public function edit_Action() {
			$this->view->edit_user = $this->model->loadUser($this->_getUrl['idEdit']);
			$this->view->render();

			$data = array(
							array('id' => $this->_getUrl['idEdit']),
							array(	'firstname' => $this->_getUrl['firstname'], 
									'lastname' => $this->_getUrl['lastname'],
									'password' => $this->_getUrl['password'],
									'email' => $this->_getUrl['email'],
									'address' => $this->_getUrl['address'],
								)
						);
			if(isset($this->_getUrl['submit'])) {
				$this->model->editUser($data);
				header('Location: index.php?module=manage&controller=user&action=index&edit=success');
			} else if(isset($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=user&action=index');
			}
		}
	}

?>