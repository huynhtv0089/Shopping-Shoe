<?php
	class Home_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('product');
		}

		public function list_item() {
			$query[] = "SELECT * FROM `product`";
			$query[] = "ORDER BY `id` DESC";
			$query[] = "LIMIT 0, 9";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function list_hotItem() {
			$query[] = "SELECT `id`, `image_link`, `name`, `price`, `discount` FROM `product`";
			$query[] = "WHERE `hotProduct` = 1";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;	
		}

		public function getBanner() {
			$query = "SELECT * FROM `banner`";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function getService() {
			$query = "SELECT * FROM `service`";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}
	}

?>