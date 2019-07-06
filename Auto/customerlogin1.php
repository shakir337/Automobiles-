<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $uname=$_POST["uname"];
        $pass=$_POST["pass"];
        include 'dbcon.php';
         session_start();
      /*  $host="localhost";
        $user="root";
        $password="";
        $db_name="online_examination";
        
        $conn = new mysqli($host, $user, $password,$db_name);*/

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully<br>";
$sql = "SELECT * FROM client where client_id='".$uname. "' && pass='".$pass."'";
//echo $sql;
//echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    
         $_SESSION['cname'] = $uname;
    header("Location:client_panel.php");
    echo 'login Successfully';
    }
    else {
        
         echo '<script>location.href="customerlogin.php";alert("Invalid Username or Passward");</script>';
         
       //header("Location:Student Login.php");
       //echo 'wrong ';
} 
        ?>
    </body>
</html>
