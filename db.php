<?php
   
error_reporting(E_ALL ^ E_DEPRECATED);
    $link=mysql_connect('176.67.172.45','root','root');
    if(!$link) echo "数据库连接失败!<br>".mysql_error();
    else echo "数据库连接成功!<br>";
    mysql_close();
   
?>
