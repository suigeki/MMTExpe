<?php 
    class MainFtnComponent extends Object {   

        function initialize(&$controller) {
                // sauvegarde la référence du contrôleur pour une utilisation ultérieure
                $this->controller =& $controller;
                $this->controller->set('MainFtn_comp', new MainFtnComponent()); 
        }

        //appelée après Controller::beforeFilter()
        function startup(&$controller) {
        }

        function beforeRender(&$controller){			
        }

        function shutdown(&$controller){
        }

        function beforeRedirect(&$controller, $url, $status=null, $exit=true){
        }

        function rdm_majstring($length = 3){
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $rdmstr = '';
            for ($i = 0; $i < $length; $i++) {
                $rdmstr .= $characters[rand(0, strlen($characters) - 1)];
            }
            return $rdmstr;
            //PHP4>=
            //return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }
    }
?>