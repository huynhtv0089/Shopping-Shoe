<?php
	class Settings_Controller extends Controller {
		private $_getUrl;

		public function __construct($getUrl) {
			$this->_getUrl = $getUrl;
			parent::__construct($this->_getUrl);
		}

		public function index_Action() {
			$this->view->infoLogo = $this->model->getLogo();
			$this->view->infoBanner = $this->model->getBanner();
			$this->view->render();

			// Logo
			if($this->_getUrl['logo'] == 'true') {
				if(isset($this->getUrl['pic']) && isset($this->getUrl['picName'])){
					$this->model->updateLogo($this->getUrl['pic'], $this->getUrl['picName']);
					header('Location: index.php?module=manage&controller=settings&action=index&logo=success');
				}
			}

			// Banner
			if($this->_getUrl['banner'] == 'true') {
				//Kiem tra cac input co ton tai hay khong
				if( isset($this->getUrl['slideTitle_01']) && isset($this->getUrl['slidePara_01']) &&  isset($this->getUrl['slideTitle_02']) && isset($this->getUrl['slidePara_02']) && isset($this->getUrl['slideTitle_03']) && isset($this->getUrl['slidePara_03']) ) {

					// Kiem tra xem thu co upload anh banner
				 	if(empty($this->_getUrl['picBanner']['name'])) {
				 		$picBanner = $this->view->infoBanner['picBanner'];
				 	} else {
				 		@move_uploaded_file($this->_getUrl['picBanner']['tmp_name'], IMAGES_PATH . $this->_getUrl['picBanner']['name']);
				 		$picBanner = $this->_getUrl['picBanner']['name'];
				 	}


				 	$st1 = $this->getUrl['slideTitle_01'];
				 	$sp1 = $this->getUrl['slidePara_01'];
				 	$st2 = $this->getUrl['slideTitle_02'];
				 	$sp2 = $this->getUrl['slidePara_02'];
				 	$st3 = $this->getUrl['slideTitle_03'];
				 	$sp3 = $this->getUrl['slidePara_03'];

					$this->model->updateBanner($picBanner, $st1, $sp1, $st2, $sp2, $st3, $sp3);
					header('Location: index.php?module=manage&controller=settings&action=index&banner=success');
				}
			}		
		}

		public function tagPolicy_Action() {
			//Tag
			$this->view->infoTag = $this->model->getTag();

			//Policy
			$this->view->infoPolicy = $this->model->getPolicy();

			$this->view->render();

			// Redirect tag
			if($this->_getUrl['tag'] == 'true') {
				if(isset($this->_getUrl['tagHTML'])) {
					$this->model->updateTag($this->_getUrl['tagHTML']);
					header('Location: index.php?module=manage&controller=settings&action=tagPolicy&tag=success');
				}
			}

			// Redirect policy
			if($this->_getUrl['policy'] == 'true')
				header('Location: index.php?module=manage&controller=settings&action=addPolicy');
				if(isset($this->_getUrl['idDelete'])) {
					$this->model->deletePolicy($this->_getUrl['idDelete']);
					header('Location: index.php?module=manage&controller=settings&action=tagPolicy&deletePolicy=success');
				}
		}

		public function addPolicy_Action() {
			$this->view->render();

			if(isset($this->_getUrl['submit'])) {
				$this->model->addPolicy($this->_getUrl['name']);
				header('Location: index.php?module=manage&controller=settings&action=tagPolicy&addPolicy=success');
			}
		}

		public function editPolicy_Action() {
			$this->view->singlePolicy = $this->model->getSinglePolicy($this->_getUrl['idEdit']);
			$this->view->render();

			if(isset($this->_getUrl['submit'])) {
				$this->model->updatePolicy($this->_getUrl['idEdit'], $this->_getUrl['name']);
				header('Location: index.php?module=manage&controller=settings&action=tagPolicy&editPolicy=success');
			}
		}		

		public function advertisement_Action() {
			$this->view->infoAdsCenter = $this->model->getAds('adsCenter');
			$this->view->infoAdsleft = $this->model->getAds('adsLeft');
			$this->view->render();


			if($this->_getUrl['adsCenter'] == 'true') {
				if(empty($this->_getUrl['picAdsCenter']['name'])) {
			 		$picAdsCenter = $this->view->infoAdsCenter['picAds'];
			 	} else {
			 		@move_uploaded_file($this->_getUrl['picAdsCenter']['tmp_name'], IMAGES_PATH . $this->_getUrl['picAdsCenter']['name']);
			 		$picAdsCenter = $this->_getUrl['picAdsCenter']['name']; 
			 	}
			 	$this->model->updateAds('adsCenter', $this->_getUrl['widthCenter'], $this->_getUrl['heightCenter'], $picAdsCenter, $this->_getUrl['codeCenter']);
			 	header('Location: index.php?module=manage&controller=settings&action=tag&adsCenter=success');
			}

			if($this->_getUrl['adsLeft'] == 'true') {
				if(empty($this->_getUrl['picAdsLeft']['name'])) {
			 		$picAdsLeft = $this->view->infoAdsLeft['picAds'];
			 	} else {
			 		@move_uploaded_file($this->_getUrl['picAdsLeft']['tmp_name'], IMAGES_PATH . $this->_getUrl['picAdsLeft']['name']);
			 		$picAdsLeft = $this->_getUrl['picAdsLeft']['name']; 
			 	}
			 	$this->model->updateAds('adsLeft', $this->_getUrl['widthLeft'], $this->_getUrl['heightLeft'], $picAdsLeft, $this->_getUrl['codeLeft']);
			 	header('Location: index.php?module=manage&controller=settings&action=tag&adsLeft=success');
			}
		}

		public function footer_Action() {
			$this->view->footerInfo1 = $this->model->getFooterInfo('footerInfo1');
			$this->view->footerInfo2 = $this->model->getFooterInfo('footerInfo2');
			$this->view->map = $this->model->getIframeMap();
			$this->view->license = $this->model->getLicense();

			$this->view->render();

			if(isset($this->_getUrl['submitFr1'])) {
				$this->model->updateFr1('footerInfo1', $this->_getUrl['name0'], $this->_getUrl['name1'], $this->_getUrl['name2'], $this->_getUrl['name3'], $this->_getUrl['name4'], $this->_getUrl['name5']);
				header('Location: index.php?module=manage&controller=settings&action=footer&updateFr1=success');
			}

			if(isset($this->_getUrl['submitFr2'])) {
				$this->model->updateFr1('footerInfo2', $this->_getUrl['name0'], $this->_getUrl['name1'], $this->_getUrl['name2'], $this->_getUrl['name3'], $this->_getUrl['name4'], $this->_getUrl['name5']);
				header('Location: index.php?module=manage&controller=settings&action=footer&updateFr2=success');
			}

			if(isset($this->_getUrl['submitMap'])) {
				$this->model->updateIframe($this->_getUrl['codeMap']);
				header('Location: index.php?module=manage&controller=settings&action=footer&updateMap=success');
			}
			
			if(isset($this->_getUrl['submitLicense'])) {
				$this->model->updateLicense($this->_getUrl['nameLicense']);
				header('Location: index.php?module=manage&controller=settings&action=footer&updateLicense=success');
			}
		}
	}
?>