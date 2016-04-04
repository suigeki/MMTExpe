<?php
    App::uses('AppController', 'Controller');

    class  SiestesController extends AppController{   
        var $name='Siestes';

        var $paginate = array(
                                'Sieste' => array(
                                                                        )
                            );


        public $components = array('RequestHandler', 'MainFtn');

        //On oblige Ã  une authenfication
        function beforeFilter(){
                parent::beforeFilter(); //Instancie les diffÃ©rentes variables mise dans l'appController			
                $this->Auth->allow('index','test1','write_data');
        }

        public function index(){
            //debug($this->Memoire->getData('1'));
            $this->set('position', 'phase1');
            $this->layout = 'Expe/main_layout';
            $this->viewPath = 'Expe';
            $this->render('sieste_index');
        }

        public function test1(){
            //$qs = $this->Fatigue->getQuestions();
            //$rs = $this->Fatigue->getReponses();
            //$str= '[{\'stimulus\':\''.$this->MainFtn->rdm_majstring($length).'\'}];';
            $value='';
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header("Content-Type: application/json");
            echo json_encode($value);
            //echo $str;
        }
        
        function write_data(){
            debug($this->request);
            $return = $this->MainFtn->ftn_write_data('sieste', $this->request->data[0], $this->request->data['phase'], $this->request->data['user']);
            debug($return);
            $this->autoRender=false;
        }

    }
?>