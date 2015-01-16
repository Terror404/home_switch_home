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
                if(!isset($_GET['page']))
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
                    
                    //News
                    elseif( $_GET['page']== 'news')
                    {
                        require("../modele/search_news.php"); //modele
                        include("../view/news.php");//vue
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
                        include("../view/search_result_key.php"); //vue
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
                        if(isset($_POST['modifyProf']))
                        {
                            require("../modele/update_my_profile.php");//modele
                            require("../modele/search_my_profile.php"); //modele
                            include("../view/modify_my_profile.php");//vue
                        }
                        else
                        {
                            require("../modele/search_my_profile.php"); //modele
                            include("../view/my_profile.php");//vue
                        }                        
                    }
                    //Favorites
                    elseif( $_GET['page']== 'favorites')
                    {
                        require("../modele/search_my_favorites.php"); //modele
                        include("../view/my_favorites.php");//vue
                    }
                    //Parameters
                    elseif($_GET['page']=='parameters')
                    {
                        require("../modele/fct_verif_date.php");
                        require("../modele/search_parameters.php");
                        include("../view/parameters.php");
                    }
                    //Redirection after chgt of the login
                    elseif($_GET['page']=='redirect_chgt_log')
                    {
                        require("../modele/search_parameters.php");
                        include("../view/redirect_chgt_login.php");
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
                        require("../modele/verif_form_user.php");
                        require("../modele/add_user.php"); //modele
                        require("../view/auto_message.php");
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
                        require("../modele/create_house.php");
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
                        
                        include("../view/profile_reminder.php");
                        }
                    }
                    
                    //House Card
                    elseif($_GET['page']=='houseCard')
                    {
                        require("../modele/search_house_card.php");
                        require("../modele/search_commentary_bloc.php");
                        include("../view/house_card.php");
                        
                    }
                    
                    //Modify House Card
                    elseif($_GET['page']=='modify_House_Card')
                    {
                        require("../modele/search_house_card.php");
                        include("../view/modify_hc.php");
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
                    
                    //Confirm creation of the ad
                    elseif($_GET['page']=='confAd')
                    {
                        require("../modele/add_ad.php");
                    }
                    
                    // list of Messages that have been sent
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
                    
                    elseif ($_GET['page'] == 'forumIndex') {
                        include("./forum/index.php");
                    }
                    
                    elseif ($_GET['page'] == 'editPost') {
                        include("./forum/editmessage.php");
                    }
                    
                    elseif ($_GET['page'] == 'addPost') {
                        include("./forum/newmessage.php");
                    }
                    
                    elseif ($_GET['page'] == 'addTopic') {
                        include("./forum/newtopic.php");
                    }
                    
                    elseif ($_GET['page'] == 'showForum') {
                        include("./forum/showcategory.php");
                    }
                    
                    elseif ($_GET['page'] == 'showTopic') {
                        include("./forum/showtopic.php");
                    }
                    elseif ($_GET['page'] == 'editCategory') {
                        include("./forum/editcategory.php");
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
                        require("../modele/add_favs.php");
                        include("../view/add_favorites.php");
                    }
                    
                    //Confirm the deleting of a house
                    elseif($_GET['page']=='confirm_delete_house')
                    {
                        require('../modele/update_delete_house.php');
                        include('../view/delete_house.php');
                    }
                    
                    //My Exchanges
                    elseif($_GET['page']=='my_exchanges')
                    {
                        require('../modele/search_my_exchanges.php');
                        include('../view/my_exchanges.php');
                    }
                    
                    elseif($_GET['page']=='session_destruct')
                    {

                        include('../view/session_destruct.php');
                    }
                    //Comment form
                    elseif($_GET['page']=='comment')
                    {
                        //require("");
                        include("../view/commentary_form.php");
                    }
                    elseif($_GET['page']=='commentary_treatment')
                    {
                        //require("");
                        require('../modele/add_commentary.php');
                        include("../view/add_commentary.php");
                    }
                    elseif($_GET['page']=='treatExchange')
                    {
                        //require("");
                        require('../modele/treat_exchange.php');
                        include("../view/treat_exchange.php");
                    }
                    elseif($_GET['page']=='faq')
                    {
                        include("../view/faq.php");
                    }
                    elseif($_GET['page']=='contact')
                    {
                        include("../view/contact_form.php");
                    }
                    
                    
                }
                   
                ?>
                
            </div>
            
            <footer>
                <?php include("../view/footer.php");?>
            </footer>
	</body>
</html>
