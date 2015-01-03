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
                    //Research page 
                    if( $_GET['page']=='research')
                    {
                        require("../modele/search_box_adaptative.php");
                        include("../view/search_box_adaptative.php");//vue
                        include("../view/interactive_map.php");
                    }
                    
                    //Search Result page
                    elseif( $_GET['page']=='search_result')
                    {
                        require("../modele/search_ad.php"); //modele
                        include("../view/search_result.php"); //vue
                    }
                    
                    //Search by keywords
                    elseif( $_GET['page']=='searchKeyWords')
                    {
                        require("../modele/search_keywords.php"); //modele
                        include("../view/search_result.php"); //vue
                    }
                    
                    //search result by map
                    
                    elseif( $_GET['page']=='searchResultMap')
                    {
                        require("../modele/search_map.php"); //modele
                        include("../view/search_result.php"); //vue
                    }
                    
                    
                    //Profile page
                    elseif( $_GET['page']=='myProfile')
                    {
                        require("../modele/search_my_profile.php"); //modele
                        include("../view/my_profile.php");//vue
                        
                    }
                    //Favorites
                    elseif( $_GET['page']== 'favorites')
                    {
                        require("../modele/search_my_favorites.php"); //modele
                        include("../view/my_favorites.php");//vue
                    }
                    //Own Houses
                    elseif( isset($_SESSION['userId']) AND $_GET['page']== 'my_houses')
                    {
                        require("../modele/search_my_houses.php"); //modele
                        include("../view/my_houses.php");//vue                       
                    }
                    //Own Ad
                    elseif( isset($_SESSION['userId']) AND $_GET['page']== 'my_ads')
                    {
                        include("../view/my_ads.php");
                        include("../modele/search_my_ads.php"); //modele
                    }
                    //My Messages
                    elseif(isset($_SESSION['userId']) AND $_GET['page']=='my_mp')
                    {
                        include("../view/my_mp.php");//vue
                        include("../modele/search_my_mp.php"); //modele
                    }
                    //Inscription Form
                    elseif($_GET['page']=='formUser')
                    {
                        include("../view/form_user.php");//vue
                    }
                    //Redirect page after inscription
                    elseif( $_GET['page']=='confirmAddUser')
                    {
                        
                        require("../modele/add_user.php"); //modele
                        include("../view/confirm_add_user.php");//vue
                    }
                    //Ad Creation page
                    elseif( $_GET['page']=='formAd')
                    {
                        require("../modele/search_house_card.php");
                        include("../view/create_ad.php");//vue
                    }
                    //Redirect Page after ad creation
                    elseif( $_GET['page']=='confirmAddAd')
                    {
                        
                        require("../modele/add_ad.php"); //modele
                        include("../view/confirm_add_ad.php");//vue
                    }
                    
                    // Add a house
                    elseif( $_GET['page']=='formHouse')
                    {
                        include("../view/create_house.php");//vue
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
                        include("../modele/add_message.php"); //modele
                        include("../view/confirm_sent_message.php");//vue
                    }
               
                    //Add a new house
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
                    
                    //House card
                    elseif($_GET['page']=='houseCard')
                    {
                        require("../modele/search_house_card.php");
                        require("../modele/search_commentary_bloc.php");
                        include("../view/house_card.php");
                    }
                    
                    
                    //Add an ad
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
                    
                    // list of Messages which have been sent
                     elseif($_GET['page']=='sentMsg')
                    {
                        require("../modele/search_sent_msg.php"); //modele
                        include("../view/mailbox_sent_messages.php"); //view
                    }
                    
                    // read a message from received messages
                    elseif($_GET['page']=='readMsg')
                    {
                        require("../modele/read_my_msg.php"); //modele
                        include("../view/mailbox_read_message.php"); //view
                    }
                    
                    elseif ($_GET['page'] == 'forumIndex')
                    {
                            include("./forum/index.php");
                    }
                    
                    elseif ($_GET['page'] == 'editPost')
                    {
                            include("./forum/editmessage.php");
                    }
                    
                    elseif ($_GET['page'] == 'addPost')
                    {
                            include("./forum/newmessage.php");
                    }
                    
                    elseif ($_GET['page'] == 'addTopic')
                    {
                            include("./forum/newtopic.php");
                    }
                    
                    elseif ($_GET['page'] == 'showForum')
                    {
                            include("./forum/showcategory.php");
                    }
                    
                    elseif ($_GET['page'] == 'showTopic')
                    {
                            include("./forum/showtopic.php");
                    }
                    
                    // read a message from received messages
                    elseif($_GET['page']=='readSentMsg')
                    {
                        require("../modele/read_sent_msg.php"); //modele
                        include("../view/mailbox_read_sent_message.php"); //view
                    }
                    
                    // Exchange Form
                    elseif($_GET['page']=='exchange')
                    {
                        require("../modele/search_exchange_form.php"); //modele
                        include("../view/exchange_form.php"); //view
                    }
                    
                    //Confirm Exchange
                    elseif($_GET['page']=='confirm_exchange')
                    {
                        require('../modele/add_exchange_form.php');
                        include('../view/confirm_exchange.php');
                    }
                    
                    //Confirm the favs' add or delete
                    elseif($_GET['page']=='confirm_favs')
                    {
                        require"../modele/add_favs.php";
                    }
                    
                    
                    
                }
                
                   
                ?>
                
            </div>
            
            <footer>
                <?php include("../view/footer.php");?>
            </footer>
	</body>
</html>
