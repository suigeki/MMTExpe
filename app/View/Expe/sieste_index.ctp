<!--audio id="scriptaudio" src="<php echo Configure::read('Website.url.application'); ?>/files/datasrc/test.mp3"></audio-->    
<div class="row">
    <div class="col-md-12 text-center">
        
        <!--div id="zone_affich_test1" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 20px;">
            <div id="loader"></div>
        </div-->
        
        
        
        <form id="formResponse" class="form-inline" role="form">
            <div id="titre" class="row text-center" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;font-size: 20px;">Que ressentez-vous <strong>maintenant</strong> ?</div>
            
            <hr />
            <div id="zone_consignes" class="row text-center" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif;">
                <div class="col-md-12 text-center">
                    <div>
                        Nous vous demandons d'&eacute;valuer votre &eacute;tat &eacute;motionnel et votre &eacute;veil au moment pr&eacute;sent. Pour cela, vous disposez d'une &eacute;chelle comprenant 9 points et 5 personnages dont le visage varie en partant de la gauche de tr&egrave;s souriant &agrave; pas souriant du tout pour repr&eacute;senter les extr&eacute;mit&eacute;s avec tr&egrave;s positif d'un c&ocirc;t&eacute; et tr&egrave;s n&eacute;gatif de l'autre. Pour &eacute;valuer votre &eacute;tat d'&eacute;veil, l'&eacute;chelle comprend &eacute;galement 9 points et 7 personnages avec &agrave; son extr&eacute;mit&eacute; gauche un personnage tr&egrave;s excit&eacute; et &agrave; son extr&eacute;mit&eacute; droite un personnage tr&egrave;s apais&eacute;, presque endormi. Nous vous demandons de cocher, sur chacune des deux &eacute;chelles, la case qui correspond le mieux &agrave; votre ressenti actuel.
                    </div>
                    <br /><br />
                    <div align="center">
                        <div style="width:361px;" align="left">
                            <?php echo $this->Html->image("sam1.png", array("alt" => "Sam1")); ?>
                            <div style="letter-spacing: 16px; padding-left:24px;">
                                <input type="radio" name="sam1" value="0" style="width:20px;" checked="checked"/>
                                <input type="radio" name="sam1" value="1" style="width:15px;" />
                                <input type="radio" name="sam1" value="2" style="width:20px;" />
                                <input type="radio" name="sam1" value="3" style="width:15px;" />
                                <input type="radio" name="sam1" value="4" style="width:20px;" />
                                <input type="radio" name="sam1" value="5" style="width:15px;" />
                                <input type="radio" name="sam1" value="6" style="width:20px;" />
                                <input type="radio" name="sam1" value="7" style="width:15px;" />
                                <input type="radio" name="sam1" value="8" style="width:20px;" />
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div align="center">
                        <div style="width:361px;" align="left">
                            <?php echo $this->Html->image("sam2.png", array("alt" => "Sam2")); ?>
                            <div style="letter-spacing: 16px; padding-left:24px;">
                                <input type="radio" name="sam2" value="0" style="width:20px;" checked="checked"/>
                                <input type="radio" name="sam2" value="1" style="width:15px;" />
                                <input type="radio" name="sam2" value="2" style="width:20px;" />
                                <input type="radio" name="sam2" value="3" style="width:15px;" />
                                <input type="radio" name="sam2" value="4" style="width:20px;" />
                                <input type="radio" name="sam2" value="5" style="width:15px;" />
                                <input type="radio" name="sam2" value="6" style="width:20px;" />
                                <input type="radio" name="sam2" value="7" style="width:15px;" />
                                <input type="radio" name="sam2" value="8" style="width:20px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr />
            
            
            <div class="row">
                <div class="col-md-12 text-center">
                    <button id="btnFormResponse" type="submit" class="btn btn-default" >Valider</button>
                </div>
            </div>
            
        </form> 
        
        <div id="zone_intro"><!-- screen1 -->
            Nous vous remercions d’avoir accepté de participer à cette expérience. S’agissant de votre consentement, vous reconnaissez prendre part librement à cette expérience. Les informations que vous communiquerez resteront strictement confidentielles et anonymes.
        </div>
        
        <div id="zone_merci"><!-- screen6 -->
            Le test est maintenant terminé !<br />Nous vous remerçions.
        </div>
    </div>
