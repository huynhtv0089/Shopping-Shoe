<?php
	class Settings_Model extends Model {

		private $params;

		public function __construct() {
			$this->params = $this->setConfig();
			parent::__construct($this->params);
		}

		public function getLogo() {
			$query = "SELECT * FROM `logo`";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function updateLogo($pic, $picName) {
			$query = "UPDATE `logo` SET `pic`= '$pic', `picName`= '$picName' WHERE `id` = 'logo'";
			$this->query($query);
		}

		public function getBanner() {
			$query = "SELECT * FROM `banner`";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function updateBanner($pN, $st1, $sp1, $st2, $sp2, $st3, $sp3) {
			$query[] = "UPDATE `banner`";
			$query[] = "SET `picBanner`= '$pN', `slideTitle_01`= '$st1', `slidePara_01`= '$sp1', `slideTitle_02`= '$st2', `slidePara_02`= '$sp2', `slideTitle_03`= '$st3', `slidePara_03`= '$sp3'";
			$query[] = "WHERE `id` = 'banner'";
			$query = implode(" ", $query);
			$this->query($query);
		}

		public function getTag() {
			$query = "SELECT `tagHTML` FROM `tag`";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function updateTag($tagHTML) {
			$query = "UPDATE `tag` SET `tagHTML`= '$tagHTML' WHERE `id`= 'tag'";
			$this->query($query);
		}

		public function getPolicy() {
			$query = "SELECT * FROM `policy`";
			$this->query($query);
			$result = $this->listResult();

			return $result;		
		}

		public function addPolicy($name) {
			$query = "INSERT INTO `policy`(`name`) VALUES ('$name')";
			$this->query($query);

			return $result;		
		}

		public function deletePolicy($id) {
			$query = "DELETE FROM `policy` WHERE `id` = $id";
			$this->query($query);

			return $result;		
		}

		public function getSinglePolicy($id) {
			$query = "SELECT `name` FROM `policy` WHERE `id` = $id";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function updatePolicy($id, $name) {
			echo $query = "UPDATE `policy` SET `name`= '$name' WHERE `id` = $id";
			//$this->query($query);

			return $result;		
		}		

		public function getAds($id) {
			$query = "SELECT * FROM `advertisement` WHERE `id` = '$id'";
			$this->query($query);
			$result = $this->singleResult();

			return $result;	
		}

		public function updateAds($id, $width, $height, $picName, $code) {	
			$query[] = "UPDATE `advertisement`";
			$query[] = "SET `width`= '$width', `height`= '$height', `picAds`= '$picname', `code`= '$code'";
			$query[] = "WHERE `id` = '$id'";
			$query = implode(" ", $query);
			$this->query($query);
		}

		public function getFooterInfo($value) {
			$query = "SELECT * FROM `$value`";
			$this->query($query);
			$result = $this->listResult();

			return $result;
		}


		public function updateFr1($value, $name1, $name2, $name3, $name4, $name5, $name6) {
			$data[] = $name1;
			$data[] = $name2;
			$data[] = $name3;
			$data[] = $name4;
			$data[] = $name5;
			$data[] = $name6;
			for($i=0; $i<=count($data); $i++) {
				$query = "UPDATE `$value` SET `name`= '$data[$i]' WHERE `id`= ($i+1)";
				$this->query($query);
			}
		}

		public function getIframeMap() {
			$query = "SELECT `iframe` FROM `map`";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function updateIframe($codeMap) {			
			$query = "UPDATE `map` SET `iframe`= '$codeMap' WHERE `id`= 'map'";
			$this->query($query);
		}

		public function getLicense() {
			$query = "SELECT `name` FROM `license`";
			$this->query($query);
			$result = $this->singleResult();

			return $result;
		}

		public function updateLicense($nameLicense) {			
			$query = "UPDATE `license` SET `name`= '$nameLicense' WHERE `id`= 'license'";
			$this->query($query);
		}
	}
?>