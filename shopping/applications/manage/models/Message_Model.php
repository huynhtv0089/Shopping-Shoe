<?php
	class Message_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('contact');
		}

		public function listMessage() {
			$query = "SELECT `id`, `name`, `mail`, `date`, `time` FROM `contact`";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}

		public function deleteMessage($id) {
			$idMessage = array("$id");
			$this->delete($idMessage);
		}

		public function infoMessage($id) {
			$query[] = "SELECT `name`, `mail`, `subject`, `message`";
			$query[] = "FROM `contact`";
			$query[] = "WHERE `id` = $id";
			$query = implode(" ", $query);
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}
	}
?>