<?php
class AppController extends Controller {
	
	var $components = array('Auth','Session');
	
	public function initialize(&$controller) {
		// sauvegarde la référence du contrôleur pour une utilisation ultérieure
		$this->controller =& $controller;		
	}

	public function beforeFilter(){		
		//$this->Auth->loginAction = array('plugin'=>null,'controller'=>'users','action' => 'login');
		//parent::beforeFilter();
		//$this->allowAccess();
	}

	//appelée après Controller::beforeFilter()
	public function startup(&$controller) {

	}
	
	public function beforeRender(){
	}

	/*private function allowAccess() {
// this actually searches the URL to see what controller you're accessing, and allows actions for that controller.
    if(in_array($this->name, array('Foods'))) {
        $this->Auth->allow(array('index'));
    }*/
}
