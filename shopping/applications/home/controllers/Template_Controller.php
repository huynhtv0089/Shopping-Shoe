<?php
	class Template_Controller {

		public $getPostFooter;

		public function getModel() {
			/* Lấy tên model*/
			$filePath = APPLICATION_PATH . 'home' . DS . 'models' . DS . 'Template_Model.php';

			if(file_exists($filePath)) {
				require_once $filePath;
				$model = new Template_Model();
			}

			return $model;
		}
		
		public function header_Action() {

			//Lọc classify
			$this->getMenus = $this->getModel()->distinct();
			// Xóa classify => 0
			unset($this->getMenus[0]);
			//Lấy danh sách category
			$this->listCategory = $this->getModel()->getCategory();

			//Get logo
			$this->logo = $this->getModel()->getLogo();
		}

		public function footer_Action($getPost) {
			//Insert mail

			// Kiểm tra mail
			$mail = $getPost['mailUser'];
			$validate = new Validate();
			$errorEmail = $validate->checkInput($mail, 'email', 'Mail');

			if($errorEmail == '') {
				$this->getModel()->insertMail($getPost['mailUser']);
				header("Location: index.php?module=home&controller=notification&action=index&option=mail");
			}
			
			$this->fr1 = $this->getModel()->getFr('footerinfo1');
			$this->fr2 = $this->getModel()->getFr('footerinfo2');
			$this->map = $this->getModel()->getMap();
			$this->license = $this->getModel()->getLicense();
		}

	}
?>