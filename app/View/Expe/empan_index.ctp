<!--audio id="scriptaudio" src="<php echo Configure::read('Website.url.application'); ?>/files/datasrc/test.mp3"></audio-->    
<div class="row">
    <div class="col-md-12 text-center">
        <div id="zone_affich_test1" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 20px;">
            <div id="loader"></div>
        </div>
        <div id="zone_intro"><!-- screen1 -->
            Nous vous remercions d'avoir accept&eacute; de participer &agrave; cette exp&eacute;rience. S'agissant de votre consentement, vous reconnaissez prendre part librement &agrave; cette exp&eacute;rience. Les informations que vous communiquerez resteront strictement confidentielles et anonymes.
        </div>
        <div id="zone_merci">
            Le test est maintenant terminé !<br />Nous vous remerçions.
        </div>
        <div id="consignesT0">
            Vous allez voir appara&icirc;tre &agrave; l'&eacute;cran une suite de consonnes. Il vous est demand&eacute; de les m&eacute;moriser. Vous devrez ensuite rappeler de m&eacute;moire ces m&ecirc;mes consonnes en les saisissant dans la zone pr&eacute;vue &agrave; cet effet &agrave; l'aide du clavier de l'ordinateur. Plusieurs suites de consonnes seront &agrave; restituer, sachant que la longueur de ces suites de consonnes peut varier d'une suite &agrave; l'autre.
            Quand vous &ecirc;tes pr&ecirc;t &agrave; commencer, appuyez sur une touche du clavier.
        </div>
        <div id="consignesT1">
            A nouveau, vous allez voir appara&icirc;tre &agrave; l'&eacute;cran une suite de consonnes. Il vous est demand&eacute; de les m&eacute;moriser. Vous devrez ensuite rappeler de m&eacute;moire ces m&ecirc;mes consonnes en les saisissant dans la zone pr&eacute;vue &agrave; cet effet &agrave; l'aide du clavier de l'ordinateur. Plusieurs suites de consonnes seront &agrave; restituer, sachant que la longueur de ces suites de consonnes peut varier d'une suite &agrave; l'autre.
            Quand vous &ecirc;tes pr&ecirc;t &agrave; commencer, appuyez sur une touche du clavier.
        </div>
        <div id="zone_preaudio">
            début audio.
        </div>
        <div id="zone_postaudio">
            fin audio.
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12 text-center">
        <form id="formResponse" class="form-inline" role="form">
            <div class="form-group">
                <label class="sr-only" for="email">Votre réponse : </label>
                <input id="response_test" type="text" class="form-control" placeholder="Votre réponse"  autofocus>
            </div>
            <button id="btnFormResponse" type="submit" class="btn btn-default" >Valider</button>
        </form>
    </div>
</div>



