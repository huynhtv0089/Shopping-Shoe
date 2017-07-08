<?php
	class ClassifyUser_Controller extends Controller{
		private $_getUrl;
		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($getUrl);
		}

		public function index_Action() {
			$this->view->classify_user = $this->model->classifyUser();
			$this->view->render();
			if(!empty($this->_getUrl['idDelete'])) {
				$this->model->deleteClassifyUser($this->_getUrl['idDelete']);
				header('Location: index.php?module=manage&controller=classifyUser&action=index&delete=success');
			}
		}

		public function edit_Action() {
			$this->view->load_classify_user = $this->model->loadClassifiUser($this->_getUrl['idEdit']);
			$this->view->render();
	
			$data = array(
							array('id' => $this->_getUrl['idEdit']),
							array('description' => $this->_getUrl['description'])
						);
			if($this->_getUrl['submit'] == true) {
				$this->model->editClassifyUser($data);
				header('Location: index.php?module=manage&controller=classifyUser&action=index&edit=success');
			} else if($this->_getUrl['back'] == true) {
				header('Location: index.php?module=manage&controller=classifyUser&action=index');
			}
		}

		public function add_Action() {
			$this->view->render();

			if(!empty($this->_getUrl['name']) && !empty($this->_getUrl['description'])) {
				$data = array(
								'name' => $this->_getUrl['name'],
								'description' => $this->_getUrl['description']
							);

				$result = $this->model->add_classify($data);
				if(isset($result))
					header('Location: index.php?module=manage&controller=classifyUser&action=index&add=success');
			}else if(isset($this->_getUrl['back'])) {
				header('Location: index.php?module=manage&controller=classifyUser&action=index');
			}
		}
	}

?>