<?php
	class QuantityItem_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function add_Action() {
			$this->view->item = $this->model->getProduct($this->_getUrl['idP']);
			$this->view->render();

			unset($this->view->getValue['submit']);
			$arrItem = array();

			foreach($this->view->getValue as $key => $value)
				$arrItem[] = $key . ', ' . $value;
			$arrItems = array();
			foreach($arrItem as $key => $value)
				$arrItems[] = explode(", ", $value);

			$data = array();
			$idProduct = $this->_getUrl['idP'];
			for($i=0; $i<count($arrItems); $i++) {
				$data[$i]['size'] = $arrItems[$i][0];
				$data[$i]['quantity'] = $arrItems[$i][1];
				$data[$i]['id_product'] = $idProduct;
			}
			if(isset($this->_getUrl['submit'])) {
				$idItem = $this->model->getId($this->_getUrl['idP']);
				$idP = '';
				foreach($idItem as $key => $value)
					$idP .= ', ' . $value['id'];
				$idP = substr($idP, 2);
				$this->model->delete_Product($idP);
				$id = $this->model->insertQuantity($data);
				if($id != 0)
					header('Location: index.php?module=manage&controller=product&action=index');
			}
			if(isset($this->_getUrl['back']))
				header('Location: index.php?module=manage&controller=quantityItem&action=add&idP='.$this->_getUrl['idP']);
		}

	}
?>