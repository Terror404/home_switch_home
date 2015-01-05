<!Doctype html>

<html>
    <head>
            <meta charset="utf-8"/>
            <?php include("secondary_controler.php"); ?>
       
    </head>
	<body>
            
        
            <header>
            <?php
            include("../view/header.php");
            
            include("../controler/co_bloc.php");
            
            ?>
                
            </header>
            <?php 

                include("../view/nav.php");
                
                

                if($_GET['page']=='index' AND isset($_GET['page']))
                
                    {
                        include("../view/backOffice/index.php");
                        
                    } 
            
            ?>
            <div class="content">
                
                
                
               

            <?php        
                // choice of the page depending on the value in the url
                if(isset($_GET['page']) and ($_GET['page']!=''))
                {
                    
                    
                    //Confirm Exchange
                    if($_GET['page']=='confirm_exchange')
                    {
                        require('../modele/add_exchange_form.php');
                        include('../view/confirm_exchange.php');
                    }
                    
                    
                    
                }
                
                   
                ?>
                
            </div>
            
            
	</body>
</html>
