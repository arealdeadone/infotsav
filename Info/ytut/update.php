<?php

require"connect.php";

//@odbc_autocommit($connect,false);

//while(1)
//{
//$time=mysql_fetch_row(mysql_query("select current_time()"));
//if(1)//!($time[0]>'10:00:00' AND $time[0]<'16:00:00'))
//{
//$fp2=fopen("http://webcharts.fxserver.com/pairs/index.php","r");

$fp2=fopen("link1.txt","r");
$fp1=fopen("link.txt","w");
print_r(feof($fp2));


while(!feof($fp2))
  {

 $str=fgets($fp2). "<br />";
  fputs($fp1,$str,40000);
  }
fclose($fp2);
fclose($fp1);
//print "nn";
//NOW WRITING INTO DATABASE
$fp=fopen("link.txt","r");
if(!$fp)
 print "The specified file could not be opened";
$posflag=0;
$negflag=0;
$money="";
$bid_price="";
$ask_price="";
$temp="";
$len=0;
$ch="a";
$count=1;
$x=0;
while(!feof($fp))
{
  $ch=fgetc($fp);
  if(($posflag ==0 && $ch=="p")||($posflag ==1 && $ch=="o") || ($posflag ==2 && $ch=="s"))
   $posflag++;    
  else if(($negflag ==0 && $ch=="n")||($negflag ==1 && $ch=="e") || ($negflag ==2 && $ch=="g"))
   $negflag++;
  else if($negflag==3 && $ch=="'")
	$negflag++;
  else if($negflag==4 && $ch==">")
	$negflag++;
  else if($posflag==3 && $ch=="'")
	$posflag++;
  else if($posflag==4 && $ch==">")
	$posflag++;
  else if($posflag==5 || $negflag ==5)
	{
      if($ch!="<")
		  $money=$money.$ch;
	  else
		{
          $len=strlen($money);
		  if($money[$len-1]!='%')
			{
			  $count1=0;
			  
		      for($i=0;$money[$i]!='/';$i++)
			  {
			  print "bb";
               $bid_price=$bid_price.$money[$i];
			   if($count1>0 || $money[$i]=='.')
			    $count1++;
			  }
              $i++;
            //  $len=strlen($money);
              for(;$i<$len;$i++)
              $temp=$temp.$money[$i];
			  $templen=strlen($temp);
			  $count1=$count1-$templen-1;
              $x=strlen($bid_price)-$templen;
              for($i=0;$i<$x;$i++)
              $ask_price=$ask_price.$bid_price[$i];
              for($i=0;$i<$templen;$i++)
              $ask_price=$ask_price.$temp[$i];
			  $bid_temp=0+ $bid_price;
			  $ask_temp=0+$ask_price;
		//	  echo $ask_price;
			 if($bid_temp>$ask_temp)
			 {
			   $addask="";
			   if($count1==0)
			   $addask="1";
			   else
			   {
			     $addask=$addask.".";
			     for(;$count1>1;$count1--)
			     $addask=$addask."0";
			     $addask=$addask."1";
			   }	
			    $ask_temp=$ask_temp+(0+$addask);			
			 }
			 print "sfddfgdf";
			  $query="UPDATE product SET bid_price='$bid_temp', ask_price='$ask_temp' WHERE	product_id='$count'";
			  mysql_query($query) or die("dssa");
		      $count++;
		  	  $bid_price="";
              $ask_price="";
			  $temp="";
			}
		  $money="";
		  $posflag=0;
	      $negflag=0;
		}
	}
  else
	{
	  $posflag=0;
	  $negflag=0;
	}
  	
 }
fclose($fp);
//}

?>
