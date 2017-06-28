<html>
<div align="center" style="background-color: #33FF66;">
     <?php
    
     $hostName = "us-cdbr-azure-west-b.cleardb.com";
     $user="bf8b0efb6c1b5b";
     $pass="325bfa78";
     $dbName="name" ;
     $connect=mysqli_connect($hostName,$user,$pass,$dbName) 
                or die("ไม่สามารถเชื่อมต่อได้") ;
                echo"เชื่อมต่อสำเร็จ";  
     mysqli_set_charset($connect,'utf8');   //set ภาษาไทย
     
     ?>
</div>
</html>