</div>



<?php echo $this->Html->scriptStart( array( 'inline' => false)); ?>
    var imgloaderstr='<?php echo $this->Html->image('/img/throbber.gif', array('alt'=>'Chargement des données ...','title'=>'Chargement des données ...','border'=>0,'width'=>16,'height'=>16,'align'=>'absmiddle')).' Chargement des donn&eacute;es ...';?>';
    var strExport = '';
    var user = rdmid(8);
    var phase = 'phase 1'; //Phase 1 = avant le script; Phase 2 = après le script
    var screen = 0;
    
    function rdmid(len)
    {
        var text = "";
        var possible = "abcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i <= len; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        return text;
    }
    
    $(document).ready(function() {
        my_sound = $("<audio>", {src:"<?php echo Configure::read('Website.url.application'); ?>/files/datasrc/POWERNAP_FR_SOPHIE_EXO.mp3",preload:"auto"}).appendTo("body");
        var step = '<?php echo $position; ?>';
        $("#zone_intro").hide();
        //$("#titre").hide();
        //$("#zone_consignes").hide();
        $("#formResponse").hide();
        $("#zone_merci").hide();
        
        
        $(document).keypress(function( event ) {
            var key = String.fromCharCode(event.which);	
            //alert(screen);
            if(event.which=='32'){	//touche barre espace
                screen += 1;
                switch (screen)
                {
                    case 1 :
                        $("#zone_intro").show();
                        break;
                    case 2 : 
                        $("#zone_intro").hide();
                        $("#formResponse").show();
                        break;
                    case 3 : 
                        $("#formResponse").hide();
                        //On lance l'audio                        
                        break;
                    case 4 :
                        //alert(screen);
                        $("#formResponse").show();                        
                        break;
                    //case 6 :
                        //alert(screen);
                        //$("#formResponse").hide();
                        //$("#zone_merci").show();
                        //break;
                }
            }
        });
        
        
        
        
        
        //$('#scriptaudio').on('ended', function() {
        my_sound.on('ended', function() {
            $("#zone_preaudio").hide();
            phase = 'phase 2';
            //$("#zone_postaudio").show(0).delay(2000).fadeOut(400, function(){
                //screen += 1;
                $("#formResponse").show();
                //alert(screen);
            //});            
        });
        
        
        $("#formResponse").submit(function(event) {
            var nameRV="";
            strExport += user+';'+phase+';'+$("input:radio[name=sam1]:checked").val()+';Echelle Sam 1/';
            strExport += user+';'+phase+';'+$("input:radio[name=sam2]:checked").val()+';Echelle Sam 2/';
            export_data();
            if(phase == 'phase 1'){
                //Charge l'audio
                my_sound[0].play();
                $("#btnFormResponse").blur(); //On enlève le focus du bouton afin qu'il ne réagisse pas avec la bar de navigation
                $("#formResponse").hide();
            }else{
                $("#formResponse").hide();
                $("#zone_merci").show();
            }
            //my_sound[0].play();
            //$("#formResponse").hide();
            return false;
        });
        
        function export_data(){
            //strExport='sfsdfsd;trtrt;azeazeza/sdf;pouu;llllm';
            $.ajax({
                url: '<?php echo Configure::read('Website.url.application'); ?>/expe/sieste1/write',
                type: 'post',
                data: 'data='+strExport+'&phase='+phase+'&user='+user,
                success: function(data) {
                    
		}
            });
            strExport='';
            $('input:radio[name^="sam"][value="0"]').prop('checked', true);
        }
        
        
        
        
    });
<?php echo $this->Html->scriptEnd(); ?>