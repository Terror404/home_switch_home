<?php

echo'<link rel="stylesheet" type="text/css" href="../view/css/hsh_style.css">';
echo'<link rel="stylesheet" type="text/css" href="../view/css/bloc_co.css" >';

$page=$_GET['page'];

if (isset($page) AND $page!='')
{
                    if( $_GET['page']=='research')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/search_box.css">';
                    }
                    elseif( $_GET['page']=='search_result')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/search_result.css">';
                    }
                    elseif( $_GET['page']=='home')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/style_caroussel.css">';
                    }
                    elseif( $_GET['page']=='my_profile')
                    {
                        
                    }
                    elseif( $_GET['page']== 'my_research')
                    {
                        
                    }
                    elseif( $_GET['page']== 'my_houses')
                    {
                       
                    }
                    elseif( $_GET['page']== 'my_ads')
                    {
                        
                    }
                    elseif( $_GET['page']=='my_mp')
                    {
                        
                    }
                    elseif( $_GET['page']== 'forum_index')
                    {
                        
                    }
                    elseif( $_GET['page']=='topic')
                    {
                        
                    }
                    elseif( $_GET['page']=='newMsg')
                    {
                       echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
                    }
                    elseif( $_GET['page']=='confirmAddMsg')
                    {
                       echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
                    }
                    
    }





     $DB = new PDO('mysql:host=localhost;dbname=home_switch_home', 'root', '');
        if (!$DB) {
            printf("Ã‰chec de la connexion : %s\n", mysqli_connect_error());
            exit();
        }
     ?>
        
