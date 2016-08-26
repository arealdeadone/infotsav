<?php
function  margin($ask_price,$lots,$laverage)
{
 	$margin=($ask_price)*($lots)*(100000/$laverage);
	
	return $margin;
}
?>