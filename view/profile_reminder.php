<!Doctype html>
    <html>
        <head>
            <meta charset="utf-8" />
            <link rel="stylesheet" href="../view/ccs/profile_reminder.css" />
            <title> Profile Reminder </title>
        </head>
        
        <body>
            <div class="ProfileReminder">
                <div class="PicCase"> <!--Put the profile photo-->
                    <?php
                        while ($resPic=$askPic->fetch())
                            {
                    ?>                                                                                                 
                                <img src="<?php echo $resPic['picture']?>" alt="photo de profil php" class='ProfilePic' />                                
                    <?php
                            }
                    ?>
                
                </div>
                <br/>
                <p class="Login"> <!--Put the login-->
                    <?php
                        while($resNP=$askNP->fetch())
                        {
                            echo $resNP['login'];
                        }                        
                    ?>
                </p>
                <p class="Desc"> <!--Put the description-->
                    <?php
                        while ($resDesc=$askDesc->fetch())
                            {
                                echo $resDesc['description'];
                            }
                    ?>
                </p>
                <p class="Rate"> <!--Put the rate-->
                    <?php
                        while ($resRate=$askRate->fetch())
                            {
                    ?>
                                Note : <?php echo $resRate['rating']?> /10
                    <?php
                            }
                    ?>
                </p>
            </div>
        </body>