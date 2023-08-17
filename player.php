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
            $username = $_POST["username"]; 
            $password = $_POST["password"];
            $player_id = $_POST["player_id"];
            $email = $_POST["email"];
            $conn = new mysqli('localhost:3307','root','','dbms');
            if($conn->connect_error){
              die('Connection Failed : ' .$conn->connect_error);
           }else{
              $q=$conn->query("select * from player_login where player_id='$player_id' and password='$password' and username='$username' and email='$email'");
              $q1=$q->fetch_assoc();
            if($q1!=0 ) 
            { 
              echo "<center><img src=\"welcome.jpg\" height=\"200\"/></center>";
              echo "<th bgcolor=\"white\"><font size=\"+3\" style=\"font-family: cursive;\" ><h3>Welcome</h3></font></th>";
              echo "</table>";
            }
            else{
              echo "<center><img src=\"error.png\" height=\"100\"/></center>";
                echo "<th bgcolor=\"white\"><font size=\"+3\" style=\"font-family: cursive;\" >Invalid credentials!!</font></th>";
                echo "</table>";
            }
                $conn->close();
            }
?>
</table>   
    </body>
</html>
