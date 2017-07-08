<?php
	class Model {
		protected $connect;
		protected $database;
		protected $table;
		protected $resultQuery;

		public function __construct($params) {
			// function connect data
			$cnn = mysql_connect($params['server'], $params['username'], $params['password']);
			if($cnn == true) {
				$this->connect = $cnn;
				$this->database = $params['database'];
				$this->table = $params['table'];
				//Luôn luôn chọn mặc định database
				$this->selectDatabase($this->database);

				//Hiển thị ngôn ngữ tiếng việt trong database
				$this->query("SET NAMES 'utf8'");
				$this->query("SET CHARACTER SET 'utf8'");
				mysql_set_charset('utf8', $cnn);
			} else {
				die('warning');
			}
		}

		public function setConfig() {
			$param = array( 'server' => DB_HOST,
							'username' => DB_USER,
							'password' => DB_PASS,
							'database' => DB_NAME,
							'table' => DB_TABLE);

			return $param;
		}

		/*
		*	Nếu không dùng construct
		*/

		// slect database
		public function selectDatabase($database) {
			if($database != null) {
				$this->database = $database;
			}
			mysql_select_db($database, $this->connect);
		}

		//set connect
		public function setConnect($connect) {
			$this->connect = $connect;
		}

		//set table
		public function setTable($table) {
			$this->table = $table;
		}

		public function affected_row() {
			//Trả về số dòng trong sql, vừa thực hiện
			return mysql_affected_rows($this->connect);
		}

		/* Sql query*/
		public function query($query) {
			$this->resultQuery = mysql_query($query, $this->connect);
			return $this->resultQuery;
		}
		/* End query */

/**************************************************************************************
|	 								INSERT                     						  |
***************************************************************************************/
		public function insert($data, $type='single') {
			if($type == 'single') {
				$arrValue = $this->dataInsert($data);
				$query = "INSERT INTO `".$this->table."`(".$arrValue['key'].") VALUES(".$arrValue['value'].")";
				$this->query($query);
			}else {
				foreach($data as $key) {
					$arrValue = $this->dataInsert($key);
					$query = "INSERT INTO `".$this->table."` (".$arrValue['key'].") VALUES (".$arrValue['value'].")";
					$this->query($query);
				}	
			}

			//Trả về id vừa insert
			return mysql_insert_id($this->connect);
		}

		public function dataInsert($data) {
			$arrValue = array();
			if(!empty($data)) {
				foreach($data as $key => $value) {
					$arrValue['key'] .= ", `$key`";
					$arrValue['value'] .= ", '$value'";
				}
				$arrValue['key'] = substr($arrValue['key'], 2);
				$arrValue['value'] = substr($arrValue['value'], 2);
			}
			return $arrValue;
		}
/**************************************************************************************
|	 								END INSERT                     	            	   |
***************************************************************************************/


/**************************************************************************************
|	 								UPDATE                     						  |
***************************************************************************************/
		public function update($data) {
			$arrValue = array();
			$i = 0;
			if(!empty($data)) {
				foreach($data[$i] as $key => $value) {
					$arrValue['key'] = $key;
					$arrValue['value'] = $value;
				}
				$i++;
				foreach($data[$i] as $_key => $_value)
					$arrValue['set'] .= ", `$_key`" . " = '$_value'";
				$arrValue['set'] = substr($arrValue['set'], 2);
			}
			$query = "UPDATE `".$this->table."` SET ".$arrValue['set']." WHERE `".$arrValue['key']."` = ".$arrValue['value']."";
			$this->query($query);

			//echo $this->affected_row();
		}
/**************************************************************************************
|	 								END UPDATE                     	            	  |
***************************************************************************************/


/**************************************************************************************
|	 								SELECT                     						  |
***************************************************************************************/		
		public function delete($data) {
			$_value = "";
			if(!empty($data)) {
				foreach($data as $value) {
					$_value .= ", $value";
				}
				$_value = substr($_value, 2);
			}
			$query = "DELETE FROM `".$this->table."` WHERE `id` IN (".$_value.")";
			$this->query($query);

			//echo $this->affected_row();
		}

/**************************************************************************************
|	 								END DELETE                     	            	  |
***************************************************************************************/


/**************************************************************************************
|	 								SELECT                     						  |
***************************************************************************************/		
		/*
		 * Hiện ra 1 danh sanh sách dữ liệu trong bảng
		 */
		public function listResult() {
			$result = array();

			/* 
			 * Kiểm tra trong bảng có dữ liệu
			 * Nếu có dữ liệu
			 */
			if(mysql_num_rows($this->resultQuery) > 0) {
				while($row = mysql_fetch_assoc($this->resultQuery))
					$result[] = $row;
				//Giải phóng dữ bộ nhớ
				mysql_free_result($this->resultQuery);
			}
			return $result;
		}

		/*
		 * Hiện ra phần tử đầu tiên trong bảng, 1 phần tử 
		 */
		public function singleResult() {
			$result = array();

			/* Nếu có dữ liệu */
			if(mysql_num_rows($this->resultQuery) > 0) {
				$result = mysql_fetch_assoc($this->resultQuery);
			}
			return $result;
		}
/**************************************************************************************
|	 								END SELECT                     	            	  |
***************************************************************************************/

	

		/*Tổng phần tử*/
		public function totalItem() {
			$sql = "SELECT COUNT(`id`) AS `total` FROM `$this->table`";
			$resultQuery = $this->query($sql);
			$total = mysql_fetch_assoc($resultQuery);
			mysql_free_result($resultQuery);

			return $this->total = $total['total'];
		}

		// destroy, close connect
		// public function __destruct() {
		// 	mysql_close($this->connect);
		// }

	}