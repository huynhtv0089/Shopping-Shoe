<?php
	class Validate {

		public $_error = '';

		public function checkInput($value, $key, $name) {
			if(trim($value)==false) {
				$this->_error = '<i style="color:red;">*Giá trị '.$name.' không được rỗng</i>';
			}else {
				switch($key) {
					case 'name':
						$pattern = '#^[a-zA-Z0-9_\.\s]{4,31}$#';
						break;
					case 'content':
						$pattern = '#^[a-zA-Z0-9_\.\s]{4,}$#';
						break;
					case 'password':
						$pattern = '#^(?=.*\d)(?=.*[A-Z])(?=.*\W).{6,}$#';
						break;
					case 'email':
						$pattern = '#^[a-zA-Z0-9_\.]{4,31}@[a-z0-9]{2,}(\.[a-z0-9]{2,4}){1,2}$#';
						break;
					case 'phone':
						$pattern = '#^[0-9]{10,11}$#';
						break;
					case 'address':
						$pattern = '#^[a-zA-Z0-9_\.\s]{4,}$#';
						break;
					case 'price':
						$pattern = '#^[0-9\.\,]{1,}$#';
						break;
					case 'number':
						$pattern = '#^[0-9]{1,}$#';
						break;
					case 'search':
						$pattern = '#^[a-zA-Z0-9\.\s]{1,}$#';
						break;
				}
				if(preg_match($pattern, $value) == false)
					if(($key == 'password' && $key == 'repassword') || $key == 'password' || $key == 'repassword') {
						$this->_error = '<i style="color:red;">*Giá trị '. $name .' không hợp lệ</i><br />';
						$this->_error .=  '<i style="color:red">Độ dài thấp nhất 6 kí tự và bắt buộc có 1 ký tự in hoa, 1 ký tự số, 1 ký tự đặc biệt</i>';
					}else{
						$this->_error = '<i style="color:red;">*Giá trị '. $name .' không hợp lệ</i>';
					}
			}	


			return $this->_error;
		}


		/* Check file input*/
		public function checkFile($filename, $size) {
			if(empty($filename)) {
				$this->_error = '<i style="color:red;">*Giá trị file, image không tồn tại</i>';
			}else {
				$extension 	= "jpg|png|mp3|zip";
				$extension = explode('|', $extension);
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				if(in_array(strtolower($ext), $extension) == false)
					$this->_error = '<i style="color:red;">*Định dạng file không phù hợp</i>';

				if($size < 102400 && $size > 5242880)
					$this->_error = '<i style="color:red;">*Kích thước file không phù hợp</i>';
			}

			return $this->_error;
		}

		public function checkFileArr($imageList) {
			if(is_array($imageList['name']) == flase) {
				$this->_error = '<i style="color:red;">*Giá trị file không tồn tại</i>';
			}else {
				foreach($imageList['name'] as $listname) {
					$extension 	= "jpg|png|mp3|zip";
					$extension = explode('|', $extension);
					$ext = pathinfo($imageList['name'], PATHINFO_EXTENSION);
					if(in_array(strtolower($ext), $extension) == false)
						$this->_error = '<i style="color:red;">*Định dạng file không phù hợp</i>';
				}

				foreach($imageList['size'] as $listsize)
					if($listsize < 102400 && $listsize > 5242880)
						$this->_error = '<i style="color:red;">*Kích thước file không phù hợp</i>';
			}

			return $this->_error;
		}

		/* Check array */
		public function checkOptionSize($arr) {
			if(!isset($arr)) 
				$this->_error = '<i style="color:red;">*Giá trị size, chưa được check</i>';

			return $this->_error;
		}
	}
?>