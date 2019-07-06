<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $mname=$_SESSION["mname"];
        $supp_id=$_POST["supp_id"];
        $c_name=$_POST["c_name"];
        $pass=$_POST["pass"];
        $c_no=$_POST["c_no"];
        $m_name=$_POST["m_name"];

        $price=$_POST["price"];
       
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
         
        $sql=$conn->prepare("INSERT INTO supplier(supp_id,c_name,pass,c_no) VALUES (?,?,?,?)");
        $sql->bind_param("sssi",$supp_id,$c_name,$pass,$c_no);
        $sql->execute();
        $sql=$conn->prepare("INSERT INTO material(m_name,price,supp_id) VALUES (?,?,?)");
        $sql->bind_param("sis",$m_name,$price,$supp_id);
        
        
        if ($sql->execute()) {
            


            echo '<script>location.href="manager_panel.php";alert("material Added Successfully");</script>';
   // it worked
} else {
   echo '<script>location.href="manager_panel.php";alert("Something Went Wrong ");</script>';
}

        ?>
    </body>
</html>
