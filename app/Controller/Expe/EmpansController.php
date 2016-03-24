<?php
	App::uses('AppController', 'Controller');

	class  EmpansController extends AppController{   
		var $name='Empans';
		
		var $paginate = array(
                                        'Empans' => array(
                                                                                )
                                    );
							
		
		public $components = array('RequestHandler', 'MainFtn');
		
		//On oblige Ã  une authenfication
		function beforeFilter(){
			parent::beforeFilter(); //Instancie les diffÃ©rentes variables mise dans l'appController			
			$this->Auth->allow('phase1');
		}


		public function phase1(){
			
                    $this->set('random_string', $this->MainFtn->rdm_majstring(4));

                    $this->layout = 'Expe/main_layout';
                    $this->viewPath = 'Expe';
                    $this->render('empan_phase1');
		}

		
	}
?>