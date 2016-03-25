<?php
    //App::uses('AppModel', 'Model');
    class Memoire extends AppModel	
    {
        public $name = 'Memoire';
        public $useDbConfig = 'myDB';
        public $useTable = false;
        //public $actsAs = array('Containable');

        public function __construct($config=null) {
		parent::__construct($config);

        }
        
        public function getData($list){
            if($list == '1'){
                $data = array('poisson'=>'sardine','vêtement'=>'bonnet','jeu'=>'puzzle','fleur'=>'muguet','profession'=>'plombier','fruit'=>'abricot','métal'=>'aluminium','instrument'=>'clarinette','oiseau'=>'corbeau','arbre'=>'sapin','sport'=>'tennis','légume'=>'épinard','objet'=>'ticket','partie corps'=>'ongle','meuble'=>'canapé');
            }else{
                $data = array('poisson'=>'saumon','vêtement'=>'écharpe','jeu'=>'carte','fleur'=>'tournesol','profession'=>'médecin','fruit'=>'cerise','métal'=>'acier','instrument'=>'saxophone','oiseau'=>'canard','arbre'=>'chêne','sport'=>'football','légume'=>'poireaux','objet'=>'fiche','partie corps'=>'barbe','meuble'=>'commode');
            }
            return $data;
        }
    }
?>