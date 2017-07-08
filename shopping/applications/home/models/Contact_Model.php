<?php
	class Contact_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
			$this->setTable('contact');
		}

		public function insertContact($data) {
			$result = $this->insert($data);

			return $result;
		}
	}
?>