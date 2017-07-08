<?php
	class Contact_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->render();

			$name = $this->_getUrl['name'];
			$mail = $this->_getUrl['mail'];
			$subject = $this->_getUrl['subject'];
			$message = $this->_getUrl['message'];
			$date = $this->helper->date();
			$time = $this->helper->time();

			if(isset($this->_getUrl['submit'])) {
				$data = array(
								'name' => $name,
								'mail' => $mail,
								'subject' => $subject,
								'message' => $message,
								'date' => $date,
								'time' => $time
							);
				$result = $this->model->insertContact($data);

				if($result > 0) {
					header("Location: index.php?module=home&controller=notification&action=index&option=contact");
				}
			}

		}

		public function notification_Action() {
			$this->view->render();
		}

	}
?>