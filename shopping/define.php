<?php

	/*====================== PATHS ======================*/
	//Dấu "/" để sau này khi upload lên host thì không bị lỗi
	define('DS', DIRECTORY_SEPARATOR);
	
	//Định nghĩa đường dẫn đến thư mục gốc
	define('ROOT_PATH', dirname(__FILE__));

	//Định nghĩa đường dẫn đến thư mục thư viện
	define('LIBRARY_PATH', ROOT_PATH . DS . 'librarys' . DS);

	//Định nghĩa đường dẫn đến thư mục public
	define('PUBLIC_PATH', ROOT_PATH . DS . 'publics' . DS);
		//Định nghĩa đường dẫn đến thư mục public -> images
		define('IMAGES_PATH', PUBLIC_PATH . DS . 'images' . DS);

	//Định nghĩa đường dẫn đến thư mục application
	define('APPLICATION_PATH', ROOT_PATH . DS . 'applications' . DS);

	//Định nghĩa đường dẫn đến thư mục template
	define('TEMPLATE_PATH', ROOT_PATH . DS . 'templates' . DS);


	//Tạo đường dẫn tương đối
	define('SLASH', '/' );
	define ('ROOT_URL' , SLASH . 'shopping' . SLASH);
	define ('PUBLIC_URL' , ROOT_URL . 'publics' . SLASH);

	define ('BOWER_COMPONENTS_URL' , PUBLIC_URL . 'bower_components' . SLASH);
		define ('BOOTSTRAP' , BOWER_COMPONENTS_URL . 'bootstrap' . SLASH);
			define ('DIST_BOOTSTRAP' , BOOTSTRAP . 'dist' . SLASH);
				define ('CSS_DIST_BOOTSTRAP' , DIST_BOOTSTRAP . 'css' . SLASH);
				define ('JS_DIST_BOOTSTRAP' , DIST_BOOTSTRAP . 'js' . SLASH);

		define ('METIS_MENU' , BOWER_COMPONENTS_URL . 'metisMenu' . SLASH);
			define ('DIST_METIS_MENU' , METIS_MENU . 'dist' . SLASH);

		define ('FONT_AWESOME' , BOWER_COMPONENTS_URL . 'font-awesome' . SLASH);
			define ('CSS_FONT_AWESOME' , FONT_AWESOME . 'css' . SLASH);

		define ('DATATABLES' , BOWER_COMPONENTS_URL . 'datatables' . SLASH);
			define ('MEDIA_DATABASES' , DATATABLES . 'media' . SLASH);
				define ('JS_MEDIA_DATABASES' , MEDIA_DATABASES . 'js' . SLASH);

		define ('DATATABLES_PLUGINS' , BOWER_COMPONENTS_URL . 'datatables-plugins' . SLASH);
			define ('INTEGRATION' , DATATABLES_PLUGINS . 'integration' . SLASH);
				define ('BOOTSTRAP_INTEGRATION' , INTEGRATION . 'bootstrap' . SLASH);
					define ('THREE' , BOOTSTRAP_INTEGRATION . '3' . SLASH);

		define ('DATATABLES_RESPONSIVE' , BOWER_COMPONENTS_URL . 'datatables-responsive' . SLASH);
			define ('CSS_DATATABLES_RESPONSIVE' , DATATABLES_RESPONSIVE . 'css' . SLASH);


		define ('JQUERY' , BOWER_COMPONENTS_URL . 'jquery' . SLASH);
			define ('DIST_JQUERY' , JQUERY . 'dist' . SLASH);

	define ('CKEDITOR_URL' , PUBLIC_URL . 'ckeditor' . SLASH);
	define ('DIST_URL' , PUBLIC_URL . 'dist' . SLASH);
		define ('CSS_DIST' , DIST_URL . 'css' . SLASH);
		define ('JS_DIST' , DIST_URL . 'js' . SLASH);

	define ('JS_MANAGE_URL' , PUBLIC_URL . 'js-manage' . SLASH);
	define ('LESS_URL' , PUBLIC_URL . 'less' . SLASH);
	define ('UPLOAD_URL' , PUBLIC_URL . 'upload' . SLASH);

	define ('CSS_URL' , PUBLIC_URL . 'css' . SLASH);
	define ('JS_URL' , PUBLIC_URL . 'js' . SLASH);
	define ('IMAGES_URL' , PUBLIC_URL . 'images' . SLASH);
	

	/*====================== GET_URL ======================*/
	define ('DEFAULT_MODULE' , 'manager');
	define ('DEFAULT_CONTROLLER' , 'group');
	define ('DEFAULT_ACTION' , 'index');

	/*====================== DATABASE ======================*/
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');	
	define('DB_PASS', '');	
	define('DB_NAME', 'shopping_online');	
	define('DB_TABLE', 'group');

	/* URL */
	define('INDEX_PRODUCT', '?module=home&controller=product&action=index');
