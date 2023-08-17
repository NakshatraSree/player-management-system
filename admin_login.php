<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <style>
        table{
            color: black;
        }
        th{
            background-color:lightgreen ;
        }
        tr:nth-child(even){background-color: whitesmoke;}
        </style>
    
</head>
<body style="background-color: aliceblue;">
    <table cellspacing="3" cellpadding="10"  align="center"  border="1">
        
            <?php
            $username = $_POST["username"]; 
            $password = $_POST["password"];
            $admin_id = $_POST["admin_id"];
            $email = $_POST["email"];
            $conn = new mysqli('localhost:3307','root','','dbms');
            if($conn->connect_error){
              die('Connection Failed : ' .$conn->connect_error);
           }else{
              $q=$conn->query("select * from admin_login where admin_id='$admin_id' and password='$password' and username='$username' and email='$email'");
              $q1=$q->fetch_assoc();
            if($q1!=0 ) 
            { 
                $sql="select * from all_player";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    echo "<h3>pLAYER dETAILS</h3>";
                    echo "<tr>
                        <th>player_id</th>
                        <th>player_name</th>
                        <th>nature</th>
                        <th>nationality</th>
                        <th>fixed_price</th>
                        <th>age</th>
                        <th>record</th>
                        <th>previous_franchise</th>
                        <th>batting</th>
                        <th>bowling</th>
                        <th>fielding</th>
                        <th>wicket_keeping</th>
                        <th>admin_id</th>
                        <th>retained</th>
            
                        </tr>";
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr><td>".$row["Player_id"]."</td><td>".$row["player_name"]."</td><td>".$row["nature"]."</td><td>".$row["nationality"].
                        "</td><td>".$row["fixed_price"]."</td><td>".$row["age"]."</td><td>".$row["record"]."</td><td>".$row["previous_franchise"].
                        "</td><td>".$row["batting"]."</td><td>".$row["bowling"]."</td><td>".$row["fielding"]."</td><td>".$row["wicket_keeping"].
                        "</td><td>".$row["admin_id"]."</td><td>".$row["retained"]."</td></tr>";
                    }
                }
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
    <table cellspacing="3" cellpadding="10"  align="center"  border="1">
       
            <?php
            $username = $_POST["username"]; 
            $password = $_POST["password"];
            $admin_id = $_POST["admin_id"];
            $email = $_POST["email"];
            $conn = new mysqli('localhost:3307','root','','dbms');
            if($conn->connect_error){
              die('Connection Failed : ' .$conn->connect_error);
           }else{
            $q=$conn->query("select * from admin_login where admin_id='$admin_id' and password='$password' and username='$username' and email='$email'");
            $q1=$q->fetch_assoc();
          if($q1!=0 ) 
            { 
                $sql="select * from franchise";
                $result=$conn->query($sql);
                if($result->num_rows>0){
                    echo "<h3>fRANCHISE dETAILS</h3>";
                    echo  "<tr>
                        <th>franchise_id</th>
                        <th>franchise_name</th>
                        <th>budget</th>
                        <th>owner</th>
                        <th>admin_id</th>
            
                        </tr>";
                    while($row=$result->fetch_assoc()){
                        
                        echo "<tr><td>".$row["Franchise_id"]."</td><td>".$row["franchise_name"]."</td><td>".$row["budget"].
                        "</td><td>".$row["owner"]."</td><td>".$row["admin_id"]."</td></tr>";
                    }
                    echo "</table>";
                }
            }
                $conn->close();
        }
                ?>
    </table>
</body>
</html>