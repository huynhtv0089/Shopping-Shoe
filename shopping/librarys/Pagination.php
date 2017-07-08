<?php
	class Pagination {

		public $_currentPage;
		public $_itemPage;
		public $_totalItem;
		public $_totalPage;

		/*
		 * Parameter 1: Page hiện tại
		 * Parameter 2: Muốn có bao nhiêu item trong 1 page
		 * Parameter 3: Tổng số lượng item có trong csdl
		 */
		public function __construct($currentPage, $itemPage, $totalItem) {
			$this->_currentPage = $currentPage;
			$this->_itemPage = $itemPage;
			$this->_totalItem  = $totalItem;
			$this->_totalPage = ceil($this->_totalItem/$this->_itemPage);
		}

		/*
		 * Hiển thị ra list page
		 */
		public function showListPage($url, $start, $end, $current) {
			for($i = $start; $i<=$end; $i++)
				if($i == $current)
					$listPage .= '<li class="active"><a href="'. $url .'&p='.$i.'">'.$i.'</a>';
				else
					$listPage .= '<li><a href="'. $url .'&p='.$i.'">'.$i.'</a>';

			return $listPage;
		}

		/* First Page*/
		public function firstPage($url) {
			return $first = '<li><a href="'. $url .'&p=1"><< Đầu</a></li>';
		}

		/* Previous Page */
		public function prevPage($url, $currentPage) {
				return $prev = '<li><a href="'. $url .'&p='.($currentPage - 1).'"> < </a></li>'; 
		}

		/* Next Page*/
		public function nextPage($url, $currentPage) {
			return $next = '<li><a href="'. $url . '&p='.($currentPage+1).'"> > </a></li>';
		}

		/* Last Page */
		public function lastPage($url, $totalPage) {
			return $last = '<li><a href="'.$url.'&p='.$totalPage.'">cuối >></a></li>';
		}




		/* Show pagination */
		public function showPagination($url) {
			/*
			 * Nếu trang hiện tại = 1
			 * Thì không hiện 2 button next và last
			 */
			if($this->_currentPage == 1) {
				// Vòng lặp lấy bắt đầu từ 1 và đến trang hiện tại + 2
				// Vòng lặp để hiện list page
				// Hiển thị ra list page như bình thường ( theo sau page acvite là 2 page và trước page active là 1 page)
				$listPage = $this->showListPage($url, 1, ($this->_currentPage+2), $this->_currentPage);
				$next = $this->nextPage($url, $this->_currentPage);
				$last = $this->lastPage($url, $this->_totalPage);

				$page = $listPage . $next . $last;
			}

			/*
			 * Nếu trang hiện tại lớn hơn 2
			 * Thì hiển thị đầu đủ first, prev, next, và last
			 */
			if($this->_currentPage >= 2) {
				$first = $this->firstPage($url);
				$prev = $this->prevPage($url, $this->_currentPage);

				/*
				 * Cho Vòng lặp chạy hiển thị list page
				 * Nếu chạy đến page mà page đó = page cuối cùng thì chỉ hiển thị ra list page còn lại ( không hiện page dư thừa)
				 */
				if($this->_currentPage == ($this->_totalPage - 1)) {
					$listPage = $this->showListPage($url, ($this->_currentPage-1), ($this->_currentPage + 1), $this->_currentPage); 
				}else { // Hiển thị ra list page như bình thường ( theo sau page acvite là 2 page và trước page active là 1 page)
					$listPage = $this->showListPage($url, ($this->_currentPage-1), ($this->_currentPage+2), $this->_currentPage);
				}

				$next = $this->nextPage($url, $this->_currentPage);
				$last = $this->lastPage($url, $this->_totalPage);

				$page =  $first . $prev . $listPage . $next . $last ;

				/*
				 * Nếu trang hiện tại = với tổng page (page cuối cùng)
				 * Thì không hiện ra next và last
				 */
				if($this->_currentPage == $this->_totalPage) {
					$listPage = $this->showListPage($url, ($this->_currentPage-1), $this->_currentPage, $this->_currentPage);
					$page = $first . $prev . $listPage ;
				}	
			}

			//Trả về những thẻ li
			return $page;
		}

	}
?>