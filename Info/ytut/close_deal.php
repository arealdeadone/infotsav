<?php
    //This code is required whenever an user closes a deal
	require"connect.php";

    session_start();
	
	$result =@mysql_query("select lots from portfolio where id='{$_SESSION['userid']}'AND order_no=$order_no");
	$lots=@mysql_result($result,0,'lots');
	if($lots_selected>0 && $lots_selected<6 &&$lots_selected<=$lots)
    {
	 	$result =@mysql_query("select bid_price from product where product_id=$product_id"); 
	 	$bid_price=@mysql_result($result,0,'bid_price');	
		
	      
     }
?>
