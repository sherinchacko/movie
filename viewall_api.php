<?php
    $r=array();
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="movie";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="SELECT  `moviename`, `actor`, `acttress`, `director`, `camera`, 
    `producer`, `distributer`, `releasedyear` FROM `moviedetails`";
     $result=$connection->query($Sql);
     if($result->num_rows>0)
     {
        while($row=$result->fetch_assoc())
        {
            $r["data"][]=$row;
        }
        echo json_encode($r);
     }
     
?>
