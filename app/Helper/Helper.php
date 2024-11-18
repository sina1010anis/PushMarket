<?php
function ToRilP($price){
    return number_format($price , 0 , '.' , ',');
}

function toRtoS($price)
{
    return str_replace(',','',$price);

}

?>
