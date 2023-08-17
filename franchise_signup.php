<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>

</head>
<body style="background-color: aliceblue;"> 
        <table cellspacing="3" cellpadding="10"  align="center"  border="0" >
<?php
  $username = $_POST['username'];                                   
  $franchise_id = $_POST['franchise_id'];                                   
  $email = $_POST['email'];                                   
  $password = $_POST['password'];   
  $franchise_name = $_POST['franchise_name'];   
  $budget = $_POST['budget'];   
  $owner = $_POST['owner'];   
  $admin_id = $_POST['admin_id'];   
  $conn = new mysqli('localhost:3307','root','','dbms');
  //Database
  if($conn->connect_error){
      die('Connection Failed : ' .$conn->connect_error);
  }else{
      $stmt=$conn->prepare("insert into franchise_login values(?,?,?,?)");
      $stmt->bind_param("ssss",$franchise_id,$username,$password,$email);
      $stmt->execute();
      $stmt->close();
      $stmt1=$conn->prepare("insert into franchise values(?,?,?,?,?)");
      $stmt1->bind_param("ssiss",$franchise_id,$franchise_name,$budget,$owner,$admin_id);
      $stmt1->execute();
      echo "<center><img src=\"approved.png\" height=\"200\"/></center>";
      echo "<th bgcolor=\"white\"><font size=\"+3\" style=\"font-family: cursive;\" >added to database successfully</font></th>";
      echo "</table>";
      $stmt1->close();
      $conn->close();
  }                             
?>
</table>   
    </body>
</html>
