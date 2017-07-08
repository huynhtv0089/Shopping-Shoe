<?php
	class QuantityItem_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('quantity_item');
		}

		public function getProduct($id) {
			$query = "SELECT `name`, `size` FROM `product` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function getId($id) {
			$query = "SELECT `id` FROM `quantity_item` WHERE `id_product` = $id";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function delete_Product($id) {
			$idProduct = array("$id");
			$query = $this->delete($idProduct);
		}

		public function insertQuantity($data) {
			$id = $this->insert($data, 'multy');
			return $id;
		}
	}
?>