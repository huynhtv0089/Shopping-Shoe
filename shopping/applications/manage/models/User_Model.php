<?php
	class User_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('user');
		}

		public function infoUser($id) {
			$query[] = "SELECT `u`.`id`, CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `username`, `password`, `email`, `address`, `c`.`description`";
			$query[] = "FROM `user` AS `u`, `classify_user` AS `c`";
			$query[] = "Where `u`.`classify_id` = `c`.`id`";
			$query[] = "AND `u`.`id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function listUser() {
			$query[] = "SELECT `id`, CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `username`, `classify_id`";
			$query[] = "FROM `user`";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function loadUser($id) {
			$query[] = "SELECT `id`, `firstname`, `lastname`, `username`, `password`, `email`, `address`";
			$query[] = "FROM `user`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}
		
		public function editUser($data) {
			$this->update($data);
		}
		
		public function deleteUser($id) {
			$idUser = array("$id");
			$query = $this->delete($idUser);
		}

		public function selectCheckout($id) {
			$query[] = "SELECT * FROM `checkout`";
			$query[] = "WHERE `id_user` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;	
		}

		public function deleteCheckout($id) {
			$query = "DELETE FROM `checkout` WHERE `id` = $id";
			$this->query($query);
		}

		public function getQuantity($idPro, $size) {
			$query = "SELECT `quantity` FROM `quantity_item` WHERE `id_product` = $idPro AND `size` = '$size'";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function updateQuantity($quantity, $idPro, $size) {
			$query = "UPDATE `quantity_item` SET `quantity`= $quantity WHERE `id_product` = $idPro AND `size` = '$size'";
			$this->query($query);
		}

		public function editStatus($id) {
			$query = "UPDATE `checkout` SET `status`= '1' WHERE `id` = $id";
			$this->query($query);
		}
	}

?>