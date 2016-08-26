<?php 
//header('location:logout.php');
 if(!isset($_SESSION['userid'])||(!isset($_SESSION['status'])))
	header('location:index.php');
	
	if($_SESSION['status']==0)
	{	
		header('location:logout.php');
	}
 require "connect.php";
 require "multi_factor_generator.php";
 session_start();
 $order_No=$_POST['order_No'];
header("location:ERROR.php?errors=You donnt have any deal to short.<a href=portfolio.php>Click here</a> to go back ");
 print_r($order_No);
 $lotsarray=array();
 foreach($order_No as $key=>$value)
 {
 	//echo $key."=>".$value."<br>";
	 $order_no[$key]=$value;
 	//echo $_POST[$value]."----<br>";
 	$lotsvalue=$_POST[$value];
 	$lotsarray[$value]=$lotsvalue;
 
 	$order_no=$value;
 
	$lotsselected=$lotsvalue;
 	if(isset($_SESSION['userid']))
 		{	if($order_no=='')
 		header('Location:ERROR.php?errors=You donnt have any deal to short.<a href=portfolio.php>Click here</a> to go back');
  	$result=mysql_query("SELECT * FROM portfolio WHERE  id='{$_SESSION['userid']}'  AND order_no='$order_no'") or die("Query Unsuccessful");
	$lots=mysql_result($result,0,'lots');
	$long_price=mysql_result($result,0,'long_price');
	$product_id=mysql_result($result,0,'product_id');
	$factor=multi_factor_generator($product_id);
	$laverage=mysql_result($result,0,'laverage');
	
	if( ($lotsselected>=1) && ($lotsselected<=$lots ))
	{
		$result1=mysql_query("SELECT * from user WHERE id='{$_SESSION['userid']}'");
		$cash_paid=mysql_result($result1,0,'cash_paid');
		$cash_available=mysql_result($result1,0,'cash_available');
		$margin=mysql_result($result1,0,'margin');
		$result2=mysql_query("SELECT bid_price from product WHERE product_id='$product_id'");
		$margin=$margin-($long_price*$lotsselected*$factor)*(100000/$laverage);
		$bid_price=mysql_result($result2,0,'bid_price');
		
		$cash_available=$cash_available+ ($bid_price-$long_price)*$factor*$lotsselected*100000*($laverage/50);
		$x=$lots-$lotsselected;
		
		
		echo $cash_available; 
	
		
	
		
		$result12=mysql_query("UPDATE user SET cash_paid='$asserts29',cash_available='$cash_available', margin='$margin' WHERE  id='{$_SESSION['userid']}' ") or die("cannt update");
		
		
		if($x==0)
		$result3=mysql_query("UPDATE portfolio SET status =0,lots='$x' WHERE  id='{$_SESSION['userid']}'  AND order_no='$order_no'") or die("cannt update");
		else
		$result3=mysql_query("UPDATE portfolio SET lots='$x' WHERE  id='{$_SESSION['userid']}'  AND order_no='$order_no'") or die("Cannt update");
		header('location:portfolio.php');
		
		$resultMax=mysql_query("SELECT max(transaction_no) AS t_id FROM short");
		$resRow=mysql_fetch_array($resultMax);
		$t_id=$resRow[t_id]+1;
		//echo $t_id."------";
		$date=date("Y:m:d H:i:s");
		$res=mysql_query("INSERT INTO short(transaction_no,order_no,lots,short_price,short_comment,id,short_time) VALUES('$t_id','$order_no','$lotsselected','$bid_price','No','{$_SESSION['userid']}','$date')",$link_id);
		
		
	}
	
	else
	{
	$error="You have insufficient lots in this deal!!!!";
	header('location:ERROR.php?errors=You have typed inappropriate lots in this deal!!!! Click here to go back <a href=short.php>Back</a>');
	}
 }
 else
  header('location:index.php');
  
  }
  
  ?>
