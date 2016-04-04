<?php
    //App::uses('AppModel', 'Model');
    class Sieste extends AppModel	
    {
        public $name = 'Sieste';
        public $useDbConfig = 'myDB';
        public $useTable = false;
        //public $actsAs = array('Containable');

        public function __construct($config=null) {
		parent::__construct($config);

        }
        
    }
?>