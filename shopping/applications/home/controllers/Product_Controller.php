<?php
	class Product_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			/*
			 * Pagination
			 */
			$sumItem = $this->model->sum_item();
			$itemPage = 15;
			$location = ($this->_getUrl['p'] - 1) * $itemPage;
			$pagination = new Pagination($this->_getUrl['p'], $itemPage, $sumItem);

			$this->view->sumPage = ceil($sumItem/$itemPage);
			$this->view->page = $pagination->showPagination('index.php?module=home&controller=product&action=index');
			/*
			 * Display items
			 */
			// Nếu tồn tại $_GET search thì hiện sản phẩm
			// Còn ko tồn tại thì hiện sản phẩm mặc định
			if(isset($this->_getUrl['search']))
				$this->view->listProduct = $this->model->searchItem($location ,$itemPage, $this->_getUrl['search']);
			else if(isset($this->_getUrl['idCate']))
				$this->view->listProduct = $this->model->menuItem($location ,$itemPage, $this->_getUrl['idCate']);
			else
				$this->view->listProduct = $this->model->list_product($location ,$itemPage);

			// Get Tag
			$tmpTag = $this->model->getTag();
			$this->view->tag = explode(", ", $tmpTag['tagHTML']);

			// Get Ads
			$this->view->ads = $this->model->getAds('adsLeft');

			// Get menu
			$this->view->menu = $this->model->getMenu();

			$this->view->render();
		}

		public function single_Action() {
			$this->view->itemSingle = $this->model->item_single($this->_getUrl['idP']);
			$this->view->otherProducts = $this->model->getOtherPro($this->view->itemSingle['category_id']);
			$this->view->firstProList = $this->model->firstListPro($this->view->itemSingle['category_id']);
			$this->view->productList = $this->model->listProduct($this->view->firstProList['parents']);

			// Get Tag
			$tmpTag = $this->model->getTag();
			$this->view->tag = explode(", ", $tmpTag['tagHTML']);			

			// Get Ads
			$this->view->adsCenter = $this->model->getAds('adsCenter');
			$this->view->adsLeft = $this->model->getAds('adsLeft');

			/*
			 * Kiểm tra nếu có id trong table checkout
			 * Thì chuyển thành Added to cart
			 */
			$this->view->checkAdded= $this->model->getIdproduct($this->_getUrl['idP']);

			$date = $this->helper->getDates();
			$time = $this->helper->getTimes();

			if(!empty(Session::get('id'))) {
				if(isset($this->_getUrl['idP'])) {
					$defaultStaus = 0;
					
					$discount = $this->view->itemSingle['discount'] + $classify;
					$data = array(
									'name' => $this->view->itemSingle['name'],
									'date' => $date,
									'time' => $time,
									'price' => $this->view->itemSingle['price'],
									'size' => $this->_getUrl['size'],
									'quantity' => $this->_getUrl['quantity'],
									'status' => $defaultStaus,
									'discount' => 0,
									'total' => 0,
									'id_product' => $this->_getUrl['idP'],
									'id_user' => Session::get('id')
								);
					if(isset($this->_getUrl['submit'])) {
						// Lấy số lượng, kích thước của bảng quantity_item
						$getQuantityItem = $this->model->getQuantity($data['id_product']);

						for($i=0; $i<count($getQuantityItem); $i++) {
							if($data['size'] == $getQuantityItem[$i]['size']) {
								// Kết quả quantity cuối cùng 
								$quantityCurrent = $getQuantityItem[$i]['quantity'];

								$resultQuantity = $quantityCurrent - $data['quantity'];
								break;
							}	
						}

						// Nếu quantity cũ trừ quantity mới >= 0
						if($resultQuantity >= 0) {
							// Thực hiện update lại quantity mới
							$this->model->updateQuantityPro($data['id_product'], $data['size'], $resultQuantity);
							$this->model->addToCart($data);
						    header("Location: index.php?module=home&controller=checkout&action=index&p=1");
						}else { // Xuất thông báo và không update
							$this->view->message = '<p style="margin-top:5px;">Thông báo: Size '.$data['size'].', số lượng hiện tại là: '.$quantityCurrent.'</p>';
						}

					}
				}
			}
			$this->view->render();
		}
	}
?>