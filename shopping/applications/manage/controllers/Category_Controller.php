<?php
	class Category_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->categorylist = $this->model->list_category();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$result = $this->model->delete_category($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=category&action=index&delete=success');
			}
		}

		public function add_Action() {
			$this->view->categorylist = $this->model->list_category();
			$this->view->render();

			if(isset($this->_getUrl['submit'])) {
				$result = $this->model->findClassify($this->_getUrl['parents']);
				if(!empty($result))
					$classify = $result['name'];
				else
					$classify = 'x';

				($this->_getUrl['parents'] == 'Tạo 1 thể loại mới') ? $parents = 0 : $parents = $this->_getUrl['parents'];
				$data = array(
								'name' => $this->_getUrl['name'],
								'classify' => $classify,
								'parents' => $parents
							);

				$result = $this->model->add_category($data);
				if(isset($result))
					header('Location: index.php?module=manage&controller=category&action=index&add=success');
				else 
					header('Location: index.php?module=manage&controller=category&action=index&add=danger');
			}else if(isset($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=category&action=index');
			}

		}

		public function edit_Action() {
			$this->view->loadCategory = $this->model->load_category($this->_getUrl['idEdit']);
			$this->view->render();
		
			$data = array(
							array('id' => $this->_getUrl['idEdit']),
							array('name' => $this->_getUrl['name'],
								  'classify' => $this->_getUrl['classify']
								)
						);
			if($this->_getUrl['submit'] == true) {
				$this->model->edit_category($data);
				header('Location: index.php?module=manage&controller=category&action=index&edit=success');
			} else if($this->_getUrl['back'] == true) {
				header('Location: index.php?module=manage&controller=category&action=index');
			}
		}
	}
?>