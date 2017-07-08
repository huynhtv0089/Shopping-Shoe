<?php
	class Controller {
		protected $model;
		protected $view;
		protected $helper;
		protected $getUrl;
		protected $pagination;

		public function __construct($getUrl) {
			/*Lấy các biến trên URL, bao gồm: module, controller, ..... */
			$this->setGetUrl($getUrl);

			/* Khi khởi tạo đối tượng, tự gọi hàm setModel */
			$this->setModel($getUrl['module'], $getUrl['controller']);
			/* Khi khởi tạo đối tượng, tự gọi hàm setView */
			$this->setView($getUrl['module'], $getUrl['controller'], $getUrl['action']);
			/* Khi khởi tạo đối tượng, tự gọi hàm setHelper */
			$this->setHelper();
			/* Khi khởi tạo đối tượng, tự gọi hàm setPage */
		}

		public function setModel($module, $model) {
			/* Lấy tên model*/
			$modelName = ucfirst($model) . '_Model';
			/* Tạo đường dẫn để lấy file (require) */
			$filePath = APPLICATION_PATH . $module . DS . 'models' . DS . $modelName . '.php';
			if(file_exists($filePath)) {
				require_once $filePath;
				$this->model = new $modelName();
			}
		}

		/* Hàm để tạo đối tượng View */
		public function setView($module, $control, $action) {
			$this->view = new View($module, $control, $action);
		}

		public function getView() {
			return $this->view;
		}

		/* Hàm để tạo đối tượng Helper */
		public function setHelper() {
			$this->helper = new Helper();
		}

		/* SET, GET  URL*/
		public function setGetUrl($getUrl) {
			$this->getUrl = $getUrl;
		}
		public function getGetUrl() {
			return $this->getUrl;
		}
	}
?>