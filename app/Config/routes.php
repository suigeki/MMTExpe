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

//*****************************************************************
//WSTest
Router::connect('/ws/test/all', array('plugin' => null, 'controller' => 'tests', 'action' => 'test_index', 'method' => 'GET'));
Router::connect('/ws/test/read/:id', array('plugin'=>null,'controller'=>'tests', 'action' => 'test_view', 'method' => 'GET'), array('pass'=>array('id')));
Router::connect('/ws/test/post/:id', array('plugin'=>null,'controller'=>'tests', 'action' => 'test_add', 'method' => 'POST'), array('pass'=>array('id')));
Router::connect('/ws/test/put/:id', array('plugin'=>null,'controller'=>'tests', 'action' => 'test_edit', 'method' => 'PUT'), array('pass'=>array('id')));
Router::connect('/ws/test/delete/:id', array('plugin'=>null,'controller'=>'tests', 'action' => 'test_delete', 'method' => 'DELETE'), array('pass'=>array('id')));

//*****************************************************************
//Expe Empan
Router::connect('/expe/empan1', array('plugin' => null, 'controller' => 'empans', 'action' => 'index'));
Router::connect('/expe/empan1/test1/:length', array('plugin' => null, 'controller' => 'empans', 'action' => 'test1'), array('pass'=>array('length')));
Router::connect('/expe/empan1/write', array('plugin' => null, 'controller' => 'empans', 'action' => 'write_data'));

//Expe Memoire
Router::connect('/expe/memoire1', array('plugin' => null, 'controller' => 'memoires', 'action' => 'index'));
Router::connect('/expe/memoire1/test1/:numList', array('plugin' => null, 'controller' => 'memoires', 'action' => 'test1'), array('pass'=>array('numList')));
Router::connect('/expe/memoire1/write', array('plugin' => null, 'controller' => 'memoires', 'action' => 'write_data'));

//Expe Fatigue
Router::connect('/expe/fatigue1', array('plugin' => null, 'controller' => 'fatigues', 'action' => 'index'));
Router::connect('/expe/fatigue1/write', array('plugin' => null, 'controller' => 'fatigues', 'action' => 'write_data'));

//Expe Sieste
Router::connect('/expe/sieste1', array('plugin' => null, 'controller' => 'siestes', 'action' => 'index'));
Router::connect('/expe/sieste1/write', array('plugin' => null, 'controller' => 'siestes', 'action' => 'write_data'));
//*****************************************************************

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


