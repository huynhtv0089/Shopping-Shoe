<?php
	class View {
		public $module;
		public $control;
		public $action;

		public function __construct($module, $control, $action) {
			/* Lấy modulde và controller từ khi khởi tạo */
			$this->module = $module;
			$this->control = $control;
			$this->action = $action;
		}

		/* Hàm kéo file html vào thường là file views trong application */
		public function render($option = 'full') {
			/* Tạo đường dẫn, dẫn đến file trong thư mục views ở application */
			$filePath = APPLICATION_PATH . $this->module . DS . 'views' . DS . $this->control . DS . $this->action . '.php';
			if(file_exists($filePath)) {
				if($option == 'full') {
					$this->setTemplate('header');
					require_once $filePath;
					$this->setTemplate('footer');
				}else {
					require_once $filePath;
				}
			}else {
				echo '<h3>Error Render</h3>';
			}
		}

		/* Hàm kéo 2 file header và footer vào cho đủ khung trang web*/
		public function setTemplate($fileName) {
			$filePath = TEMPLATE_PATH . $this->module . DS . $fileName . '.php';

			if(file_exists($filePath)) {
				require_once $filePath;
			}else {
				echo '<h3>Error file template</h3>';
			}
		}
	}
?>