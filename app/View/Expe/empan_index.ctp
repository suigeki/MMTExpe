<audio id="scriptaudio" src="<?php echo Configure::read('Website.url.application'); ?>/files/datasrc/test.mp3"></audio>    
<div class="row">
    <div class="col-md-12 text-center">
        <div id="zone_affich_phase1" style="font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size: 20px;">
            <div id="loader"></div>
        </div>
        <div id="zone_merci">
            Le test est maintenant terminé !<br />Nous vous remerçions.
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
                <label class="sr-only" for="email">Votre réponse:</label>
                <input id="response_test" type="text" class="form-control" placeholder="Votre réponse">
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
        
        var step = '<?php echo $position; ?>';
        $("#zone_merci").hide();
        $("#zone_preaudio").hide();
        $("#zone_postaudio").hide();
        $("#response_test").hide();
        $("#btnFormResponse").hide();
        load_divs(nbrLetters);
        
        function load_divs(length){
            if(nbrLetters<=20){
                $("#loader").html(imgloaderstr);
                $.ajax({
                    url: '<?php echo Configure::read('Website.url.application'); ?>/expe/empan1/test1/'+length,
                    data: '',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(index, element) {
                            if($('#zone_affich_phase1').html(element)){
                                $('#zone_affich_phase1').show();
                                stimulus = element;
                                $('#loader').html('');
                                $('#zone_affich_phase1').delay(2000).fadeOut(400);
                                $('#response_test').delay(2400).show(0);
                                $('#btnFormResponse').delay(2400).show(0);
                                $('#response_test').focus();
                            }
                        });
                    }
                });
            }else{
                export_data();
                if(phase == 'phase 1'){
                    $('#scriptaudio').get(0).play();
                }
                $("#zone_merci").show(0).delay(2000).fadeOut(400);
            }
        }
        
        $('#scriptaudio').on('ended', function() {
            $("#zone_preaudio").hide();
            $("#zone_postaudio").show(0).delay(2000).fadeOut(400);
            phase = 'phase 2';
            errors = 0;
            nbrLetters = 4;
            load_divs(nbrLetters);
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
                        $("#zone_preaudio").show(0).delay(2000).fadeOut(400);
                        $('#scriptaudio').get(0).play();
                    }else{
                        $("#zone_merci").show();
                    }
                }else{
                    load_divs(nbrLetters);
                }
            }
            return false;
        });
        
        
    });
<?php echo $this->Html->scriptEnd(); ?>