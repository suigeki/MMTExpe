<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>MMT Labs</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    </head>
    <body>
        <h6><em>MMT Labs</em></h6>
        <div class="container">
            <div id="header" class="__jumbotron">
                <h1>MMT Labs</h1>
                <p>
                    Ce projet est propulsé par Cakephp 2.8.2 !
                </p>
            </div>
            
            <hr />
            
            <div class="row">
                <div id="menu" class="col-md-12">
                    <?php echo $this->Session->flash(); ?>
                    <?php echo $content_for_layout ?>
                </div>
            </div>
                    
            <hr />
                    
            <footer>
                <p>The sky's the limit © </p>
            </footer>
        </div>
        
                
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> 
        <?php echo $scripts_for_layout ?>
        <script>
            /*$(document).ready(function() {
                
            });*/
        </script>
    </body>
</html>

