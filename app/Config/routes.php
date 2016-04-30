<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
 
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	Router::connect('/dang-nhap', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/trang-chu', array('controller' => 'users', 'action' => 'index'));
	Router::connect('/dang-ki', array('controller' => 'users', 'action' => 'add'));
	Router::connect('/doi-mat-khau', array('controller' => 'users', 'action' => 'change_password'));
	Router::connect('/cap-nhat-thong-tin', array('controller' => 'users', 'action' => 'change_info'));
	Router::connect('/thong-tin-ca-nhan', array('controller' => 'users', 'action' => 'view'));
	Router::connect('/quen-mat-khau', array('controller' => 'users', 'action' => 'forgot'));
	Router::connect('/xac-nhan/:code', array('controller' => 'users', 'action' => 'confirm'),array('pass'=>array('code')));
	Router::connect('/thong-tin-vi/:slug', array('controller' => 'wallets', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/chinh-sua-vi/:slug', array('controller' => 'wallets', 'action' => 'edit'), array('pass' => array('slug')));
	Router::connect('/danh-sach-vi', array('controller' => 'wallets', 'action' => 'index'));
	Router::connect('/them-vi', array('controller' => 'wallets', 'action' => 'add'));
	Router::connect('/giao-dich', array('controller' => 'transactions', 'action' => 'index'));
	Router::connect('/them-giao-dich', array('controller' => 'transactions', 'action' => 'add'));
	Router::connect('/chi-tiet-giao-dich/:slug', array('controller' => 'transactions', 'action' => 'view'), array('pass' => array('slug')));
	Router::connect('/chinh-sua-giao-dich/:slug', array('controller' => 'transactions', 'action' => 'edit'), array('pass' => array('slug')));
/**
/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
Router::connect('/login', array('controller' => 'users', 'action' => 'login'));