<!DOCTYPE html>

<head><title>ASMS</title></head>

<style>
*
{
margin:0px;
}


#logo
{
  margin: 0px;
  padding: 0px;
  width: 100%;
  height: 20%;
  background-color: #000000;

}
#right-div{
	margin-top: 4px;
	padding:15px;
	float:center;
	margin-right: 0%;
	height:auto;
	width:30%;
	}
#text
{
  float: right;
  color: red;
  margin-top: 40px;
  margin-right: 20%;
  font-size: 25px;

}
#heade
{
	background-color:#31353d;
}


ul
{
	text-align: center;
	background-color:#008080;

}
ul li
{
	padding: 0px;
	width:300px;
	border:0px solid grey;
	display:inline-block;
	height:35px;
	line-height:35px;
	text-align:center;
}

ul li a
{
		color: #f5f5f5;
		text-decoration:none;
		display:block;
}

ul li a:hover
{
	background-color:orange;
	color:black;
}
td{
padding:5px;
}
form{
padding:15px;
margin:3px 450px 40px;
}
footer{
padding:15px;
clear:both;
background:gray;
margin-top:auto;
text-align:center;
padding:15px;
height: 70px;

}
</style>



<body style="background-color:#e9edf2;text-align:center">
  <?php 
session_start();
if(isset($_SESSION['mname'])){
    $mname=$_SESSION["mname"] ;
  ?>
<div id="heade">
<div id="logo">
<img src="images/logo.gif" height="200px" width="200px">						<!--left-logo-->
<div id="text">
  <h1>AUTOSPARE PART MANAGMENT SYSTEM</h1>               <!--PROJECT NAME-->
</div>
</div>
<div id="navigation">
	<ul>
				<li><a href="manager_panel.php">Home</a></li>
				
        		
				
				
				<li><a href="Contact Us.html">Contact Us</a></li>
				<li><a href="logout.php">Logout</a></li>
	<ul>
</div>
</div>


<center>

	
		
 	

<fieldset>
<legend style="color:blue;"><b>ORDER REQUEST</b></legend>
<form action="checkorder2.php" method="POST">
<table style="padding:15px;">
	<?php
 		include 'dbcon.php';
 		$req_id=$_POST["req_id"];
 	 	if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM cust_req where req_id='$req_id'";
         $result = $conn->query($sql);
         $row = $result->fetch_assoc();

 	?>
 	<tr>
 		<td>Request ID:</td>
 		<td><input type="text" name="req_id" value="<?php echo $req_id; ?>" readonly></td>
 	</tr>
 	<tr>
 		<td>Spare Part ID:</td>
 		<td><input type="text" name="sp_id" value="<?php echo $row['sp_id']; ?>" readonly></td>
 	</tr>
	<tr>
 		<td>Quantity:</td>
 		<td><input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" readonly></td>
 	</tr>
 	<tr>
 		<td>Date:</td>
 		<td><input type="text" name="date" value="<?php echo $row['date']; ?>" readonly></td>
 	</tr>
 	<tr>
 		<td>Client ID:</td>
 		<td><input type="text" name="client_id" value="<?php echo $row['client_id']; ?>" readonly></td>
 	</tr>
 	<tr>
 		<td colspan="2"><input type="submit" name="" value="submit"></td>
 		
 	</tr>
	<tr>
 		
 	</tr>



</table>
</form>

</fieldset>


	
	</center>








<?php
}
else
{
    echo '<script>location.href="customerlogin.php";alert("Login First");</script>';
}
?>
</body>

</html>