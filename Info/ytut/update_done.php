<?php
session_start();
if($_SESSION['update']){?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>$TOCK $UTRA - INFOTSAV '07 - Update Done</title>
<meta http-equiv="refresh" content="60;url=file:///C|/Documents%20and%20Settings/Subhash.INVENTION/My%20Documents/stocksutra/update_done.php">
<style type="text/css">
<!--
body {
	background-color: #eeeeee;
}
-->
</style></head>

<body text="#000000" link="#000000">

<?php 
require("connect.php");
@odbc_autocommit($connect,false);
$time=@mysql_fetch_row(mysql_query("select current_time()"));
if(!($time[0]>'10:00:00' AND $time[0]<'16:00:00'))
{

for($inc=1;$inc<3;$inc++){
if($inc==1)
{$fp=fopen("http://webcharts.fxserver.com/pairs/index.php","r");
$fp1=fopen("http://webcharts.fxserver.com/pairs/index.php","r");
}
else{
$fp=fopen("http://webcharts.fxserver.com/pairs/index.php","r");
$fp1=fopen("http://webcharts.fxserver.com/pairs/index.php","r");
}


if($fp)
{
$g=0;
while(!feof($fp))
  {
$temp='no';
$end=0;
$char=fread($fp,1);
			  while(!(strstr($char,'<tr>')) && (!feof($fp))) 
                                   {
									 $char.=fread($fp,1);
								   }
								
	while(strstr($temp,'no')&& !($end) && (!feof($fp)))//end is used if it reached the end of the row and temp var used 
	                                            //whether it had found the comp name in row
	  {								
									
									  while(($char=fgetc($fp))!= ">" && (!feof($fp))&& !($end=strstr($back,'</tr>')))
									  {
									  $back.=$char;
									  }
									  $char=fgetc($fp);

				if(ereg("[A-Z]",$char,$trashed))
		{
		                      
							   while((($t=fgetc($fp))!= "<") && (!feof($fp)) ) 
                                    {
									 $char.=$t;
									}

									if((ereg("^[A-Z\-]+0*[&amp;]*[A-Z\-]*$",$char,$trashed))&&($char!="LTP"))
					{		
					          $g=$g+1;                
									
					                 $temp='yes';
					  for($count=0;$count<5;$count=$count+1){
					  $temp1='no';
	   				  while(strstr($temp1,'no') && (!feof($fp)))//temp1 is used to know whether it found number in the row.
	                  {		
					                 while(($num=fgetc($fp))!= ">" && (!feof($fp)) );					   
 							 $num=fgetc($fp);
							   if((ereg("[0-9]",$num,$trashed)))
							         {
									  while((($t=fgetc($fp))!= "<") && (!feof($fp)) ) 
                                                        {
									                         $num.=$t;
									                    $temp1='yes';
														}
								     }
		                }
						         
						}		
								
				   $a="select * from shareprice where companyname='$char'";                   
		   if(($b=mysql_query($a)))
		                      {
                               $row=mysql_fetch_row($b);		   
		                             {
									 						$query="UPDATE shareprice SET shareprice=$num WHERE companyname='$char'"; 
									 mysql_query($query);
									 }
		                     }
				  }   
			            $x='</tr>';
							 while(!(strstr($char,$x)) && (!feof($fp)) && !($end)) 
                                     {
									$t=fread($fp,1);
									$char.=$t;
									}
			
			}	  		   
		 $char='';
		}			
	  $back='';								  
   }
}

else 
echo "the file couldnt be opened";
fclose($fp);
echo "SHAREPRICE UPDATION OVER<br>";


$time1=mysql_fetch_row(mysql_query("select current_time()"));
if(!($time1[0]>'10:00:00' AND $time1[0]<'11:00:00'))
{

if($fp1)
{
$g=0;
while(!feof($fp1))
  {
$temp='no';
$end=0;
$char=fread($fp1,1);
			  while(!(strstr($char,'<tr>')) && (!feof($fp1))) 
                                   {
									 $char.=fread($fp1,1);
								   }
								
	while(strstr($temp,'no')&& !($end) && (!feof($fp1)))//end is used if it reached the end of the row and temp var used 
	                                            //whether it had found the comp name in row
	  {								
									
									  while(($char=fgetc($fp1))!= ">" && (!feof($fp1))&& !($end=strstr($back,'</tr>')))
									  {
									  $back.=$char;
									  }
									  $char=fgetc($fp1);

				if(ereg("[A-Z]",$char,$trashed))
		{
		                      
							   while((($t=fgetc($fp1))!= "<") && (!feof($fp1)) ) 
                                    {
									 $char.=$t;
									}

									if((ereg("^[A-Z\-]+0*[&amp;]*[A-Z\-]*$",$char,$trashed))&&($char!="LTP"))
					{		
					          $g=$g+1;                
									
					                 $temp='yes';
					  for($count=0;$count<4;$count=$count+1){
					  $temp1='no';
	   				  while(strstr($temp1,'no') && (!feof($fp1)))//temp1 is used to know whether it found number in the row.
	                  {		
					                 while(($num=fgetc($fp1))!= ">" && (!feof($fp1)) );					   
 							 $num=fgetc($fp1);
							   if((ereg("[0-9]",$num,$trashed)))
							         {
									  while((($t=fgetc($fp1))!= "<") && (!feof($fp1)) ) 
                                                        {
									                         $num.=$t;
									                    $temp1='yes';
														}
								     }
		                }
						         
						}		
								
				   $a="select * from shareprice where companyname='$char'";                   
		   if(($b=mysql_query($a)))
		                      {
                               $row=mysql_fetch_row($b);		   
		                             {
									 						$query="UPDATE shareprice SET previousclose=$num WHERE companyname='$char'"; 
									 mysql_query($query);
									 }
		                     }
				  }   
			            $x='</tr>';
							 while(!(strstr($char,$x)) && (!feof($fp1)) && !($end)) 
                                     {
									$t=fread($fp1,1);
									$char.=$t;
									}
			
			}	  		   
		 $char='';
		}			
	  $back='';								  
   }
}

else 
echo "the file couldnt be opened";
fclose($fp1);
echo "PREVIOUS CLOSE UPDATION OVER<br>";
}
}
}
else
echo "time over for database updation<br>";


$q="SELECT * FROM bid";
$r=mysql_query($q);
while($data=mysql_fetch_row($r))
{
  if($data[3]==2)
  {
   $query="SELECT shareprice FROM shareprice WHERE companyid='$data[1]'";
   $r1=mysql_query($query);
   $data1=mysql_fetch_row($r1);
   if($data[6] >= $data1[0])
     {
	 $a=mysql_fetch_row(mysql_query("select now()"));
     $y=$a[0];
      $query="INSERT INTO userportfolio (userid,companyid,companyshares,bs,reason,datestamp,tprice)  VALUES('$data[0]','$data[1]','$data[2]',0,'$data[5]','$y','$data1[0]')";
     mysql_query($query);
     $query="SELECT amount FROM registration WHERE teamname='$data[0]'";
     $result=mysql_query($query);
     $data3=mysql_fetch_row($result);
     $amount=$data3[0];
     $sum=$data[2]*$data1[0];
     $amount=$amount-$sum-$sum*.001;
     $query="UPDATE registration SET amount='$amount' WHERE teamname='$data[0]'";
      mysql_query($query);
	  mysql_query("DELETE FROM bid WHERE userid='$data[0]' AND companyid='$data[1]' AND companyshares='$data[2]' AND bs='$data[3]' AND datestamp='$data[4]' AND reason='$data[5]' AND bidprice='$data[6]'");
	  
     }
   }
 else if($data[3]==3)
  {
    $query="SELECT shareprice FROM shareprice WHERE companyid='$data[1]'";
  $r1=mysql_query($query);
  $data1=mysql_fetch_row($r1);
   if($data[6] <= $data1[0])
     {
	 $a=mysql_fetch_row(mysql_query("select now()"));
     $y=$a[0];
     $query="INSERT INTO userportfolio (userid,companyid,companyshares,bs,reason,datestamp,tprice) VALUES('$data[0]','$data[1]','$data[2]',1,'$data[5]','$y','$data1[0]')";
mysql_query($query);
$query="SELECT amount FROM registration WHERE teamname='$data[0]'";
$result=mysql_query($query);
$data3=mysql_fetch_row($result);
$amount=$data3[0];
 $sum=$data[2]*$data1[0];
 $amount=$amount+$sum-$sum*.001;
$query="UPDATE registration SET amount='$amount' WHERE teamname='$data[0]'";
mysql_query($query);
	  mysql_query("DELETE FROM bid WHERE userid='$data[0]' AND companyid='$data[1]' AND companyshares='$data[2]' AND bs='$data[3]' AND datestamp='$data[4]' AND reason='$data[5]' AND bidprice='$data[6]'");
}
}
}
echo "end of file";
@odbc_commit($connect);
}

else
header("location:update.php");
?>
