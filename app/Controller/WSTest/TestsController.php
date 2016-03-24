<?php
	App::uses('AppController', 'Controller');

	class  TestsController extends AppController{   
		var $name='Tests';
		
		var $paginate = array(
							'Foods' => array(
												)
							);
							
		
		public $components = array('RequestHandler');
		
		//On oblige Ã  une authenfication
		function beforeFilter(){
			parent::beforeFilter(); //Instancie les diffÃ©rentes variables mise dans l'appController			
			$this->Auth->allow('test_index', 'test_view', 'test_add', 'test_edit', 'test_delete');
		}


		public function test_index(){
			
			$tests = array('id'=>'1','testname'=>'Nom du test');
			$this->set('tests', array('tests'=>$tests));
			$this->set('_serialize', array('tests'));

	        $this->layout = false;
	        $this->viewPath = 'WSTest';
			$this->render('tests_index');
		}

		public function test_view($id) {

		}

		public function test_add() {
			
		}

		public function test_edit($id) {
			
		}

		public function test_delete($id) {
			
		}

		public function test_update($id) {
			
		}
	}
?>