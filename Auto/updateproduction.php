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

	
<form action="updateproduction1.php" method="post">

<fieldset>
<legend style="color:black;"><b>UPADTE INVENTORY</b></legend>
<table style="padding:15px;">
<tr>
 <td><b>Product Name:</b></td>
 <td><select style="padding:5px;" name="sp_name">
 	<option>select..</option>
 	<?php
 	include 'dbcon.php';
 	 if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
         $sql = "SELECT * FROM sp_part";
         $result = $conn->query($sql);
         while($row = $result->fetch_assoc()) {

 	?>
 	
	<option><?php echo $row["sp_name"];?></option>
	<?php } 
		$conn->close();

	 ?>
	</select>
	</td>
</tr>
<tr>
 <td><b>Quantity:</b></td>
 <td><input type="text" name="quantity"></td>
</tr>


	<td>
		<input type="reset" value="RESET">
	</td>
	<td>
		<input type="submit" value="UPDATE">
	</td>
</tr>


</table>
</fieldset>
</form>

	</center>









<?php
}
else
{
    echo '<script>location.href="managerlogin.php";alert("Login First");</script>';
}
?>
</body>

</html>