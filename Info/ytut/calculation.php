
<?php
session_start();
if( $_SESSION['count']==4)
{
require_once('recaptchalib.php');
$privatekey="6Lerxg0TAAAAAOjn2uS60DHSeu1vnJ2XVCGgwbbm";
//var_dump($_POST);
$resp=recaptcha_check_answer($privatekey,$_POST['REMOTE_ADDR'],$_POST['recaptcha_challenge_field'],$_POST['recaptcha_response_field']);
if(!$resp->is_valid)
{
//var_dump($_POST);
//die("Wrong Captcha");
echo"<script>alert('Wrong Captcha')</script>";
header("location:long.php");
}
else
{
if(!isset($_SESSION['userid'])||(!isset($_SESSION['status'])))
	header('location:index.php');
	
	if($_SESSION['status']==0)
	{	
		header('location:logout.php');
	}


 require "connect.php";
 require "multi_factor_generator.php";
 
 //session_start();
 
 
 
 if(isset($_SESSION['userid']))
 {
	// to check transaction time;	
	/*$str='Post='.$_POST['trantime'].' session time= '.$_SESSION['trantime'].' diff='.$_POST['trantime']-$_SESSION['trantime'];
	//echo 'here'.$str;
echo "Post= ".$_POST['trantime']." ".strtotime($_POST['trantime']);
echo"  last time=".$_SESSION['trantime']." ".strtotime($_SESSION['trantime']) ;*/
//echo "  diffrence= ".(strtotime($_POST['trantime'])-strtotime($_SESSION['trantime']));

	if((strtotime($_POST['trantime'])-strtotime($_SESSION['trantime']))<2)
	{
		echo'<script>alert("ONLY 1 TRANSCATION ALLOWED");window.location.href="long.php";</script>';
		exit;
		//header('Location:long.php');
	}
	//echo "allowed";

 	$currency_pair=$_POST['currency_pair'];
 	$laverage=$_POST['laverage'];
 	$lots=$_POST['lots'];
	//print"her";
	//print $currency_pair;
	//print $laverage;
	//print $lots;
	
	if($lots<1 || $lots>5){ //added by me leverage.
	//die(header("Location:ERROR.php?errors=You have tried to buy illegal no of lots or with illegal leverage.Trying something fishy."));
	print $lots;        
	exit;
        }
 	
	if($laverage<1 || $laverage>400){//added by me leverage.
	die(header('Location:ERROR.php?errors=You have tried to buy illegal no of lots or with illegal leverage.'));
        exit;
        }
	
 	$result =@mysql_query("SELECT * FROM product WHERE product_id = $currency_pair ");
 	$ask_price=@mysql_result($result,0,'ask_price');
	$bid_price=@mysql_result($result,0,'bid_price');
	
	$factor=multi_factor_generator($currency_pair);
	//echo $laverage;
	
  //generating order number;
    $result3=@mysql_query("SELECT order_no from portfolio where  id = '{$_SESSION['userid']}' order by order_no  DESC");
    if(@mysql_num_rows($result3)!=0) 
				{
			$order_no=@mysql_result($result3,0,'order_no')+1;
			//echo $order_no;
				}
     else
	     $order_no=1001;  
 	
	
 	//code for margin
	
	$margin=($ask_price*$lots*$factor)*(100000/$laverage);
	
 
  	$result2 = @mysql_query("SELECT * FROM user WHERE id = '{$_SESSION['userid']}' AND email_id1='{$_SESSION['emailid']}'");
  	$old_margin=@mysql_result($result2,0,'margin'); 
  	$cash_available=@mysql_result($result2,0,'cash_available');
 	$cash_paid=@mysql_result($result2,0,'cash_paid');
 	
 
 	$new_margin=$old_margin+$margin;
 	//checking whether he can deal or not
  	if( ($old_margin+$margin) < ($cash_available))
   	{
		//echo $old_margin+$margin;
		//updating asserts
		if($lots>5&&$laverage>400) //added by me leverage.
		{
		header('location:ERROR.php?errors=Your deal cantain illegal no. of lots or leverage');
		}
		else if($lots<6&&$lots>0)
		{
			$asserts=$cash_paid - $lots*100000*$ask_price*$factor*$laverage/50 + $lots*$bid_price*100000*$factor*$laverage/50; //added by me leverage.
			$result4=@mysql_query("UPDATE  user SET cash_paid ='$asserts' , margin='$new_margin' WHERE id= '{$_SESSION['userid']}'")		
       		or die("Couldnot update");

			$query1="INSERT INTO portfolio (order_no,product_id,id,lots,long_price,laverage,status) VALUES ('$order_no','$currency_pair','{$_SESSION['userid']}','$lots','$ask_price','$laverage',1)";
			
			$q1=mysql_query($query1) ;
			
			$error=mysql_errno($link_id);
			$str=mysql_error($link_id);
			//echo "ahdahd".$str;
			if($error=='00000')
			{ //echo 'sssss';
							
				}			
	else{
		$q="Insert into logs(id,error) values('{$_SESSION['userid']}','$error')";
		mysql_query($q);
		header('location:ERROR.php?errors=Internal Server Error!!!');
	}	
			//echo'<script>alert("'.$query1.'")</script>';
			
		}
		else
		header('location:ERROR.php?errors=You are trying to buy illegal no of lots');
   	} 
	else header('location:ERROR.php?errors=Insufficients cash in hand<a href=long_buy.php>Click here</a> to go back ');
 	// for captcha
	$_SESSION['count']=$_SESSION['count']+1;
	if($_SESSION['count']>4)$_SESSION['count']=0;
	// for incremeting transaction time
	$_SESSION['trantime']=date("H:i:s");
	header('location:portfolio.php');	

}
else
	header('location:index.php');
}
//header('Location:long.php');
}

 /*else if($_POST['chker']==1)
{
	header('Location:portfolio.php');
}*/
else
{
//here u have used lots=1,00,000

if(!isset($_SESSION['userid'])||(!isset($_SESSION['status'])))
	header('location:index.php');
	
	if($_SESSION['status']==0)
	{	
		header('location:logout.php');
	}


 require "connect.php";
 require "multi_factor_generator.php";
 
 //session_start();
 
 
 
 if(isset($_SESSION['userid']))
 {
	// for transction counter	
	/*echo "Post= ".$_POST['trantime']." ".strtotime($_POST['trantime']);
	echo"  last time=".$_SESSION['trantime']." ".strtotime($_SESSION['trantime']) ;*/
	//echo "diffrence=".(strtotime($_POST['trantime'])-strtotime($_SESSION['trantime']));
	if((strtotime($_POST['trantime'])-strtotime($_SESSION['trantime']))<2)
	{
		echo'<script>alert("ONLY 1 TRANSCATION ALLOWED");window.location.href="long.php";</script>';
		exit;
		//header('Location:long.php');
	}
 	$currency_pair=$_POST['currency_pair'];
 	$laverage=$_POST['laverage'];
 	$lots=$_POST['lots'];
	//print"her";
	//print $currency_pair;
	//print $laverage;
	//print $lots;
	
	if($lots<1 || $lots>5){ //added by me leverage.
	//die(header("Location:ERROR.php?errors=You have tried to buy illegal no of lots or with illegal leverage.Trying something fishy."));
	print $lots;        
	exit;
        }
 	
	if($laverage<1 || $laverage>400){//added by me leverage.
	die(header('Location:ERROR.php?errors=You have tried to buy illegal no of lots or with illegal leverage.'));
        exit;
        }
	
 	$result =@mysql_query("SELECT * FROM product WHERE product_id = $currency_pair ");
 	$ask_price=@mysql_result($result,0,'ask_price');
	$bid_price=@mysql_result($result,0,'bid_price');
	
	$factor=multi_factor_generator($currency_pair);
	//echo $laverage;
	
  //generating order number;
    $result3=@mysql_query("SELECT order_no from portfolio where  id = '{$_SESSION['userid']}' order by order_no  DESC");
    if(@mysql_num_rows($result3)!=0) 
				{
			$order_no=@mysql_result($result3,0,'order_no')+1;
			//echo $order_no;
				}
     else
	     $order_no=1001;  
 	
	
 	//code for margin
	
	$margin=($ask_price*$lots*$factor)*(100000/$laverage);
	
 
  	$result2 = @mysql_query("SELECT * FROM user WHERE id = '{$_SESSION['userid']}' AND email_id1='{$_SESSION['emailid']}'");
  	$old_margin=@mysql_result($result2,0,'margin'); 
  	$cash_available=@mysql_result($result2,0,'cash_available');
 	$cash_paid=@mysql_result($result2,0,'cash_paid');
 	
 
 	$new_margin=$old_margin+$margin;
 	//checking whether he can deal or not
  	if( ($old_margin+$margin) < ($cash_available))
   	{
		//echo $old_margin+$margin;
		//updating asserts
		if($lots>5&&$laverage>400) //added by me leverage.
		{
		header('location:ERROR.php?errors=Your deal cantain illegal no. of lots or leverage');
		}
		else if($lots<6&&$lots>0)
		{
			$asserts=$cash_paid - $lots*100000*$ask_price*$factor*$laverage/50 + $lots*$bid_price*100000*$factor*$laverage/50; //added by me leverage.
			$result4=@mysql_query("UPDATE  user SET cash_paid ='$asserts' , margin='$new_margin' WHERE id= '{$_SESSION['userid']}'")		
       		or die("Couldnot update");

			$query1="INSERT INTO portfolio (order_no,product_id,id,lots,long_price,laverage,status) VALUES ('$order_no','$currency_pair','{$_SESSION['userid']}','$lots','$ask_price','$laverage',1)";
			
			$q1=mysql_query($query1) ;
			
			$error=mysql_errno($link_id);
			$str=mysql_error($link_id);
			/*echo "ahdahd".$str;*/
			if($error=='00000')
			{ //echo 'sssss';
							
				}			
	else{
		$q="Insert into logs(id,error) values('{$_SESSION['userid']}','$error')";
		mysql_query($q);
		header('location:ERROR.php?errors=Internal Server Error!!!');
	}	
			//echo'<script>alert("'.$query1.'")</script>';
			
		}
		else
		header('location:ERROR.php?errors=You are trying to buy illegal no of lots');
   	} 
	else header('location:ERROR.php?errors=Insufficients cash in hand<a href=long_buy.php>Click here</a> to go back ');
 	// for captcha
	$_SESSION['count']=$_SESSION['count']+1;
	if($_SESSION['count']>4)$_SESSION['count']=0;
	// for updating last transaction time
	$_SESSION['trantime']=date("H:i:s");
	
	header('location:portfolio.php');	
  
	
}
else
	header('location:index.php');
	
}

?>

