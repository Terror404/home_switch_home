<meta charset="utf-8">
<div id="carrousel">
	<link rel="stylesheet" type="text/css" href="../view/css/style_caroussel.css">
    <ul>
    	<center>
            <font class="texte" size=6 color=white> 
            <?php if (isset($_SESSION['userLogin']))
                            {
                                echo $_SESSION['slogan']; 
                            }
                            else 
                            {
                                echo 'LEURS MAISONS, VOS VACANCES';
                            }
                            ?> 
            </font>
        </center>
        <li><img class="img" src="http://eurowin-stats.com/media/maison%20BCBG.jpg" style='width:1800px ;height:1000px' /></li>
    <li><img class="img" src="http://eurowin-stats.com/media/maison%20geek%201.jpg" style='width:1800px ;height:1000px' /></li>
    <li><img class="img" src="http://eurowin-stats.com/media/maison%20futuriste.jpg" style='width:1800px ;height:1000px' /></li>
    <li><img class="img" src="http://eurowin-stats.com/media/maison%20bonheur.jpg" style='width:1800px ;height:1000px' /></li>
    </ul>
    		<div id="searchbar">
                	<form class="formHome" action="content.php?page=searchKeyWords" method="post">
               		<input type="text" name="keyWords" placeholder="PARTIR A LA DECOUVERTE" class="placeholderHome" />
                     <input type="submit" value="GO" /> 
                    </form>
            </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
 <script type="text/javascript" src="../view/caroussel.js"></script>