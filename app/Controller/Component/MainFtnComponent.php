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
            $characters = 'BCDFGHJKLMNPQRSTVWXYZ';
            $rdmstr = '';
            $consonne = '';
            while (strlen($rdmstr) < $length) {
                $consonne = $characters[rand(0, strlen($characters) - 1)];
                //debug(strpos($rdmstr, $consonne));
                if (strpos($rdmstr, $consonne) === false) {
                    $rdmstr .= $consonne;
                }
            }
            //for ($i = 0; $i < $length; $i++) {
            //    $rdmstr .= $characters[rand(0, strlen($characters) - 1)];
            //}
            return $rdmstr;
            //PHP4>=
            //return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
        }
        
        //Générer une chaine de caractère unique et aléatoire
        function random_chaine($car) {
                $string = "";
                $chaine = "abcdefghijklmnpqrstuvwxy";
                srand((double)microtime()*1000000);
                for($i=0; $i<$car; $i++) {
                        $string .= $chaine[rand()%strlen($chaine)];
                }
                return $string;
        }
        
        function ftn_write_data($folder_expe=null, $data=null, $phase=null, $user=null){
	    App::uses('Folder', 'Utility');
            App::uses('File', 'Utility');
            $statut = false;
            //$user=$this->random_chaine(8);
            if($phase=='phase 1'){
                $completpath=WWW_ROOT.Configure::read('Path.folder.stock.dataexport').$folder_expe.'/1_'.$user.'_data.txt';
            }else{
                $completpath=WWW_ROOT.Configure::read('Path.folder.stock.dataexport').$folder_expe.'/2_'.$user.'_data.txt';
            }
            
			
            $fichier =& new File($completpath,false);
				
            $donneesFormatees = $data;			
				
            $arraya = explode("/", substr($donneesFormatees,0,-1));
            foreach($arraya as $k => $v) {
                    $arraya[$k] = explode(";", $arraya[$k]);

            }		

            if(!$fichier->exists()){
                $pathFichierUser = $completpath;
                $inF = fopen($pathFichierUser,"a+");
                $chaine = $this->convert_utf8_to_iso88591_sansaccent(str_replace("/", Configure::read("Linux.ftn.newline"), $donneesFormatees));
                fwrite($inF, utf8_encode($chaine));
                fclose($inF);
                $statut = true;
            }
            
            return $statut;
        }
        
        function convert_utf8_to_iso88591_accent($string){
            $utf8caract=array('Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã¡','Ã ','Ã¢','Ã¤','Ã£','Ã¥','Ã§','Ã©','Ã¨','Ãª','Ã«','Ã­','Ã¬','Ã®','Ã¯','Ã±','Ã³','Ã²','Ã´','Ã¶','Ãµ','Ãº','Ã¹','Ã»','Ã¼','Ã½','Ã¿');	
            $newutf8caract=array('Á','À','Â','Ä','Ã','Å','Ç','É','È','Ê','Ë','Í','Ï','Î','Ì','Ñ','Ó','Ò','Ô','Ö','Õ','Ú','Ù','Û','Ü','Ý','á','à','â','ä','ã','å','ç','é','è','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');
            $new_string=str_replace($utf8caract,$newutf8caract,$string);
//			$accent=array('Á','À','Â','Ä','Ã','Å','Ç','É','È','Ê','Ë','Í','Ï','Î','Ì','Ñ','Ó','Ò','Ô','Ö','Õ','Ú','Ù','Û','Ü','Ý','á','à','â','ä','ã','å','ç','é','è','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');	
//			$sansaccent=array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
//			$new_string=str_replace($accent,$sansaccent,$new_string);
            return $new_string;
        }

        function convert_utf8_to_iso88591_sansaccent($string){
            $utf8caract=array('Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã','Ã¡','Ã ','Ã¢','Ã¤','Ã£','Ã¥','Ã§','Ã©','Ã¨','Ãª','Ã«','Ã­','Ã¬','Ã®','Ã¯','Ã±','Ã³','Ã²','Ã´','Ã¶','Ãµ','Ãº','Ã¹','Ã»','Ã¼','Ã½','Ã¿');	
            $newutf8caract=array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
            $new_string=str_replace($utf8caract,$newutf8caract,$string);
//			$accent=array('Á','À','Â','Ä','Ã','Å','Ç','É','È','Ê','Ë','Í','Ï','Î','Ì','Ñ','Ó','Ò','Ô','Ö','Õ','Ú','Ù','Û','Ü','Ý','á','à','â','ä','ã','å','ç','é','è','ê','ë','í','ì','î','ï','ñ','ó','ò','ô','ö','õ','ú','ù','û','ü','ý','ÿ');	
//			$sansaccent=array('A','A','A','A','A','A','C','E','E','E','E','I','I','I','I','N','O','O','O','O','O','U','U','U','U','Y','a','a','a','a','a','a','c','e','e','e','e','i','i','i','i','n','o','o','o','o','o','u','u','u','u','y','y');
//			$new_string=str_replace($accent,$sansaccent,$new_string);
            return $new_string;
        }
    }
?>