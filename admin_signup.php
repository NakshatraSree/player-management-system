<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
    </style>
</head>
<body style="background-color: aliceblue;"> 
        <table cellspacing="3" cellpadding="10"  align="center"  border="0" >
            <?php
                $username = $_POST['username'];                                   
                $admin_id = $_POST['admin_id'];                                   
                $email = $_POST['email'];                                   
                $password = $_POST['password'];   
                $conn = new mysqli('localhost:3307','root','','dbms');
                //Database
                if($conn->connect_error){
                    die('Connection Failed : ' .$conn->connect_error);
                }else{
                    $stmt=$conn->prepare("insert into admin_login values(?,?,?,?)");
                    $stmt->bind_param("ssss",$admin_id,$username,$password,$email);
                    $stmt->execute();
                    $stmt->close();
                    $stmt1=$conn->prepare("insert into admin values(?)");
                    $stmt1->bind_param("s",$admin_id);
                    $stmt1->execute();
                    $stmt1->close();
                    echo "<center><img src=\"approved.png\" height=\"200\"/></center>";
                    echo "<th bgcolor=\"white\"><font size=\"+3\" style=\"font-family: cursive;\" >added to database successfully</font></th>";
                    echo "</table>";
                    $conn->close();
                         }                             
?>
        </table>   
    </body>
</html>
