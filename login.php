<<<<<<< HEAD
<html>
<head>
  <title>Sign-Up Form</title>
<style>
div{
  text-align: Topcenter;
  background: #ffaaaa;
  width: 470px;
  display:flex;
  height:auto 200px;
  align-items:center;
  margin:100px 0px 0px 60px;
  padding: 50px;
  padding-top:120px;
 
}

input
{ 
font-family:Georgia bold;
background-color: lightblue; 
margin:0.4rem;
}
input:hover{
    background:#ffefef;
}
input[type=submit],[type=reset]{
  border-radius: 5rem;
  background-color:white;
  cursor:pointer;
  font-size:17px;
}
.box{
    background-color: solid yellow;
}
body{
  background-image:url("final-banner-2.jpg");
  background-repeat:no-repeat;
  background-size:100% 100%;
  opacity:0.9;
}
legend{
  background-color:#fff;
  color:#000;
  padding:3px 6px;
}
fieldset{
  margin:10px;

}
.lo{
  text-decoration:none;
  font-style:bolder;
  font-size:18px;
}
.lo:hover{
  color:yellow;
}
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
header {
  background-color: rgb(0, 79, 153);
	color: #fff;
	padding: 50px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 1;
}

h1 {
	font-size: 36px;
	margin-right: auto;
}

nav ul {
	display: flex;
	list-style: none;
}

nav ul li {
	margin-left: 20px;
}

nav ul li a {
	color: #fff;
	text-decoration: none;
	font-size: 20px;
	padding: 5px 10px;
	border-radius: 5px;
	transition: all 0.3s ease-in-out;
}

nav ul li a:hover {
	background-color: #fff;
	color: #333;
	transform: scale(1.1);
}

nav ul li.active a {
	background-color: #fff;
	color: #333;
}

main {
	margin-top: 100px;
	padding: 20px;
}
</style>
</head>
<body><center>
	<header>
		<h1>Online Grocery Mart</h1>
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="admin.php">Admin</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li ><a href="about.php">About Us</a></li>
			</ul>
		</nav>
	</header>
  <main>
<div>
<form action="" method="post">
<fieldset >
    <legend>Login Form</legend>
<table class=box >
<tr><td colspan=2  >Enter your User id:</td><td><input type="text" name="name"   title="Please enter valid name" required /></td></tr>
<tr><td colspan=2 > Enter your Password:</td><td> <input type="password" name="pass" autocomplete=off required /></td></tr>
<tr><tr><tr>
  <tr><td colspan=3 align=center><a href=forgotpass.php class=lo >Forgot Password? </a> OR <a class=lo href=forgotuser.php>User ID</a>
<tr><td celpadding=5px celspacing=5px colspan=2><input type="submit" name="sign" value="Login" /></td>
<td><input type="reset" name="log" value="Clear" /></td>
<tr><td colspan=4 align=center>Not Yet Register Sign Up...<a href="register.php" class=lo >Here </a>
</tr></fieldset>

<?php
if(isset($_POST['sign'])){
session_start();
include 'db.php';
 $n=$_POST['name'];
 $ps=md5($_POST['pass']);
$s="select * from user where user_id='$n';";
$re=mysqli_query($con,$s);
if(mysqli_num_rows($re)>0){
  while($row=mysqli_fetch_array($re)){
    if($row['password']!=$ps){
      die("Invalid Password");}
      else{
        $_SESSION['user']=$n;
        header('location:home.php');
    }
}

}
else{
  die("please check the user id");
}
}
?>



</table>
</form></div>
</body>
=======
<html>
<head>
  <title>Sign-Up Form</title>
<style>
div{
  text-align: Topcenter;
  background: #ffaaaa;
  width: 470px;
  display:flex;
  height:auto 200px;
  align-items:center;
  margin:100px 0px 0px 60px;
  padding: 50px;
  padding-top:120px;
 
}

input
{ 
font-family:Georgia bold;
background-color: lightblue; 
margin:0.4rem;
}
input:hover{
    background:#ffefef;
}
input[type=submit],[type=reset]{
  border-radius: 5rem;
  background-color:white;
  cursor:pointer;
  font-size:17px;
}
.box{
    background-color: solid yellow;
}
body{
  background-image:url("final-banner-2.jpg");
  background-repeat:no-repeat;
  background-size:100% 100%;
  opacity:0.9;
}
legend{
  background-color:#fff;
  color:#000;
  padding:3px 6px;
}
fieldset{
  margin:10px;

}
.lo{
  text-decoration:none;
  font-style:bolder;
  font-size:18px;
}
.lo:hover{
  color:yellow;
}
* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;
}
header {
  background-color: rgb(0, 79, 153);
	color: #fff;
	padding: 50px;
	display: flex;
	align-items: center;
	justify-content: space-between;
	position: fixed;
	top: 0;
	left: 0;
	width: 100%;
	z-index: 1;
}

h1 {
	font-size: 36px;
	margin-right: auto;
}

nav ul {
	display: flex;
	list-style: none;
}

nav ul li {
	margin-left: 20px;
}

nav ul li a {
	color: #fff;
	text-decoration: none;
	font-size: 20px;
	padding: 5px 10px;
	border-radius: 5px;
	transition: all 0.3s ease-in-out;
}

nav ul li a:hover {
	background-color: #fff;
	color: #333;
	transform: scale(1.1);
}

nav ul li.active a {
	background-color: #fff;
	color: #333;
}

main {
	margin-top: 100px;
	padding: 20px;
}
</style>
</head>
<body><center>
	<header>
		<h1>Online Grocery Mart</h1>
		<nav>
			<ul>
				<li><a href="home.php">Home</a></li>
				<li><a href="admin.php">Admin</a></li>
				<li><a href="contact.php">Contact Us</a></li>
				<li ><a href="about.php">About Us</a></li>
			</ul>
		</nav>
	</header>
  <main>
<div>
<form action="" method="post">
<fieldset >
    <legend>Login Form</legend>
<table class=box >
<tr><td colspan=2  >Enter your User id:</td><td><input type="text" name="name"   title="Please enter valid name" required /></td></tr>
<tr><td colspan=2 > Enter your Password:</td><td> <input type="password" name="pass" autocomplete=off required /></td></tr>
<tr><tr><tr>
  <tr><td colspan=3 align=center><a href=forgotpass.php class=lo >Forgot Password? </a> OR <a class=lo href=forgotuser.php>User ID</a>
<tr><td celpadding=5px celspacing=5px colspan=2><input type="submit" name="sign" value="Login" /></td>
<td><input type="reset" name="log" value="Clear" /></td>
<tr><td colspan=4 align=center>Not Yet Register Sign Up...<a href="register.php" class=lo >Here </a>
</tr></fieldset>

<?php
if(isset($_POST['sign'])){
session_start();
include 'db.php';
 $n=$_POST['name'];
 $ps=md5($_POST['pass']);
$s="select * from user where user_id='$n';";
$re=mysqli_query($con,$s);
if(mysqli_num_rows($re)>0){
  while($row=mysqli_fetch_array($re)){
    if($row['password']!=$ps){
      die("Invalid Password");}
      else{
        $_SESSION['user']=$n;
        header('location:home.php');
    }
}

}
else{
  die("please check the user id");
}
}
?>



</table>
</form></div>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>