<?php

//Reorder date from FORMULAR to DB 
function reorder_date_1($date,$sep='/')
{
    $array=explode('/',$date);
    if($array[0] > 31 OR $array[0] < 1 OR $array[1] > 12 OR $array[1] < 1 OR $array[2] > 2999 OR $array[2] < 1)
    {
        return false;
    }
    else
    {
        global$newDate;
        $newDate=$array[2].'-'.$array[1].'-'.$array[0];
        return $newDate;
    }
}

//Reorder date from DB to FORMULAR
function reorder_date_2($date,$sep='/')
{
    $array=explode('-',$date);
    if($array[2] > 31 OR $array[2] < 1 OR $array[1] > 12 OR $array[1] < 1 OR $array[0] > 2999 OR $array[0] < 1)
    {
        return false;
    }
    else
    {
        $newDate=$array[2].'/'.$array[1].'/'.$array[0];
        return $newDate;
    }
}

//??
function verif_date($date, $sep='/')
{
	if(!list($day,$month,$year) = explode($sep,$date))
        {
            return false;
        }
 
	if($day > 31 OR $day < 1 OR $month > 12 OR $month < 1 OR $year > 2999 OR $year < 1)
        {
            return false;
        }
 
	return checkdate($month, $day, $year);
}
