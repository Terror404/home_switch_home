<?php session_start() ?>
<!Doctype html>

<html>
    <head>
            <meta charset="utf-8"/>
            <?php include("secondary_controler.php");?>
            <?php echo '<script>';
            include("../modele/backOffice/give_rights.js");
            echo'</script>';?>
            
       
    </head>
	<body >
            
        
            <header>
                <div class="white"></div>
            <?php
            
            
            include("../controler/co_bloc.php");
            
            ?>
                
            </header>
            <?php 

                
                
                

                if($_GET['page']=='index' AND isset($_GET['page']))
                
                    {
                        include("../view/backOffice/index.php");
                        
                    } 
            
            ?>
            <div class="content">
                
                
                
                
               

            <?php        
            require("../modele/pdoDatabaseRef.php");
                // choice of the page depending on the value in the url
                if(isset($_GET['page']) and ($_GET['page']!=''))
                {
                    
                    //Confirm Exchange
                    if($_GET['page']=='home')
                    {
                        
                        include('../view/backOffice/home.php');
                    }
                     elseif($_GET['page']=='searchCriteria')
                    {
                        require('../modele/backOffice/search_criteria.php');
                        include('../view/backOffice/search_criteria.php');
                    }
                    elseif($_GET['page']=='adCriteria')
                    {
                        require('../modele/backOffice/ad_criteria.php');
                        include('../view/backOffice/ad_criteria.php');
                    
                    }
                    elseif($_GET['page']=='houseCriteria')
                    {
                        require('../modele/backOffice/house_criteria.php');
                        include('../view/backOffice/house_criteria.php');
                    }
                    elseif($_GET['page']=='rights')
                    {
                        require('../modele/backOffice/give_rights.php');
                        include('../view/backOffice/give_rights.php');
                    }
                    elseif($_GET['page']=='moderateSite')
                    {
                        
                        include('../view/backOffice/moderate_site.php');
                        
                        if($_GET['state']==1)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_user.php');
                        }
                        elseif($_GET['state']==2)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_house.php');
                        }
                        elseif($_GET['state']==3)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_warned_user.php');
                        }
                        elseif($_GET['state']==4)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_deleted_user.php');
                        }
                        elseif($_GET['state']==5)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_deleted_house.php');
                        }
                        elseif($_GET['state']==6)
                        {
                            require('../modele/backOffice/moderate_site.php');
                            include('../view/backOffice/moderate_site_deleted_house.php');
                        }
                    }
                    
                    
                }
                
                   
                ?>
                
            </div>
            
            
	</body>
</html>
