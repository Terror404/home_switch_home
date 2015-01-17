                
     <div id="searchbar"> 
         <div class="searchbox"></div>  
         <div class="texte"> 
                <?php if (isset($_SESSION['userLogin']))
                                {
                                    echo $_SESSION['slogan']; 
                                }
                                else 
                                {
                                    echo 'LEURS MAISONS, VOS VACANCES';
                                }
                                ?> 
         </div>

                        <form class="formHome" action="content.php?page=searchKeyWords" method="post">
                            <input type="text" name="keyWords" placeholder="PARTIR A LA DECOUVERTE" class="placeholderHome" />
                            </br>
                            </br>
                            </br>
                         <input class="sub" type="submit" value="GO" /> 
                        </form>

     </div>
    <a class="previouslink" href="#">
        <img class="previouslinki" src="..//view/pictures/previous.png"/>
    </a>

	<div class="carousel-inner">
		<img class="image-shown" src="..//view/pictures/house1.jpg" alt="house1"/>
		<img class="image-hidden" src="..//view/pictures/house2.jpg" alt="house2"/>
		<img class="image-hidden" src="..//view/pictures/house3.jpg" alt="house3"/>
		<img class="image-hidden" src="..//view/pictures/house4.jpg" alt="house4"/>
	</div>

	<a class="nextlink" href="#">
            <img class="nextlinki" src="..//view/pictures/next.png"/>
        </a>
       
        </div>

		<script type="text/javascript" src="..//view/js/jquery.js"></script>
		<script type="text/javascript" src="..//view/js/javas.js"></script>
                
                
