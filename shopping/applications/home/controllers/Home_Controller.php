<?php
	class Home_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
			Session::init();
		}

		public function index_Action() {
			$this->view->listItem = $this->model->list_item();
			$this->view->hotItem = $this->model->list_hotItem();

			//get Banner
			$this->view->banner = $this->model->getBanner();

			//get Service
			$this->view->service = $this->model->getService();
			
			$this->view->render();

			$resultSearch = $this->_getUrl['search'];
			$validate = new Validate();
			$this->view->errorSearch = $validate->checkInput($resultSearch, 'search', 'Tìm kiếm');

			// Nếu có tìm kết quả thì redirect page
			if($this->view->errorSearch == '')
				header('Location: index.php?module=home&controller=product&action=index&search='.$resultSearch.'&p=1');
		}
	}

?>