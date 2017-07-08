<?php
	class Product_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('product');
		}

		public function list_Product() {
			$query[] = "SELECT `id`, `name`, `category_id`";
			$query[] = "FROM `product`";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function info_Product($id) {
			$query[] = "SELECT *";
			$query[] = "FROM `product`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function info_Size($id) {
			$query = "SELECT `size` FROM `product` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function info_Quantity($id) {
			$query = "SELECT `size`, `quantity` FROM `quantity_item` WHERE `id_product` = $id";
			$this->query($query);
			$result = $this->listResult();

			return $result;	
		}
		
		public function delete_Product($id) {
			$idProduct = array("$id");
			$query = $this->delete($idProduct);
		}
		public function delete_Quantity($id) {
			$query = "DELETE FROM `quantity_item` WHERE `id_product` IN ($id)";
			$this->query($query);
		}

		public function edit_Product($data) {
			$this->update($data);
		}

		public function edit_Size($data) {
			$this->update($data);
		}

		public function option_category() {
			$query = "SELECT `id`, `name`, `parents` FROM `category`";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function selectedCategory($id) {
			$query = "SELECT `id`, `name` FROM `category` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function checkedSlide() {
			$query = "SELECT `id` FROM `product` WHERE `hotProduct` = 1";
			$this->query($query);
			$result = $this->listResult();

			return $result;	
		}

		public function add_product($data) {
			$id = $this->insert($data, 'single');
			return $id;
		}

		public function getIdProduct($name) {
			$query = "SELECT `id` FROM `product` WHERE `name` = '$name'";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}
	}
?>