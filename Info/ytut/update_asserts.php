<?php
// here a lot contain 100000 units//
require"connect.php";

session_start();
if(!isset($_SESSION['userid'])||(!isset($_SESSION['status']))
	header('location:index.htm');
	
	if($_SESSION['status']==0)
	{	
		header('location:logout.php');
	}

//checking whether session exists or not//
if(isset($_SESSION['userid']))
{
	$query="SELECT * FROM  portfolio WHERE id='1001' order by order_no";//'{$_SESSION['userid']}' AND status=1";
	$result=mysql_query($query);
	$no_of_rows=mysql_num_rows($result);
	$total_deals_arr;
	$product_id_arr;
	$bid_price_arr;
	$traded_price_arr;
	$lots_arr;
	$i=0;
	while($row=mysql_fetch_array($result))
	{ 
		extract($row);
		$x=mysql_query("select * from product where product_id=$product_id") ;
		$ask_price =mysql_result($x,0,'ask_price');
		$assert=$ask_price*$lots*100000;
		$total_deals_arr[$i]=$assert;
		$bid_price =mysql_result($x,0,'bid_price');
		$bid_price_arr[$i]=$bid_price;
		$lots_arr[$i]=$lots;
		$product_id_arr[$i]=$product_id;
		$i++;	
	}
	
	
	for ($i=0;i<$no_of_rows;$i++)
	{
		
	}
	
   	
	
	
	
}
else  echo "nonono";
?>