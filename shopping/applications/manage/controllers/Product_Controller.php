<?php
	class Product_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->listProduct = $this->model->list_Product();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->delete_Product($this->_getUrl['idDelete']);
				$this->model->delete_Quantity($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=product&action=index&delete=success');
			}
		}

		public function editInfo_Action() {
			$this->view->editProduct = $this->model->info_Product($this->_getUrl['idEdit']);
			$this->view->selectedOption = $this->model->selectedCategory($this->view->editProduct['category_id']);
			$this->view->category = $this->model->option_category();
			$this->view->checkHot = $this->model->checkedSlide();
			$this->view->render();

			if(isset($this->_getUrl['submit'])) {
				(!empty($this->_getUrl['hotProduct'])) ? $hotProduct = 1 : $hotProduct = 0 ;
				$image_list = implode(", ", $this->_getUrl['image_list']['name']);
				$data = array(
								array('id' => $this->_getUrl['idEdit']),
								array(	'name' => $this->_getUrl['name'],
										'unsigned_name' => $this->helper->changeTitle($this->_getUrl['name']),
										'description' => $this->_getUrl['description'],
										'content' => $this->_getUrl['content'],
										'made_in' => $this->_getUrl['made_in'],
										'price' => $this->_getUrl['price'],
										'discount' => $this->_getUrl['discount'],
										'image_link' => $this->_getUrl['image_link']['name'],
										'image_list' => $image_list,
										'category_id' => $this->_getUrl['category_id'],
										'hotProduct' => $hotProduct
									)
							);
				$extension = 'jpg|png|mp3|zip';
				$checkSizeImagesLink = $this->helper->checkSize($this->_getUrl['image_link']['size'], 10240, 5242880);
				$checkExtenImagesLink = $this->helper->checkExtension($this->_getUrl['image_link']['name'], explode('|', $extension));

				$checkSizeImagesList = array();
				$checkSizeImagesList = array();
				foreach($this->_getUrl['image_list']['size'] as $key)
					$checkSizeImagesList[] = $this->helper->checkSize($key, 10240, 5242880);
				foreach($this->_getUrl['image_list']['name'] as $key)
					$checkExtenImagesList[] = $this->helper->checkExtension($key, explode('|', $extension));

				if($checkSizeImagesLink == true && $checkExtenImagesLink == true) {
					@move_uploaded_file($this->_getUrl['image_link']['tmp_name'], IMAGES_PATH . $this->_getUrl['image_link']['name']);
					$length = count($this->_getUrl['image_list']['name']);
					for($i = 0; $i < $length; $i++) {
						if($checkSizeImagesList[$i] == true && $checkExtenImagesList[$i] == true) {
							@move_uploaded_file($this->_getUrl['image_list']['tmp_name'][$i], IMAGES_PATH . $this->_getUrl['image_list']['name'][$i]);	
						}
					}

					$this->model->edit_Product($data);
					header('Location: index.php?module=manage&controller=product&action=index&edit=success');
				}else {
				  	header('Location: index.php?module=manage&controller=product&action=index');	
				}
			} else if(isset($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=product&action=index');
			}
		}

		public function editSize_Action() {
			$this->view->editSize = $this->model->info_Size($this->_getUrl['idEdit']);
			$this->view->render();
			$newSize = $this->getUrl['newSize'];

			if(!empty($this->getUrl['size']))
		    	$sizeTmp = implode(", ", $this->getUrl['size']);

		    if(!empty($sizeTmp) && !empty($newSize))
		    	$size = $sizeTmp . ", " . $newSize;	
		    else if(!empty($sizeTmp) && empty($newSize))
		    	$size = $sizeTmp;	
		    else if(empty($sizeTmp) && !empty($newSize))
		    	$size = $newSize;

			$dataSize = array(
								array('id' => $this->_getUrl['idEdit']),
								array('size' => $size)
							);
			if(isset($this->_getUrl['next'])) {
				$this->model->edit_Size($dataSize);
				header('Location: index.php?module=manage&controller=quantityItem&action=add&idP='.$this->_getUrl['idEdit']);
			} else if(isset($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=product&action=index');
			}
		}

		public function info_Action() {
			$this->view->infoProduct = $this->model->info_Product($this->_getUrl['idView']);
			$this->view->infoQuantity = $this->model->info_Quantity($this->_getUrl['idView']);;
			$this->view->render();
		}

		public function add_Action() {
			$this->view->optionCategory = $this->model->option_category();
			$this->view->render();

			if(!empty($this->_getUrl['submit'])) {
				$size = implode(", ", $this->_getUrl['size']);
				$image_list = implode(", ", $this->_getUrl['image_list']['name']);
				$data = array(
								'name' => $this->_getUrl['name'],
								'unsigned_name' => $this->helper->changeTitle($this->_getUrl['name']),
								'description' => $this->_getUrl['description'],
								'content' => $this->_getUrl['content'],
								'made_in' => $this->_getUrl['made_in'],
								'price' => $this->_getUrl['price'],
								'discount' => $this->_getUrl['discount'],
								'image_link' => $this->_getUrl['image_link']['name'],
								'image_list' => $image_list,
								'size' => $size,
								'category_id' => $this->_getUrl['category_id'],
								'hotProduct' => 0
							);

				$extension = 'jpg|png|mp3|zip';
				$checkSizeImagesLink = $this->helper->checkSize($this->_getUrl['image_link']['size'], 10240, 5242880);
				$checkExtenImagesLink = $this->helper->checkExtension($this->_getUrl['image_link']['name'], explode('|', $extension));

				$checkSizeImagesList = array();
				$checkSizeImagesList = array();
				foreach($this->_getUrl['image_list']['size'] as $key)
					$checkSizeImagesList[] = $this->helper->checkSize($key, 10240, 5242880);
				foreach($this->_getUrl['image_list']['name'] as $key)
					$checkExtenImagesList[] = $this->helper->checkExtension($key, explode('|', $extension));

				if($checkSizeImagesLink == true && $checkExtenImagesLink == true) {
					@move_uploaded_file($this->_getUrl['image_link']['tmp_name'], IMAGES_PATH . $this->_getUrl['image_link']['name']);
					$length = count($this->_getUrl['image_list']['name']);
					for($i = 0; $i < $length; $i++) {
						if($checkSizeImagesList[$i] == true && $checkExtenImagesList[$i] == true) {
							@move_uploaded_file($this->_getUrl['image_list']['tmp_name'][$i], IMAGES_PATH . $this->_getUrl['image_list']['name'][$i]);	
						}
					}
					
					$result = $this->model->add_product($data);
					if(isset($result)) {
						$getId = $this->model->getIdProduct($data['name']);
						header('Location: index.php?module=manage&controller=quantityItem&action=add&idP='.$getId['id']);
					}else {
						header('Location: index.php?module=manage&controller=product&action=add&add=danger');
					}
				}
			}else if(!empty($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=product&action=index');
			}
		}

	}
?>