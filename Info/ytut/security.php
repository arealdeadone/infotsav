<?php
function escape_for_mysql($data)
{
        // if magic_quotes_gpc is on, strip the slashes it added
        if(get_magic_quotes_gpc())
        {
                $data = stripslashes($data);
        }
        return @mysql_real_escape_string($data);
}
?>