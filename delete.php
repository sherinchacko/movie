<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-danger navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item Active">
              <a class="nav-link" href="movie.php">Movie entry</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="search.php">Movie search</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="update.php">Update Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="delete.php">Delete Details</a>
            </li>
          </ul>
    </nav>
    <center>WeLcOmE To DeLeTe PaGe </center>
    <form method="POST">
    <table class="table">
    <tr>
    <td>
    Enter Movie Name:
    </td>
    <td>
    <input type="text" class="form-control" name="getName">
    </td>
    </tr>
    <tr>
    <td>
    </td>
    <td>
    <Button type="submit" class="btn btn-primary" name="getDetails">
    Get Details
    </Button>
    </td>
    </tr>
    </table>
    </form>   
</body>
</html>
<?php
if(isset($_POST["getDetails"]))
{
    $Getname=$_POST["getName"];

    $Servername="localhost";
    $Dbusername="root";
    $Dbpassword="";
    $Dbname="movie";
    $connection=new mysqli($Servername,$Dbusername,$Dbpassword,$Dbname);
    $Sql="SELECT `actor`, `acttress`, `director`, `camera`, `producer`, `distributer`, `releasedyear` FROM `moviedetails` WHERE `moviename`='$Getname'";
    $result=$connection->query($Sql);
    if($result->num_rows>0)
    {
        while($row=$result->fetch_assoc())
        {
            $Actor=$row["actor"];
            $Acctress=$row["acttress"];
            $Director=$row["director"];
            $Camera=$row["camera"];
            $Producer=$row["producer"];
            $Distributer=$row["distributer"];
            $Release=$row["releasedyear"];
            echo"<form method='POST'>
            <table class='table'> <tr> <td> actor </td> <td> $Actor </td> </tr>
            <tr> <td> acttress </td> <td> $Acctress </td> </tr>
            <tr> <td> director </td> <td> $Director </td> </tr>
            <tr> <td> camera </td> <td> $Camera </td> </tr>
            <tr> <td> producer </td> <td> $Producer </td> </tr>
            <tr> <td> distributer </td> <td> $Distributer </td> </tr>
            <tr> <td> releasedyear </td> <td> $Release </td> </tr>
            <tr> <td> </td> <td>
            <button type='submit' class='btn btn-danger' value='$Getname' name='submit'> Delete 
            </button> </td> </tr> </form> </table>";
        }
        
    }
    else{
        echo "invalid";
    }
}
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
        echo "successfully deleted";
    }
    else
    {
        echo $connection->error;
    }
}
?>