<html>
<div align="center" style="background-color: #33FF66;">
     <?php
    
     $hostName = "host";
     $user="root";
     $pass="";
     $dbName="name" ;
     $connect=mysqli_connect($hostName,$user,$pass,$dbName) 
                or die("ไม่สามารถเชื่อมต่อได้") ;
                echo"เชื่อมต่อสำเร็จ";  
     mysqli_set_charset($connect,'utf8');   //set ภาษาไทย
     
     ?>
</div>
</html>
