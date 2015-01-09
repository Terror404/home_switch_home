<!DOCTYPE html>
	<head>
		<title> <?php echo $_SESSION['$blocComm']; ?> </title>
		<meta charset="utf-8" />
                <link rel="stylesheet" href="../CommentaryBloc/css_commentary_bloc.css" />
	</head>
	
	<body>
            <section class="BlocCom">
                    <?php
                        while($resComPic=$askComPic->fetch() AND $resComLog=$askComLog->fetch())
                                {
                    ?>
                                    <div class="LogPic">
                                        <p class="Pic">
                                                <!--Insert here profile pic and login + link to the profile page-->
                                                <!--<a href=""> Penser à insérer le lien du profil--><img src='<?php echo $resComPic['picture'] ?>' alt='photo de profil' class="ProfPic"><!--</a>-->
                                        </p>
                                        <p class="Log">
                                                <br/><!--<a href=''>--><?php echo $resComLog['login']; ?>
                                        </p>
                                    </div>            
                    <?php
                                }
                    ?>
                
                    <?php
                        while($resComTtle=$askComTtle->fetch())
                            {
                    ?>
                                    <p class="TitleCom">
                                            <!--Insert here title of the comment-->
                                            "<?php echo $resComTtle['title']; ?>"
                                    </p><br/>
                    <?php
                            }
                    
                        while($resComDate=$askComDate->fetch() AND $resComRate=$askComRate->fetch())
                            {
                    ?>
                                    <p class="NoteDate">
                                        <!--Insert here rate of the house and date of the comment-->
                                        <?php echo $resComRate['rating']; ?> /10    <span class="Date"><?php echo $resComDate['date']?></span>
                                    </p>
                    <?php
                            }
                            
                        while($resComTxt=$askComTxt->fetch())
                            {
                    ?>
                                    <p class="ComTexte">
                                        <!--Insert here text of the comment-->
                                        <span class="Avis">Avis</span> : <?php echo $resComTxt['text']?>
                                    </p>
                    <?php
                        }
                    ?>
                  
		</section>
	</body>