<?php
	class Bootstrap {
		private $getUrl;
		private $objController;	

		public function __construct() {
			Session::init();
			$this->getUrl = array_merge($_GET, $_POST, $_FILES);

			//Tên controller sau khi lấy $_GET
			$controlName = ucfirst($this->getUrl['controller']) . '_Controller';
			//Tạo đường dẫn
			$filePath = APPLICATION_PATH . $this->getUrl['module'] . DS . 'controllers' . DS . $controlName . '.php';
			//kiểm tra đường dẫn
			if(file_exists($filePath)) {
				require_once $filePath;
				$this->objController = new $controlName($this->getUrl);

				//Tạo ra action
				$actionName = $this->getUrl['action'] . '_Action';
				//kiểm tra action, và gọi action ra	
				if(method_exists($this->objController, $actionName) == true) {
					$this->objController->$actionName();
					
				} else { // Nếu ko tồn tại action, đưa ra meg
					echo '<h3>Error Action ' . __METHOD__ . '</h3>';
				}
			}else { // Nếu ko có đường dẫn, đưa ra meg
				echo '<h3>Error file path ' . __METHOD__ . '</h3>';
			}
		}
	}
?>