<?php echo $this->Html->scriptStart( array( 'inline' => false)); ?>
    var imgloaderstr='<?php echo $this->Html->image('/img/throbber.gif', array('alt'=>'Chargement des données ...','title'=>'Chargement des données ...','border'=>0,'width'=>16,'height'=>16,'align'=>'absmiddle')).' Chargement des donn&eacute;es ...';?>';
    var nbrLetters = 4;
    var errors = 0;
    var stimulus = '';
    var strExport = '';
    var user = rdmid(8);
    var phase = 'phase 1'; //Phase 1 = avant le script; Phase 2 = après le script
    
    
    function rdmid(len)
    {
        var text = "";
        var possible = "abcdefghijklmnopqrstuvwxyz0123456789";

        for( var i=0; i <= len; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        return text;
    }
    
    $(document).ready(function() {
        my_sound = $("<audio>", {src:"<?php echo Configure::read('Website.url.application'); ?>/files/datasrc/test.mp3",preload:"auto"}).appendTo("body");
        var step = '<?php echo $position; ?>';
        $("#zone_intro").hide();
        $("#zone_merci").hide();
        $("#consignesT0").hide();
        $("#consignesT1").hide();
        $("#zone_preaudio").hide();
        $("#zone_postaudio").hide();
        $("#response_test").hide();
        $("#btnFormResponse").hide();
        var screen = 0;
        //load_divs(nbrLetters);
        
        $(document).keypress(function( event ) {
            var key = String.fromCharCode(event.which);	
            if(event.which=='32'){	//touche barre espace
                screen += 1;
                switch (screen)
                {
                    case 1 :
                        $("#zone_intro").show();
                        break;
                    case 2 :
                        $("#zone_intro").hide();
                        $("#consignesT0").show();
                        break;
                    case 3 :
                        $("#consignesT0").hide();
                        load_divs(nbrLetters);
                        break;
                    case 4 :
                        //load audio
                        break;
                    case 5 : 
                        $("#consignesT1").show();
                        break;
                    case 6 :
                        $("#consignesT1").hide();
                        load_divs(nbrLetters);
                        break;
                    case 7 :
                        //Fin
                        break;
                }
            }
        });
        
        function load_divs(length){
            if(nbrLetters<=20){
                $("#loader").html(imgloaderstr);
                $.ajax({
                    url: '<?php echo Configure::read('Website.url.application'); ?>/expe/empan1/test1/'+length,
                    data: '',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, element) {
                            stimulus = element;
                            $('#loader').html('');
                            
                            // set interval
                            var splitElem = element.split('');
                            $('#zone_affich_test1').html(splitElem[0]);
                            $('#zone_affich_test1').show();
                            var tid = setInterval(manageItem, 50);
                            var tip = 0;
                            var iLetter = 0;
                            console.log(splitElem);
                            function manageItem() {
                                tip += 50;
                                if(tip == 50){   //Affichage de la lettre
                                    $('#zone_affich_test1').html(splitElem[iLetter]);
                                    $('#zone_affich_test1').show();
                                    
                                }else if(tip == 900){   //On masque la lettre
                                    $('#zone_affich_test1').hide();
                                }else if(tip == 1550){  //Fin de la boucle
                                    tip = 0;
                                    iLetter += 1;
                                    if(iLetter == splitElem.length){
                                        abortTimer();
                                        $('#zone_affich_test1').html('');
                                        $('#response_test').show();
                                        $('#btnFormResponse').show();
                                        $('#response_test').focus();
                                    }
                                }else{
                                }
                            }
                            function abortTimer() { // to be called when you want to stop the timer
                                clearInterval(tid);
                            }
                        
                            
                            /*if($('#zone_affich_test1').html(element)){
                                $('#zone_affich_test1').show();
                                stimulus = element;
                                $('#loader').html('');
                                $('#zone_affich_test1').delay(2000).fadeOut(400);
                                $('#response_test').delay(2400).show(0);
                                $('#btnFormResponse').delay(2400).show(0);
                                $('#response_test').focus();
                            }*/
                        });
                    }
                });
            }else{
                export_data();
                if(phase == 'phase 1'){
                    my_sound[0].play();
                    /*$("#zone_preaudio").show(0).delay(2000).fadeOut(400,function(){
                        //$('#scriptaudio').get(0).play();
                        my_sound[0].play();
                    });*/
                }else{
                    $("#zone_merci").show(0).delay(2000).fadeOut(400);
                }
            }
        }
        
        //$('#scriptaudio').on('ended', function() {
        my_sound.on('ended', function() {
            $("#zone_preaudio").hide();
            phase = 'phase 2';
            errors = 0;
            nbrLetters = 4;
            screen = 5;
            $("#consignesT1").show();
        });
        
        function export_data(){
            //strExport='sfsdfsd;trtrt;azeazeza/sdf;pouu;llllm';
            $.ajax({
                url: '<?php echo Configure::read('Website.url.application'); ?>/expe/empan1/write',
                type: 'post',
                data: 'data='+strExport+'&phase='+phase+'&user='+user,
                success: function(data) {
		}
            });
            strExport='';
        }
        
        $("#formResponse").submit(function(event) {
            //alert("Handler for .submit() called." );
            //event.preventDefault();
            $("#response_test").hide();
            $("#btnFormResponse").hide();
            strExport += user+';'+phase+';'+$("#response_test").val().toUpperCase()+';'+stimulus+';'+nbrLetters+';'+errors+'/';
            if($("#response_test").val().toUpperCase() == stimulus){                
                $("#response_test").val('');
                errors = 0;
                nbrLetters += 1;                
                load_divs(nbrLetters);
            }else{
                $("#response_test").val('');
                errors += 1;
                if(errors == 2){
                    export_data();
                    if(phase == 'phase 1'){
                        //$("#zone_preaudio").show(0).delay(2000).fadeOut(400,function(){
                            //$('#scriptaudio').get(0).play();
                            my_sound[0].play();
                        //});                        
                    }else{
                        $("#zone_merci").show(0).delay(2000).fadeOut(400);
                    }
                }else{
                    load_divs(nbrLetters);
                }
            }
            return false;
        });
        
        
    });
<?php echo $this->Html->scriptEnd(); ?>