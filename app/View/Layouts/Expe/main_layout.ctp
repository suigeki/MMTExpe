<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MMT Labs</title>
        <!--link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css"-->
        <?php
            echo $this->Html->css('../baseBootstrapSassCompass/stylesheets/bootstrap.min.css', null,array());
            //echo $this->Html->css('../baseBootstrapSassCompass/stylesheets/bootstrap-reset.css', null,array());
	?>
        <style>
            * { margin: 0; padding: 0; }
            #page{display:table;overflow:hidden;margin:0px auto;}
            *:first-child+html #page {position:relative;}/*ie7*/
            * html #page{position:relative;}/*ie6*/

            #content_container{display:table-cell;vertical-align: middle;}
            *:first-child+html #content_container{position:absolute;top:50%;}/*ie7*/
            * html #content_container{position:absolute;top:50%;}/*ie6*/

            *:first-child+html #content{position:relative;top:-50%;}/*ie7*/
            * html #content{position:relative;top:-50%;}/*ie6*/

            html,body{height:100%;padding:0;background-color:#ffffff;text-align:center;margin:auto;}
            #page{height:100%;width:465px;}
	</style>
    </head>
    <body>
        <?php echo $this->Session->flash(); ?> 
        <div id="page">
            <div id="test" style="width:100%;"></div>	
            <div id="content_container">
                <div id="content">
                    <!--h6><em>MMT Labs</em></h6-->
                    <div class="container">
                        <!--div id="header" class="__jumbotron">
                            <h1>MMT Labs</h1>
                            <p>
                                Ce projet est propulsÃ© par Cakephp 2.8.2 !
                            </p>
                        </div-->

                        <!--hr /-->

                        <div class="row">
                            <div id="menu" class="col-md-12">
                                
                                <?php echo $content_for_layout ?>
                            </div>
                        </div>

                        <!--hr /-->

                        <!--footer>
                            <p>The sky's the limit Â© </p>
                        </footer-->
                            
                    </div>
                </div>
            </div>
        </div>
        
               
        <!--script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script-->
        <!--script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script--> 
        <script type="text/javascript" src="<?php echo Configure::read('Website.url.application');?>/js/jquery-2.2.2.min.js"></script>
        <script type="text/javascript" src="<?php echo Configure::read('Website.url.application');?>/baseBootstrapSassCompass/javascripts/bootstrap.min.js"></script>
        <?php echo $scripts_for_layout ?>
        <script>
            /*$(document).ready(function() {
                
            });*/
        </script>
    </body>
</html>

