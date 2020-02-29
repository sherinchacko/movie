<?php
  $r=array();
if(isset($_POST["getName"]))
{
  $Movie=$_POST["getName"];
  $Servername="localhost";
  $Dbusername="root";
  $Dbpassword="";
  $Dbname="movie";
  $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
  $Sql="SELECT `actor`, `acttress`, `director`, `camera`, `producer`,
   `distributer`, `releasedyear` FROM `moviedetails` WHERE `moviename`='$Movie'";
  $result=$connection->query($Sql);
  if($result->num_rows>0)
  {
    while($row=$result->fetch_assoc())
    {
      $r["data"][]=$row;
    }
    echo json_encode($r);
  }
    else{
      echo "athividillalo machampi";
    }
}
?>