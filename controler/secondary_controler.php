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
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/myhouses_style.css">';
                    }
                    elseif( $_GET['page']=='searchKeyWords')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/myhouses_style.css">';
                    }
                    elseif( $_GET['page']=='home')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/style_caroussel.css">';
                    }
                    elseif( $_GET['page']=='myProfile')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/my_profile.css">';
                    }
                    elseif( $_GET['page']== 'formHouse')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/createhouse_style.css">'; 
                    }
                    elseif( $_GET['page']== 'my_houses')
                    {
                       echo'<link rel="stylesheet" type="text/css" href="../view/css/myhouses_style.css">'; 
                    }
                    elseif( $_GET['page']== 'my_ads')
                    {
                        
                    }
                    elseif( $_GET['page']=='my_mp')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
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
                    elseif( $_GET['page']=='readSentMsg')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
                    }
                    elseif( $_GET['page']=='readMsg')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
                    }
                    elseif( $_GET['page']=='sentMsg')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/mailbox_style.css">';
                    }

                    elseif( $_GET['page']=='formUser')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/form_user.css">';
                    }

                    elseif( $_GET['page']=='houseCard')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/houseCard_style.css">';
                      
                        
                    }
                    elseif( $_GET['page']=='createHouse')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/createhouse_style.css">';
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/petit_caroussel_style.css">';

                    }
                    elseif( $_GET['page']=='confirmAddUser')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }

                    elseif( $_GET['page']=='confirmAddHouse')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif( $_GET['page']=='confirmAddMsg')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif($_GET['page']=='confirm_exchange')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif($_GET['page']=='confirm_favs')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif($_GET['page']=='confirm_delete_house')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif($_GET['page']=='session_destruct')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/confirm_alert.css">';

                    }
                    elseif($_GET['page']=='parameters')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/parameters.css">';

                    elseif($_GET['page']=='my_exchanges')
                    {
                        echo'<link rel="stylesheet" type="text/css" href="../view/css/css_rating_system.css">';
                    }
    }


    require_once(dirname(dirname(__FILE__))."/modele/pdoDatabaseRef.php");
    ?>
        
