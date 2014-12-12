<?php session_start()?>
<!Doctype html>

<html>
    <head>
            <meta charset="utf-8"/>
            <?php include("secondary_controler.php"); ?>
       
    </head>
	<body>
            
        
    
            <?php 
             include("../view/header.php"); 

                include("../view/nav.php");
                
                    include("../view/co_bloc.php");

                
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
                        include("../modele/search_my_profile.php"); //modele
                        require("../view/my_profile.php");//vue
                        
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
                    elseif( $_GET['page']=='newMsg')
                    {
                        include("../view/new_message_form.php");//vue
                    }
                    elseif( $_GET['page']=='confirmAddMsg')
                    {
                        
                        require("../modele/add_message.php"); //modele
                        include("../view/confirm_add_message.php");//vue
                    }
                    
                }
                
                   
                ?>
                
            </div>
            
            <footer>
                <?php include("../view/footer.php");?>
            </footer>
	</body>
</html>
