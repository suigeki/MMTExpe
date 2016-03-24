<?php
	App::uses('AppController', 'Controller');

	class  EmpansController extends AppController{   
		var $name='Empans';
		
		var $paginate = array(
							'Empans' => array(
												)
							);
							
		
		public $components = array('RequestHandler');
		
		//On oblige Ã  une authenfication
		function beforeFilter(){
			parent::beforeFilter(); //Instancie les diffÃ©rentes variables mise dans l'appController			
			$this->Auth->allow('phase1');
		}


		public function test_index(){
			
			$tests = array('id'=>'1','testname'=>'Nom du test');
			$this->set('tests', array('tests'=>$tests));
			$this->set('_serialize', array('tests'));

                    $this->layout = false;
                    $this->viewPath = 'Expe';
                    $this->render('empan_phase1');
		}

		
	}
?>