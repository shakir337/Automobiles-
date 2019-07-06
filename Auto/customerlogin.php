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

<div id="heade">
<div id="logo">
<img src="images/logo.gif" height="200px" width="200px">						<!--left-logo-->
<div id="text">
  <h1>AUTOSPARE PART MANAGMENT SYSTEM</h1>               <!--PROJECT NAME-->
</div>
</div>
<div id="navigation">
	<ul>
				<li><a href="index.html">Home</a></li>
				<li><a href="customerlogin.php">Customer Login</a></li>
        		<li><a href="managerlogin.php">Manager Login</a></li>
				<li><a href="supplierlogin.php">Supplier Login</a></li>
				
				<li><a href="Contact Us.html">Contact Us</a></li>
	<ul>
</div>
</div>

<center>

 <fieldset style="width: auto;">
<legend style="color:blue; width: auto;"><b>CUSTOMER LOGIN</b></legend>
<form action="customerlogin1.php" method="post">
<table style="padding:15px;">

<tr>
  <td>
    <label>USER NAME:</label>
  </td>
  <td><input type="text" name="uname"></td>
</tr>
<tr>
  <td>
    <label>PASSWORD :</label>
  </td>
  <td><input type="password" name="pass"></td>
</tr>
<tr>
  
  <td><input type="submit" name="" value="LOGIN"></td>
</tr>
</table>
</form>
</fieldset>
  




</center>




</body>

</html>