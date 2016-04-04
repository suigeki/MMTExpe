<?php
    //App::uses('AppModel', 'Model');
    class Fatigue extends AppModel	
    {
        public $name = 'Memoire';
        public $useDbConfig = 'myDB';
        public $useTable = false;
        //public $actsAs = array('Containable');

        public function __construct($config=null) {
		parent::__construct($config);

        }
        
        public function getQuestions(){
            $data = array('0'=>'Une sensation d\'yeux secs ?','1'=>'Que les yeux vous tirent ?','2'=>'Des picotements des yeux ?','3'=>'Des brulures oculaires ?','4'=>'Des yeux rouges ?','5'=>'Que la vision devient moins nette ?','6'=>'Un voile sur les objets fixes ?','7'=>'Un voile sur les objets fixes ?','8'=>'Des points noirs qui flottent devant les yeux ?','9'=>'Des yeux larmoyants ?','10'=>'Une coloration des surfaces ou des objets blancs ?','11'=>'Des maux de têtes ?');
        }   
        
        public function getResponses(){
            $data = array('0'=>'jamais','1'=>'rarement','2'=>'parfois','3'=>'souvent');
            return $data;
        }
    }
?>