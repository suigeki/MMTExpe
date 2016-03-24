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
                $this->Auth->allow('index','test1','write_data');
        }

        public function index(){
            $this->set('position', 'phase1');
            $this->layout = 'Expe/main_layout';
            $this->viewPath = 'Expe';
            $this->render('empan_index');
        }

        public function test1($length = 3){
            $value['stimulus'] = $this->MainFtn->rdm_majstring($length);
            //$str= '[{\'stimulus\':\''.$this->MainFtn->rdm_majstring($length).'\'}];';
            $this->autoRender = false;
            $this->autoLayout = false;
            $this->header("Content-Type: application/json");
            echo json_encode($value);
            //echo $str;
        }
        
        function write_data(){
            debug($this->request);
            $return = $this->MainFtn->ftn_write_data('empan', $this->request->data, $this->request->data['phase'], $this->request->data['user']);
            debug($return);
            $this->autoRender=false;
        }

    }
?>