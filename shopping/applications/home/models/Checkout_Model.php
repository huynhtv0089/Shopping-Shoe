<?php
	class Checkout_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('checkout');
		}

		public function sumItem($id) {
			$query = "SELECT count(`id`) as count FROM `checkout` WHERE `id_user` = $id";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function listProduct($idU, $location, $itemPage) {
			$query[] = "SELECT a.*, b.`image_link`, b.`discount`, c.`classify_id`";
			$query[] = "FROM `checkout` a, `product` b, `user` c";
			$query[] = "WHERE `id_user` = '$idU' AND a.`id_user` = c.`id` AND a.`id_product` = b.`id`";
			$query[] = "ORDER BY a.`id` DESC";
			$query[] = "LIMIT $location, $itemPage";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function updateCart($data) {
			$this->update($data);
		}

	}
?>