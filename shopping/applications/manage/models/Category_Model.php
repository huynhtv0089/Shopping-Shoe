<?php
	class Category_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('category');
		}

		public function list_category() {
			$query = "SELECT * FROM `category`";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function findClassify($id) {
			$query = "SELECT `name` FROM `category` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}		

		public function add_category($data) {
			$id = $this->insert($data, 'single');
			return $id;
		}

		public function delete_category($id) {
			$idUser = array("$id");
			$query = $this->delete($idUser);
		}

		public function load_category($id) {
			$query[] = "SELECT * FROM `category`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}	

		public function edit_category($data) {
			$this->update($data);
		}
	}
?>