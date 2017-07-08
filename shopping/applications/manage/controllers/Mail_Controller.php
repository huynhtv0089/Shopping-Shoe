<?php
	class Mail_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->mail = $this->model->getMail();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->deleteMail($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=mail&action=index&delete=success');
			}
		}

	}
?>