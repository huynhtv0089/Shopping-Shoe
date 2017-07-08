<?php
	class Product_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('product');
		}

		public function list_product($location, $item) {
			$query[] = "SELECT * FROM `product`";
			$query[] = "ORDER BY `id` DESC";
			$query[] = "LIMIT $location, $item";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function searchItem($location, $item, $str) {
			$query[] = "SELECT * FROM `product`";
			$query[] = "WHERE `name` LIKE '%$str%'";
			$query[] = "ORDER BY `id` DESC";
			$query[] = "LIMIT $location, $item";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function menuItem($location, $item, $id) {
			$query[] = "SELECT * FROM `product`";
			$query[] = "WHERE `category_id` = $id";
			$query[] = "LIMIT $location, $item";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function item_single($id) {
			$query[] = "SELECT * FROM `product`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function firstListPro($id) {
			$query[] = "SELECT * FROM `category`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;		
		}

		public function listProduct($parents) {
			$query[] = "SELECT `id`, `name` FROM `category`";
			$query[] = "WHERE `parents` = $parents";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function getOtherPro($category_id) {
			$query[] = "SELECT `id`, `name`, `image_link`, `price`, `discount` FROM `product`";
			$query[] = "WHERE `category_id` = $category_id";
			$query[] = "ORDER BY `id` DESC LIMIT 0, 5";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;	
		}

		public function sum_item() {
			$result = $this->totalItem();
			return $result;
		}

		public function getIdproduct($idP) {
			$query = "SELECT `id` FROM `checkout` WHERE `id_product` = $idP";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function check_product($arrIdP, $idU) {
			$query[] = "SELECT `id`";
			$query[] = "FROM `checkout`";
			$query[] = "WHERE `id_product` IN ($arrIdP)";
			$query[] = "AND `id_user` = '$idU'";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function getQuantity($id) {
			$query = "SELECT `size`, `quantity` FROM `quantity_item` WHERE `id_product` = $id";
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function addToCart($data) {
			$query[] = "INSERT INTO `checkout`(`name`, `date`, `time`, `price`, `size`, `quantity`, `status`, `id_product`, `id_user`)";
			$query[] = "VALUES ('".$data['name']."', '".$data['date']."', '".$data['time']."', '".$data['price']."', '".$data['size']."', '".$data['quantity']."', '".$data['status']."', '".$data['id_product']."', '".$data['id_user']."')";
			$query = implode(" ", $query);
			$this->query($query);
		}

		public function updateQuantityPro($id_product, $size, $quantity) {
			echo $query = "UPDATE `quantity_item` SET `quantity`= $quantity WHERE `id_product` = $id_product AND `size` = '$size' ";
			$this->query($query);
		}

		public function getTag() {
			$query = "SELECT `tagHTML` FROM `tag` WHERE `id` = 'tag'";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function getAds($id) {
			$query = "SELECT `width`, `height`, `picAds`, `code` FROM `advertisement` WHERE `id` = '$id'";
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

		public function getMenu() {
			$query = "SELECT `id`, `name`, `classify` FROM `category`";
			$this->query($query);
			$result = $this->listResult();
			return $result;	
		}
	}
?>