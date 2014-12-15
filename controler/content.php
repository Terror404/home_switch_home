<?php session_start()?>
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
                
                

                if($_GET['page']=='home' AND isset($_GET['page']))
                
                    {
                        include("../view/home.php");
                        
                    } 
            
            ?>
            <div class="content">
                
                
                
               

            <?php        
                // choice of the page depending on the value in the url
                if(isset($_GET['page']) and ($_GET['page']!=''))
                {
                      
                    if( $_GET['page']=='research')
                    {
                        include("../view/search_box.php");//vue
                    }
                    elseif( $_GET['page']=='search_result')
                    {
                        require("../modele/search_ad.php"); //modele
                        include("../view/search_result.php"); //vue
                    }
                    elseif( $_GET['page']=='myProfile')
                    {
                        require("../modele/search_my_profile.php"); //modele
                        include("../view/my_profil.php");//vue
                        
                    }
                    elseif( $_GET['page']== 'my_research')
                    {
                        include("../view/my_research.php");//vue
                        include("../modele/search_my_research.php"); //modele
                    }
                    elseif( $_GET['page']== 'my_houses')
                    {
                        include("../view/my_houses.php");//vue
                        include("../modele/search_my_houses.php"); //modele
                    }
                    elseif( $_GET['page']== 'my_ads')
                    {
                        include("../view/my_ads.php");
                        include("../modele/search_my_ads.php"); //modele
                    }
                    elseif( $_GET['page']=='my_mp')
                    {
                        include("../view/my_mp.php");//vue
                        include("../modele/search_my_mp.php"); //modele
                    }
                    elseif( $_GET['page']== 'forum_index')
                    {
                        include("../view/forum_index.php");//vue
                        include("../modele/search_forum_index.php"); //modele
                    }
                    elseif( $_GET['page']=='topic')
                    {
                        include("../view/topic.php");//vue
                        include("../modele/search_topic.php"); //modele
                    }
                    elseif( $_GET['page']=='formUser')
                    {
                        include("../view/form_user.php");//vue
                    }
                    elseif( $_GET['page']=='confirmAddUser')
                    {
                        
                        require("../modele/add_user.php"); //modele
                        include("../view/confirm_add_user.php");//vue
                    }
                    elseif( $_GET['page']=='formUser')
                    {
                        include("../view/form_user.php");//vue
                    }
                    elseif( $_GET['page']=='confirmAddUser')
                    {
                        
                        require("../modele/add_user.php"); //modele
                        include("../view/confirm_add_user.php");//vue
                    }
                    
                    // Add a house
                    
                    elseif( $_GET['page']=='formHouse')
                    {
                        include("../view/form_house.php");//vue
                    }
                    
                    // Confirm the add of the house
                    
                    elseif( $_GET['page']=='confirmAddHouse')
                    {
                        
                        require("../modele/add_house.php"); //modele
                        include("../view/confirm_add_house.php");//vue
                    }
                    
                    // Write a new msg
                    
                    elseif( $_GET['page']=='newMsg')
                    {
                        include("../view/new_message_form.php");//vue
                    }
                    
                    //confirm the sending of the new message
                    
                    elseif( $_GET['page']=='confirmAddMsg')
                    {
                        
                        require("../modele/add_message.php"); //modele
                        include("../view/confirm_add_message.php");//vue
                    }
                    elseif($_GET['page']=='createHouse')
                    {
                        //require("../modele/add_house.php"); //modele
                        include("../view/create_house.php"); //view
                        include("../view/profile_reminder.php");
                        include("../modele/search_profile_reminder.php");
                    }
                    
                                    
                   
                    elseif($_GET['page']=='createHouse')
                    {   
                        if(!isset($_SESSION['userId']))
                        {
                        echo"Vous ne pouvez pas accéder à cette page. Veuilez vous connecter.";
                        }
                        else
                        {
                        include("../view/create_house.php"); //view
                        require("../modele/search_profile_reminder.php");
                        include("../view/profile_reminder.php");
                        }
                    }
                    elseif($_GET['page']=='houseCard')
                    {
                        include("../modele/search_house_card.php");
                        if(!isset($_SESSION['userId']) AND $_SESSION['userId']!==$askIdOwner)   // FAUX A REFAIRE !!!!
                        {
                            include("../view/house_card.php");
                        }
                        else
                        {
                            include "../view/modify_hc.php";
                        }    
                    }
                    elseif($_GET['page']=='createAd')
                    {
                        if(!isset($_SESSION['userId']))
                        {
                            echo"Vous ne pouvez pas accéder à cette page. Veuillez vous connecter";
                        }
                        else
                        {
                            require("../modele/search_house_card.php");
                            include("../view/create_ad.php");
                            require("../modele/search_profile_reminder.php");                            
                            include("../view/profile_reminder.php");
                            
                        }
                    }
                }
                
                   
                ?>
                
            </div>
            
            <footer>
                <?php include("../view/footer.php");?>
            </footer>
	</body>
</html>
