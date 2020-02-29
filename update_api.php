<?php
if(isset($_POST["Actor"]))
{
    $UpActor=$_POST["Actor"];
    $UpAccttress=$_POST["Accttress"];
    $UpDirector=$_POST["Director"];
    $UpCamera=$_POST["Camera"];
    $UpProducer=$_POST["Producer"];
    $UpDistributer=$_POST["Distributer"];
    $Uprelease=$_POST["Releasedyr"];
    $Upname=$_POST["upsubmit"];
    
    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="movie";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="UPDATE `moviedetails` SET `actor`='$UpActor',`acttress`='$UpAccttress',`director`='$UpDirector',
    `camera`='$UpCamera',`producer`='$UpProducer',`distributer`='$UpDistributer',
    `releasedyear`=$Uprelease WHERE `moviename`='$Upname'";
    $result=$connection->query($Sql);
    if($result===TRUE)
    {
        $r["status"]="success";
    }
    else{
        $r["status"]="error";
    }
    echo json_encode($r);
}
?>