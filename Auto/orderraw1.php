<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $mname=$_SESSION["mname"];
        $m_name=$_POST["m_name"];
        $quantity=$_POST["quantity"];
        
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT m_id FROM material where m_name='$m_name'";
         $result = $conn->query($sql);
         $row = $result->fetch_assoc();
         $m_id=$row["m_id"];
         $status="waiting";
        $sql=$conn->prepare("INSERT INTO material_req(m_id,quantity,status) VALUES (?,?,?)");
        $sql->bind_param("iis",$m_id,$quantity,$status);
        
        if ($sql->execute()) {
            $sql1 = "SELECT req_id FROM material_req ORDER BY req_id DESC LIMIT 1;";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $req_id= $row["req_id"];


            echo '<script>location.href="manager_panel.php";alert("Request ID:'.$req_id.'");</script>';
   // it worked
} else {
   echo '<script>location.href="manager_panel.php";alert(" Something Went Wrong ");</script>';
}

        ?>
    </body>
</html>
