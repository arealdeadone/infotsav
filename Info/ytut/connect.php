<?php
$link_id=@mysql_connect("localhost","root","bcmc3414");
if(!$link_id)
echo "error".@mysql_error();
else
{
$db=@mysql_select_db("forex",$link_id);
if(!$db)
echo "error 1".@mysql_error();
}
?>
