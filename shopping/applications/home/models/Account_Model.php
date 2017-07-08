<?php
	class Account_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('user');
		}

		public function login($username, $password) {
			$query[] = "SELECT CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `id`";
			$query[] = "FROM `user`";
			$query[] = "WHERE `username` = '$username'";
			$query[] = "AND `password` = '$password'";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function register($data) {
			$id = $this->insert($data, 'single');
			return $id;
		}

		public function cart($id) {
			$query= "SELECT count(`id`) AS 'countId', sum(`price`) AS 'sumPrice' FROM `checkout` WHERE `id_user` = $id";
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function infoAccount($id) {
			$query[] = "SELECT CONCAT(`firstname`, ' ', `lastname`) AS `fullname`, `phone`, `address`, `email`";
			$query[] = "FROM `user`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

		public function infoNeedEdit($id) {
			$query[] = "SELECT `firstname`, `password`, `lastname`, `phone`, `address`";
			$query[] = "FROM `user`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

		public function updateInfo($data) {
			$this->update($data);
		}

		public function infoCheckout($id, $location, $item) {
			$query[] = "SELECT `name`, `status`, `date`";
			$query[] = "FROM `checkout`";
			$query[] = "WHERE `id_user` = $id";
			$query[] = "LIMIT $location, $item";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();
			return $result;	
		}

		public function sumItem($id) {
			$query[] = "SELECT count(`id`) AS `sumItem`";
			$query[] = "FROM `checkout`";
			$query[] = "WHERE `id_user` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

	}

?>