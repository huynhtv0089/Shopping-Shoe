<?php
	class Message_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->message = $this->model->listMessage();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->deleteMessage($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=message&action=index&delete=success');
			}
		}

		public function view_Action() {
			$this->view->info = $this->model->infoMessage($this->_getUrl['idView']);
			$this->view->render();

			if($this->_getUrl['back'] == 'true')
				header('Location: index.php?module=manage&controller=message&action=index');
		}
	}
?>