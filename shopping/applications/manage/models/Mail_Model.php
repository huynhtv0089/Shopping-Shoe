<?php
	class Mail_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('mail');
		}

		public function getMail() {
			$query = "SELECT * FROM `mail`";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function deleteMail($id) {
			$idMail = array("$id");
			$query = $this->delete($idMail);
		}
	}
?>