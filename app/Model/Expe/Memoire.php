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
                $data = array('poisson'=>'sardine','vetement'=>'bonnet','jeu'=>'puzzle','fleur'=>'muguet','profession'=>'plombier','fruit'=>'abricot','metal'=>'aluminium','instrument'=>'clarinette','oiseau'=>'corbeau','arbre'=>'sapin','sport'=>'tennis','legume'=>'epinard','objet'=>'ticket','partie corps'=>'ongle','meuble'=>'canape');
            }else{
                $data = array('poisson'=>'saumon','vetement'=>'echarpe','jeu'=>'carte','fleur'=>'tournesol','profession'=>'medecin','fruit'=>'cerise','metal'=>'acier','instrument'=>'saxophone','oiseau'=>'canard','arbre'=>'chene','sport'=>'football','legume'=>'poireaux','objet'=>'fiche','partie corps'=>'barbe','meuble'=>'commode');
            }
            return $data;
        }
    }
?>