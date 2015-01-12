<?php
if(isset($_POST['addUser']) AND $_POST['addUser']==1)
{
    if(isset($_POST['pseudo']) AND $_POST['pseudo']!='')
    if(isset($_POST['pass']) AND $_POST['pass']!='')
    if(isset($_POST['repass']) AND $_POST['repass']!='')
    if(isset($_POST['mail']) AND $_POST['mail']!='')
        {
            if($_POST['pass']==$_POST['repass'])
            {
                $end=0;
            }
            else
            {
                $end=1;
            }            
        }
        
    else
    {
        $end=2;
    }
}
?>
