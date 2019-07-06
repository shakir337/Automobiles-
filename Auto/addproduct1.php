<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $mname=$_SESSION["mname"];
        $sp_name=$_POST["sp_name"];
        $price=$_POST["price"];
        //$quantity=0;
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
         
        $sql=$conn->prepare("INSERT INTO sp_part(sp_name,price) VALUES (?,?)");
        $sql->bind_param("si",$sp_name,$price);
        
        if ($sql->execute()) {
            


            echo '<script>location.href="manager_panel.php";alert("Product Added Successfully");</script>';
   // it worked
} else {
   echo '<script>location.href="manager_panel.php";alert("Something Went Wrong ");</script>';
}

        ?>
    </body>
</html>
