<?php

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
