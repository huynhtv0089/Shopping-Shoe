<?php
	class Checkout_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			/*
			 * Pagination
			 */

			$countTmp = $this->model->sumItem(Session::get('id'));
			$this->view->items = $countTmp['count'];
			$itemPage = 10;
			$location = ($this->_getUrl['p'] - 1) * $itemPage;
			$pagination = new Pagination($this->_getUrl['p'], $itemPage, $this->view->items);

			$this->view->sumPage = ceil($this->view->items/$itemPage);
			$this->view->page = $pagination->showPagination('index.php?module=home&controller=checkout&action=index');

			/*
			 * Display items
			 */

			$this->view->showProduct = $this->model->listProduct(Session::get('id'), $location ,$itemPage);
			
			// Giảm giá cho user.
			if($this->view->showProduct[0]['classify_id'] == 0) $classify = 0;
			else if($this->view->showProduct[0]['classify_id'] == 1) $classify = 10;
			else if($this->view->showProduct[0]['classify_id'] == 2) $classify = 20;

			for($i = 0; $i<count($this->view->showProduct); $i++) {
				$this->view->saleOff[$i] = $this->view->showProduct[$i]['discount'] + $classify;
				// Tổng giá tiền.
				$this->view->total[$i] = ($this->view->showProduct[$i]['price'] * $this->view->showProduct[$i]['quantity']) * (100 - $this->view->saleOff[$i]) / 100;
			}

			$data = array(
							array('id' => $this->view->showProduct[0]['id']),
							array(
									'discount' => $this->view->saleOff[0],
									'total' => $this->view->total[0]
								)
						);

			$this->model->updateCart($data);

			$this->view->render();
		}
	}
?>