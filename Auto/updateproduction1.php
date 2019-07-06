<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $mname=$_SESSION["mname"];
        
        $avail=$_POST["quantity"];
        $sp_name=$_POST["sp_name"];
       
        echo $avail;
        echo $sp_name;
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT avail FROM sp_part where sp_name='$sp_name'";
         $result = $conn->query($sql);
         $row = $result->fetch_assoc();
         $newquantity=$avail+$row['avail'];
        
        $sql="UPDATE sp_part SET avail=$newquantity where sp_name='$sp_name'";
        
        if ($conn->query($sql) ) {
            
            echo '<script>location.href="manager_panel.php";alert("Database Updated");</script>';
   // it worked
    }
   else{
//        echo '<script>location.href="manager_panel.php";alert("Something Went Wrong!! ");</script>';
    }

        ?>

    </body>
</html>
