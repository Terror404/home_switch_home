           <?php 
                if(isset($_POST['login']))
                    {
                        include "../view/co_bloc/co_bloc_loop.php";
                    }
                    ;
           
                if(isset($_SESSION['userLogin']))
                    {
                        $blocConnexion=3;
                    }
                elseif(isset($blocConnexion))
                    {
                        $blocConnexion=$blocConnexion;
                    }
                elseif(isset($_POST['blocConnexion']))
                    {
                        $blocConnexion=$_POST['blocConnexion'];
                    }
                else
                    {
                        $blocConnexion=1;
                    }
                    
                    
                switch ($blocConnexion)
                    {
                        default:
                        case 1:
			include "../view/co_bloc/co_bloc_1.php";
                        break;
                    
                        case 2:
                        include "../view/co_bloc/co_bloc_2.php";
                        break;
                    
                        case 3:
                        include "../view/co_bloc/co_bloc_3.php";                      
			break;			
                    }
                   
            ?>
