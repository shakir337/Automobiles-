<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $sname=$_SESSION["sname"];
        $req_id=$_POST["req_id"];
        $quantity=$_POST["quantity"];
        $m_name=$_POST["m_name"];
       
        
        include 'dbcon.php';
        
        
        
      
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
        $sql2 = "SELECT avail FROM material where m_name='$m_name'";
         $result2 = $conn->query($sql2);
         $row2 = $result2->fetch_assoc();
         $quantity1=$row2["avail"];

        
    
            $newquantity=$quantity+$quantity1;
        $sql="UPDATE material_req SET status='confirmed' where req_id=$req_id";
        $sql2="UPDATE material SET avail=$newquantity where m_name='$m_name'";
        if ($conn->query($sql ) && $conn->query($sql2) ) {
            
            echo '<script>location.href="supp_panel.php";alert("Request Confirmed");</script>';
   // it worked
        } else {
                echo '<script>location.href="supp_panel.php";alert(" Something Went Wrong ");</script>';
            }

       

        ?>

    </body>
</html>
