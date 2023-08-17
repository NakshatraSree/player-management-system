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
  $player_id = $_POST['player_id'];                                   
  $email = $_POST['email'];                                   
  $password = $_POST['password'];
  $player_name = $_POST['player_name'];
  $nature = $_POST['nature'];
  $nationality = $_POST['nationality'];
  $fixed_price = $_POST['fixed_price'];
  $age= $_POST['age'];
  $record= $_POST['record'];
  $previous_franchise = $_POST['previous_franchise'];
  $batting = $_POST['batting'];
  $bowling = $_POST['bowling'];
  $fielding = $_POST['fielding'];
  $wicket_keeping = $_POST['wicket_keeping'];
  $admin_id = $_POST['admin_id'];
  $retained = $_POST['retained'];
 
  $conn = new mysqli('localhost:3307','root','','dbms');
  //Database
  if($conn->connect_error){
      die('Connection Failed : ' .$conn->connect_error);
  }else{
    $stmt=$conn->prepare("insert into player_login values(?,?,?,?)");
    $stmt->bind_param("ssss",$player_id,$username,$password,$email);
    $stmt->execute();
    $stmt->close();
      $stmt1=$conn->prepare("insert into all_player values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
      $stmt1->bind_param("ssssiissddddss",$player_id,$player_name,$nature,$nationality ,$fixed_price,$age,$record,$previous_franchise,$batting,$bowling,$fielding,$wicket_keeping, $admin_id, $retained);
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
