<?php
	class Admin_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('admin');
		}

		public function login_Admin($user, $pass) {
			$query[] = "SELECT `username`, `id`, `role`";
			$query[] = "FROM `admin`";
			$query[] = "WHERE `username` = '$user'";
			$query[] = "AND `password` = '$pass'";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();
			return $result;
		}

		public function listAdmin($count) {
			$query[] = "SELECT `id`, `username`, `role`";
			$query[] = "FROM `admin` LIMIT 1, $count";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function countAdmin() {
			$result = $this->totalItem();
			return $result;
		}

		public function deleteAdmin($id) {
			$idAdmin = array("$id");
			$this->delete($idAdmin);
		}

		public function addAdmin($data) {
			$id = $this->insert($data, 'single');
			return $id;
		}

		public function getAdmin($id) {
			$query[] = "SELECT `id`, `username`, `password`, `role`";
			$query[] = "FROM `admin` WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function updateAdmin($data) {
			$this->update($data);
		}

		public function checkPassword($id) {
			$query = "SELECT `password` FROM `admin` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}
	}
?>