<?php
	class Template_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
		}

		public function distinct() {
			$query = "SELECT DISTINCT(`classify`) FROM `category`";
			
			$this->query($query);
			$result = $this->listResult();
			return $result;	
		}

		public function getCategory() {
			$query = "SELECT `id`, `name`, `classify` FROM `category`";
			
			$this->query($query);
			$result = $this->listResult();
			return $result;
		}

		public function countMenus() {
			$query = "SELECT COUNT(DISTINCT(`classify`)) AS sum FROM `category`";
			
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

		public function getLogo() {
			$query = "SELECT `pic`, `picName` FROM `logo`";
			
			$this->query($query);
			$result = $this->singleResult();
			return $result;	
		}

		public function insertMail($mail) {
			$query = "INSERT INTO `mail`(`mailUser`) VALUES ('$mail')";
			$this->query($query);
		}

		public function getFr($value) {
			$query = "SELECT `name` FROM `$value`";
			
			$this->query($query);
			$result = $this->listResult();
			return $result;			
		}

		public function getMap() {
			$query = "SELECT `iframe` FROM `map`";
			
			$this->query($query);
			$result = $this->singleResult();
			return $result;			
		}

		public function getLicense() {
			$query = "SELECT `name` FROM `license`";
			
			$this->query($query);
			$result = $this->singleResult();
			return $result;			
		}
	}
?>