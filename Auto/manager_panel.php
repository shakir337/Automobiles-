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

	<div id="right-div" style="border:1px dashed black;">
		<h2 style="text-align:center">MANAGER PANEL</h2>
	<ul style="color:black ;text-decoration:none; color: white;">
			<li><a href="addproduct.php">ADD PRODUCT</a></li><br/>
			<li><a href="addmaterial.php">ADD MATERIAL</a></li><br/>
			<li><a href="updateproduction.php">UPDATE PRODUCTION</a></li><br/>
            <li><a href="checkorder.php">CHECK CLIENT ORDERS</a></li><br/>
            <li><a href="checkraw.php"> CHECK RAW MATERIAL</a></li></br>
            <li><a href="checkproduct.php">CHECK PRODUCT</a></li><br/>
            <li><a href="orderraw.php">ORDER RAW MATERIAL</a></li><br/>
			<li><a href="statusoforder.php">STATUS OF ORDERED RAW MATERIAL</a></li><br/>		
	</ul>
	</div>
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