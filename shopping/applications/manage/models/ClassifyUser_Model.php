<?php
	class ClassifyUser_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('classify_user');
		}

		public function classifyUser() {
			$query[] = "SELECT *";
			$query[] = "FROM `classify_user`";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function loadClassifiUser($id) {
			$query[] = "SELECT *";
			$query[] = "FROM `classify_user`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function editClassifyUser($data) {
			$this->update($data);
		}

		public function deleteClassifyUser($id) {
			$idUser = array("$id");
			$query = $this->delete($idUser);
		}

		public function add_classify($data) {
			$id = $this->insert($data, 'single');
			return $id;
		}
	}
?>