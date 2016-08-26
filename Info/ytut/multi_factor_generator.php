<?php 
require"connect.php";
function multi_factor_generator($product_id)
{
	//usd
	if($product_id==1||$product_id==2||$product_id==9||$product_id==10)
	return 1;
	//gbp
	else if ($product_id==16)
	{
		$result=@mysql_query("SELECT bid_price FROM product WHERE product_id='$product_id'");
		return  (@mysql_result($result,0,'bid_price') );
	}
	//CHF
	else if ($product_id==5||$product_id==8||$product_id==12)
	{
		$result=@mysql_query("SELECT bid_price FROM product WHERE product_id='$product_id'");
		return  (1/(@mysql_result($result,0,'bid_price')) );
	}
	//CAD
	else if ($product_id==6||$product_id==18||$product_id==19)
	{
		$result=@mysql_query("SELECT bid_price FROM product WHERE product_id='$product_id'");
		return  (1/(@mysql_result($result,0,'bid_price')) );
	}
	//AUD
	else if ($product_id==13)
	{
		$result=@mysql_query("SELECT bid_price FROM product WHERE product_id='$product_id'");
		return  (@mysql_result($result,0,'bid_price') );
	}
	//JPY
	else if ($product_id==3||$product_id==4||$product_id==7||$product_id==11|$product_id==14||$product_id==15||$product_id==17)
	{
		$result=@mysql_query("SELECT bid_price FROM product WHERE product_id='$product_id'");
		return  (1/(@mysql_result($result,0,'bid_price') ));
	}
	
}

 ?>
