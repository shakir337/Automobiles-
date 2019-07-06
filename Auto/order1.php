<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $cname=$_SESSION["cname"];
        $sp_part=$_POST["sp_part"];
        $quantity=$_POST["quantity"];
        
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT sp_id FROM sp_part where sp_name='$sp_part'";
         $result = $conn->query($sql);
         $row = $result->fetch_assoc();
         $sp_id=$row["sp_id"];
         $status="waiting";
        $sql=$conn->prepare("INSERT INTO cust_req(sp_id,quantity,status,client_id) VALUES (?,?,?,?)");
        $sql->bind_param("iiss",$sp_id,$quantity,$status,$cname);
        
        if ($sql->execute()) {
            $sql1 = "SELECT req_id FROM cust_req ORDER BY req_id DESC LIMIT 1;";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $req_id= $row["req_id"];


            echo '<script>location.href="client_panel.php";alert("Request ID:'.$req_id.'");</script>';
   // it worked
} else {
   echo '<script>location.href="client_panel.php";alert(" Not Available ");</script>';
}

        ?>
    </body>
</html>
