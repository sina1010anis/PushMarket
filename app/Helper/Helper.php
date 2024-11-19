<?php
function ToRilP($price){
    return number_format($price , 0 , '.' , ',');
}

function toRtoS($price)
{
    return str_replace(',','',$price);

}

function editDate($date)
{

    return substr($date, 0, 4).'-'.substr($date, 5, 2).'-'.substr($date, 8, 2);

}

?>
