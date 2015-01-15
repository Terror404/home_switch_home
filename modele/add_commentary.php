<?php
if(isset($_POST['add']) AND $_POST['add']==1)
    
{
    if(isset($_POST['type']) AND $_POST['type']==0)
    {
        if(isset($_POST['titleH']) AND !empty($_POST['titleH'])
                AND isset($_POST['titleU']) AND !empty($_POST['titleU'])
                AND isset($_POST['commentaryU']) AND !empty($_POST['commentaryU'])
                AND isset($_POST['commentaryH']) AND !empty($_POST['commentaryH'])
                AND isset($_POST['rateU']) AND !empty($_POST['rateU'])
                AND isset($_POST['rateH']) AND !empty($_POST['rateH']))
        {
            if(ctype_digit($_POST['rateU']) AND ctype_digit($_POST['rateH']))
            {
                if($_POST['rateU']>=0 AND $_POST['rateU']<11 AND $_POST['rateH']>=0 AND $_POST['rateH']<11)
                {
                    $idExchange=$_POST['idExch'];
                    $idUser1=$_SESSION['userId'];
                    $idUser2=$_POST['idUser2'];
                    $idHouse1=$_POST['idHouse1'];
                    $idHouse2=$_POST['idHouse2'];
                    $titleCHouse=$_POST['titleH'];
                    $titleCUser=$_POST['titleU'];
                    $comUser=$_POST['commentaryU'];
                    $comHouse=$_POST['commentaryH'];
                    $rateUser=$_POST['rateU'];
                    $rateHouse=$_POST['rateH'];
                    $finished=1;
                    $date=date('y-m-d');

                    $addComH=$DB->prepare('INSERT INTO comment_house (id_author,id_target,title,text,rating,date) VALUES(:idauthor,:idtarget,:title,:text,:rating,:date)');
                        $addComH->execute(array('idauthor'=>$idUser1,'idtarget'=>$idHouse2,'title'=>$titleCHouse,'text'=>$comHouse,'rating'=>$rateHouse,'date'=>$date));

                    $addComU=$DB->prepare('INSERT INTO comment_user (id_author,id_target,title,text,rating,date) VALUES(:idauthor,:idtarget,:title,:text,:rating,:date)');
                        $addComU->execute(array('idauthor'=>$idUser1,'idtarget'=>$idUser2,'title'=>$titleCUser,'text'=>$comUser,'rating'=>$rateUser,'date'=>$date));

                    $upFinished=$DB->prepare('UPDATE exchange SET finished_1=1 WHERE id=:idexchange');
                        $upFinished->execute(array('idexchange'=>$idExchange));
                    
                    

                    $end=0;
                }
                else
                {
                    $end=3;
                }
            }
            else
            {
                $end=2;
            }
        }
        else
        {
            $end=1;
        }
    }
    elseif(isset($_POST['type']) AND $_POST['type']==1)
    {
        if(isset($_POST['titleH']) AND !empty($_POST['titleH'])
                AND isset($_POST['titleU']) AND !empty($_POST['titleU'])
                AND isset($_POST['commentaryU']) AND !empty($_POST['commentaryU'])
                AND isset($_POST['commentaryH']) AND !empty($_POST['commentaryH'])
                AND isset($_POST['rateU']) AND !empty($_POST['rateU'])
                AND isset($_POST['rateH']) AND !empty($_POST['rateH']))
        {
            if(ctype_digit($_POST['rateU']) AND ctype_digit($_POST['rateH']))
            {
                if($_POST['rateU']>=0 AND $_POST['rateU']<11 AND $_POST['rateH']>=0 AND $_POST['rateH']<11)
                {
                    $idExchange=$_POST['idExch'];
                    $idUser2=$_SESSION['userId'];
                    $idUser1=$_POST['idUser2'];
                    $idHouse2=$_POST['idHouse1'];
                    $idHouse1=$_POST['idHouse2'];
                    $titleCHouse=$_POST['titleH'];
                    $titleCUser=$_POST['titleU'];
                    $comUser=$_POST['commentaryU'];
                    $comHouse=$_POST['commentaryH'];
                    $rateUser=$_POST['rateU'];
                    $rateHouse=$_POST['rateH'];
                    $finished=1;
                    $date=date('y-m-d');

                    $addComH=$DB->prepare('INSERT INTO comment_house (id_author,id_target,title,text,rating,date) VALUES(:idauthor,:idtarget,:title,:text,:rating,:date)');
                        $addComH->execute(array('idauthor'=>$idUser1,'idtarget'=>$idHouse2,'title'=>$titleCHouse,'text'=>$comHouse,'rating'=>$rateHouse,'date'=>$date));

                    $addComU=$DB->prepare('INSERT INTO comment_user (id_author,id_target,title,text,rating,date) VALUES(:idauthor,:idtarget,:title,:text,:rating,:date)');
                        $addComU->execute(array('idauthor'=>$idUser2,'idtarget'=>$idUser1,'title'=>$titleCUser,'text'=>$comUser,'rating'=>$rateUser,'date'=>$date));

                    $upFinished=$DB->prepare('UPDATE exchange SET finished_2=1 WHERE id=:idexchange');
                        $upFinished->execute(array('idexchange'=>$idExchange));

                    $end=0;
                }
                else
                {
                    $end=3;
                }
            }
            else
            {
                $end=2;
            }
        }
        else
        {
            $end=1;
        }
    }
}