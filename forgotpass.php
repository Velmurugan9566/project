<<<<<<< HEAD
<html>
<head>
  <title>forgot password</title>
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
  padding-top:50px;
 
}
.div .box:not(.active){
  transform:rotateY(-180deg);
  opacity:0;
  z-index:-1;
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
a{
  text-decoration:none;
  font-size:22px;
 
}
.err{
    color:red;
}
input:invalid + span::before{
   position:absolute;
   content:"??";
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

.about {
	display: flex;
	justify-content: center;
}

.container {
	max-width: 800px;
	text-align: center;
	padding: 20px;
	animation: slideUp 1s ease-in-out;
}

h2 {
	font-size: 36px;
	margin-bottom: 20px;
	animation: fadeIn 1s ease-in-out;
}

p {
	font-size: 18px;
	line-height: 1.5;
	margin-bottom: 20px;
	animation: fadeIn 1s ease-in-out;
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
    <legend>Change Password</legend>
<table class=box >
<tr><td colspan=2  >Enter your User Id:</td><td><input type="text" name="name"   title="Please enter valid name" required /></td></tr>
<tr><td colspan=2 > Enter your Email Id:</td><td> <input type="email" name="email" autocomplete=off required /></td></tr>
<tr><td colspan=2 > Create a New Password: <td><input type="password" name="pass" class=pass autocomplete=off pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" required title="Password must contain  Uppercase letter,Special character, numbers" />
<span></span
>
<tr><td colspan=2 > confirm Password: <td><input type="password" name="repass" autocomplete=off required />

<tr><tr><tr>
<tr><td celpadding=5px celspacing=5px colspan=3 align=center><input type="submit" name="sign" value="Change Password" /></td>

</tr></fieldset>

<?php
if(isset($_POST['sign'])){
session_start();
include 'db.php';
 $n=$_POST['name'];
$e=$_POST['email'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$s="select * from user where user_id='$n';";
$re=mysqli_query($con,$s);
if(mysqli_num_rows($re)>0){
  while($row=mysqli_fetch_array($re)){
    if($row['cemail']!=$e){
      die("Please check the Email address");}
    else{
       if($pass==$repass){
        $pass=md5($pass);
        $up="update user set password='$pass' where user_id='$n';";
        $upda=mysqli_query($con,$up);
        echo "<script type/javascript>
        alert('Password changed successfully');
        </script>";
        echo "<a href=login.php>Login Here</a>";
       } 
       else{
        die('Confirm Password Not ');
       }
    }
}

}
else{
  die("Please check the UserId");
}
}
?>



</table>
</form></div>
</body>
=======
<html>
<head>
  <title>forgot password</title>
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
  padding-top:50px;
 
}
.div .box:not(.active){
  transform:rotateY(-180deg);
  opacity:0;
  z-index:-1;
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
a{
  text-decoration:none;
  font-size:22px;
 
}
.err{
    color:red;
}
input:invalid + span::before{
   position:absolute;
   content:"??";
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

.about {
	display: flex;
	justify-content: center;
}

.container {
	max-width: 800px;
	text-align: center;
	padding: 20px;
	animation: slideUp 1s ease-in-out;
}

h2 {
	font-size: 36px;
	margin-bottom: 20px;
	animation: fadeIn 1s ease-in-out;
}

p {
	font-size: 18px;
	line-height: 1.5;
	margin-bottom: 20px;
	animation: fadeIn 1s ease-in-out;
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
    <legend>Change Password</legend>
<table class=box >
<tr><td colspan=2  >Enter your User Id:</td><td><input type="text" name="name"   title="Please enter valid name" required /></td></tr>
<tr><td colspan=2 > Enter your Email Id:</td><td> <input type="email" name="email" autocomplete=off required /></td></tr>
<tr><td colspan=2 > Create a New Password: <td><input type="password" name="pass" class=pass autocomplete=off pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" required title="Password must contain  Uppercase letter,Special character, numbers" />
<span></span
>
<tr><td colspan=2 > confirm Password: <td><input type="password" name="repass" autocomplete=off required />

<tr><tr><tr>
<tr><td celpadding=5px celspacing=5px colspan=3 align=center><input type="submit" name="sign" value="Change Password" /></td>

</tr></fieldset>

<?php
if(isset($_POST['sign'])){
session_start();
include 'db.php';
 $n=$_POST['name'];
$e=$_POST['email'];
$pass=$_POST['pass'];
$repass=$_POST['repass'];
$s="select * from user where user_id='$n';";
$re=mysqli_query($con,$s);
if(mysqli_num_rows($re)>0){
  while($row=mysqli_fetch_array($re)){
    if($row['cemail']!=$e){
      die("Please check the Email address");}
    else{
       if($pass==$repass){
        $pass=md5($pass);
        $up="update user set password='$pass' where user_id='$n';";
        $upda=mysqli_query($con,$up);
        echo "<script type/javascript>
        alert('Password changed successfully');
        </script>";
        echo "<a href=login.php>Login Here</a>";
       } 
       else{
        die('Confirm Password Not ');
       }
    }
}

}
else{
  die("Please check the UserId");
}
}
?>



</table>
</form></div>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>