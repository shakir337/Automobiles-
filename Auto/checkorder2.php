<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        session_start();
        $mname=$_SESSION["mname"];
        $req_id=$_POST["req_id"];
        $quantity=$_POST["quantity"];
        $sp_id=$_POST["sp_id"];
       
        
        include 'dbcon.php';
        if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
        }
        $sql1 = "SELECT avail FROM sp_part where sp_id=$sp_id";
            $result = $conn->query($sql1);
            $row = $result->fetch_assoc();
            $avail=$row["avail"];
        if($quantity <= $avail)
        {
            $newquantity=$avail-$quantity;
        $sql="UPDATE cust_req SET status='Confirmed' where req_id=$req_id";
        $sql2="UPDATE sp_part SET avail=$newquantity where sp_id=$sp_id";
        if ($conn->query($sql ) && $conn->query($sql2) ) {
            
           echo '<script>location.href="manager_panel.php";alert("Request Confirmed ");</script>';
   // it worked
		} else {
   echo '<script>location.href="manager_panel.php";alert(" Some Thing Went Wrong ");</script>';
				}

        }else{
        	$sql="UPDATE cust_req SET status='Rejected' where req_id=$req_id";
        	$conn->query($sql );
       		echo '<script>location.href="manager_panel.php";alert("No Product Vailable in Inventory! Request Are Rejected ");</script>';
    }
  

    

        ?>

    </body>
</html>
