<?php
if(isset($_POST["submit"]))
{
    $Delete=$_POST["submit"];
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="movie";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="DELETE FROM `moviedetails` WHERE `moviename`='$Delete'";
    $result=$connection->query($Sql);
    if($result===TRUE)
    {
         $r["status"]="success";
    }
    else
    {
        $r["status"]="error";
    }
    echo json_encode($r);
}
?>