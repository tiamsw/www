<?php
$conn=mysql_connect("109.123.92.158","root","root");
       if($conn){
         echo "连接mysql数据库成功";
       }else{
          echo "连接数据库失败";
       }



?>
