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
#right-div{
	margin-top: 4px;
	padding:15px;
	float:center;
	margin-right: 0%;
	height:auto;
	width:30%;
	}
ul
{
	text-align: center;
	background-color:#008080;

}
ul li
{
	padding: 0px;
	width:170px;
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
if(isset($_SESSION['cname'])){
    $cname=$_SESSION["cname"] ;
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
				<li><a href="client_panel.php">Home</a></li>
			
        		
				<li><a href="Contact Us.html">Contact Us</a></li>
				<li><a href="logout.php">Logout</a></li>
	<ul>
</div>
</div>


<center>

	
<form action="checkstatus1.php" method="post">

<fieldset>
<legend style="color:black;"><b>Order Detail</b></legend>
<table style="padding:15px;">

 	<?php
 	$req_id=$_POST["req_id"];
 	include 'dbcon.php';
 	 if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT * FROM cust_req where req_id='$req_id'";
         $result = $conn->query($sql);
         $row = $result->fetch_assoc();


 	?>
 	<tr>
 		<td>Request Id:</td>
 		<td><?php echo $row["req_id"]; ?></td>
 	</tr>
 	<tr>
 		<td>Spare Part ID:</td>
 		<td><?php echo $row["sp_id"]; ?></td>
 	</tr>
 	<tr>
 		<td>Quantity:</td>
 		<td><?php echo $row["quantity"]; ?></td>
 	</tr>
 	<tr>
 		<td>Status:</td>
 		<td><?php echo $row["status"]; ?></td>
 	</tr>
 	
	


</table>
</fieldset>
</form>

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