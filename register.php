<<<<<<< HEAD
<html>
<head>
  <title>Registeration Form</title>
<style>
div{
  text-align: Topcenter;

  background: #ffaaaa;
  width:800px;
  height:auto 200px;
  align-items:center;
  margin:100px 0px 0px 60px;
  border: 5px;
  padding: 50px;
  padding-top:50px;
 
}
input,select
{ 
width:180px;
font-family:Georgia bold;
background-color: lightblue; 
border-radius:4rem;
}

input:hover{
    background:#ffefef;
}
input[type=submit]{
  border-radius: 5rem;
  background-color:white;
}
input[type=reset]{
  border-radius: 5rem;
  background-color:white;
}
input:invalid + span::after{
   position: absolute;
   content:"wrong";
}
input:valid + span::after{
   position: absolute;
   content:"correct";
}
.box{
    background-color: solid yellow;
    opacity:0.9;
}
body{
  background-image:url("final-banner-2.jpg");
  background-repeat:no-repeat;
  background-size:100% 100%;
  opacity:0.9;
  
}
span{
  color:red;
}
Input:invalid{

animation: shake 300ms;
Color:red;
}
@keyframes shake{
  0%{
transform:translateX(-4px);
}
        35%{
        transform:translateX(4px);
}
50%{
transform:translateX(-4px);
}
75%{
    transform:translateX(4px);
}
}
@keyframes side-to-side{
         0%{
             Left:0;
   }
    50%{
          top:calc(100%-4rem);
}
100%{
     Left:0;
}
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


<?php
if(isset($_POST['register'])){
session_start();
include 'db.php';
 $uid=$_POST['id'];
 $a=$_POST['age'];
 $g=$_POST['gen'];
 $n=$_POST['name'];
 $e=$_POST['email'];
 $ps=$_POST['pass'];
 $p=$_POST['phnum'];
 $rps=$_POST['rpass'];
 $ad=$_POST['add'];
 $pi=$_POST['pin'];
  $f=1;
  if($ps!=$rps){
    $err3="Password Mismatch";
    $f=0;
  }
  $ps=md5($ps);
$s="select * from user;";
$re=mysqli_query($con,$s);
 while($row=mysqli_fetch_array($re)){
      if($row['user_id']==$uid){
         $err1="User ID Existis";
         $f=0;
       }
       if($row['cphone']==$p){
        $err2="Phone Number is Existis";
        $f=0;
       }
}
if($f==1){
     $ins="insert into user(cname,cage,cgen,cphone,cemail,caddress,cpin,user_id,password)values('$n','$a','$g','$p','$e','$ad','$pi','$uid','$ps')";
     $r=mysqli_query($con,$ins);
}
}
?>
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
<form action="<?php $php_self ?>" method="POST">
<table class=box>
<tr><td>Enter your Name:</td><td><input type="text" name="name" pattern="[a-z A-Z]{3,20}" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" title="Please enter valid name" required/></td></tr>
<tr><td> Enter your Age:</td><td> <input type="number" name="age" min=1 max=70 value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>" required/></td></tr>
<tr><td> Select Gender :</td><td> <select name=gen required><option value=Gender disabled selected>Gender</option><option value=male>Male</option><option value=Female>Female</option></select>
<tr><td> Enter your Phone Number:</td><td> <input type="text" name="phnum" maxlength="10" value="<?php if(isset($_POST['phnum'])) echo $_POST['phnum']; ?>" inputmode=numeric pattern='[0-9]{10}' required/>
<tr><td><td><span><?php if(isset($err2)){echo "*$err2";}?><span></td></tr>
<tr><td> Enter your Email Id:</td><td> <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/></td></tr>
<tr><td> Enter your Address:</td><td><textarea rows=4 cols=35 name=add style='resize:none'  required><?php if(isset($_POST['add'])) echo $_POST['add']; ?></textarea></td></tr>
<tr><td> Enter your pincode:</td><td> <input type="text" name="pin" inputmode=numeric pattern=[0-9]{6} value="<?php if(isset($_POST['pin'])) echo $_POST['pin']; ?>" required maxlength=6/></td></tr>

<tr><td> Create a User Id:</td><td> <input type="text" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required pattern="(?=.*\d)(?=.[a-zA-Z]).{2,14}" title="Name and must contain one number"/>
<tr><td><td><span><?php if(isset($err1)){echo "*$err1";}?><span></tr>

<tr><td> Create Password:</td><td> <input type="password" name="pass" autocomplete=off pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" required title="Password must contain  Uppercase letter,Special character, numbers" /><span></span></td></tr>
<tr><td> Retype password:</td><td> <input type="password" name="rpass" required/>
<tr><td><td><span><?php if(isset($err3)){echo "*$err3";}?></span></td></tr>
<td celpadding=5px celspacing=5px align=center><input type="submit" name="register" value="Register" /></td>
<td align=center><input type="reset" name="log" value="Clear" /></td>
<?php if(isset($r)){
     ?>
     <tr><td  align=center colspan=2>Login successfully Sign Up<a href=login.php>Here</a>
  <?php
}else{
  echo "<tr><td  align=center colspan=2>Already Registered User Sign Up<a href=login.php>Here</a>";
}
?>
</tr>
</table>
</form></div>
</body>
=======
<html>
<head>
  <title>Registeration Form</title>
<style>
div{
  text-align: Topcenter;

  background: #ffaaaa;
  width:800px;
  height:auto 200px;
  align-items:center;
  margin:100px 0px 0px 60px;
  border: 5px;
  padding: 50px;
  padding-top:50px;
 
}
input,select
{ 
width:180px;
font-family:Georgia bold;
background-color: lightblue; 
border-radius:4rem;
}

input:hover{
    background:#ffefef;
}
input[type=submit]{
  border-radius: 5rem;
  background-color:white;
}
input[type=reset]{
  border-radius: 5rem;
  background-color:white;
}
input:invalid + span::after{
   position: absolute;
   content:"wrong";
}
input:valid + span::after{
   position: absolute;
   content:"correct";
}
.box{
    background-color: solid yellow;
    opacity:0.9;
}
body{
  background-image:url("final-banner-2.jpg");
  background-repeat:no-repeat;
  background-size:100% 100%;
  opacity:0.9;
  
}
span{
  color:red;
}
Input:invalid{

animation: shake 300ms;
Color:red;
}
@keyframes shake{
  0%{
transform:translateX(-4px);
}
        35%{
        transform:translateX(4px);
}
50%{
transform:translateX(-4px);
}
75%{
    transform:translateX(4px);
}
}
@keyframes side-to-side{
         0%{
             Left:0;
   }
    50%{
          top:calc(100%-4rem);
}
100%{
     Left:0;
}
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


<?php
if(isset($_POST['register'])){
session_start();
include 'db.php';
 $uid=$_POST['id'];
 $a=$_POST['age'];
 $g=$_POST['gen'];
 $n=$_POST['name'];
 $e=$_POST['email'];
 $ps=$_POST['pass'];
 $p=$_POST['phnum'];
 $rps=$_POST['rpass'];
 $ad=$_POST['add'];
 $pi=$_POST['pin'];
  $f=1;
  if($ps!=$rps){
    $err3="Password Mismatch";
    $f=0;
  }
  $ps=md5($ps);
$s="select * from user;";
$re=mysqli_query($con,$s);
 while($row=mysqli_fetch_array($re)){
      if($row['user_id']==$uid){
         $err1="User ID Existis";
         $f=0;
       }
       if($row['cphone']==$p){
        $err2="Phone Number is Existis";
        $f=0;
       }
}
if($f==1){
     $ins="insert into user(cname,cage,cgen,cphone,cemail,caddress,cpin,user_id,password)values('$n','$a','$g','$p','$e','$ad','$pi','$uid','$ps')";
     $r=mysqli_query($con,$ins);
}
}
?>
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
<form action="<?php $php_self ?>" method="POST">
<table class=box>
<tr><td>Enter your Name:</td><td><input type="text" name="name" pattern="[a-z A-Z]{3,20}" value="<?php if(isset($_POST['name'])) echo $_POST['name']; ?>" title="Please enter valid name" required/></td></tr>
<tr><td> Enter your Age:</td><td> <input type="number" name="age" min=1 max=70 value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>" required/></td></tr>
<tr><td> Select Gender :</td><td> <select name=gen required><option value=Gender disabled selected>Gender</option><option value=male>Male</option><option value=Female>Female</option></select>
<tr><td> Enter your Phone Number:</td><td> <input type="text" name="phnum" maxlength="10" value="<?php if(isset($_POST['phnum'])) echo $_POST['phnum']; ?>" inputmode=numeric pattern='[0-9]{10}' required/>
<tr><td><td><span><?php if(isset($err2)){echo "*$err2";}?><span></td></tr>
<tr><td> Enter your Email Id:</td><td> <input type="email" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" required/></td></tr>
<tr><td> Enter your Address:</td><td><textarea rows=4 cols=35 name=add style='resize:none'  required><?php if(isset($_POST['add'])) echo $_POST['add']; ?></textarea></td></tr>
<tr><td> Enter your pincode:</td><td> <input type="text" name="pin" inputmode=numeric pattern=[0-9]{6} value="<?php if(isset($_POST['pin'])) echo $_POST['pin']; ?>" required maxlength=6/></td></tr>

<tr><td> Create a User Id:</td><td> <input type="text" name="id" value="<?php if(isset($_POST['id'])) echo $_POST['id']; ?>" required pattern="(?=.*\d)(?=.[a-zA-Z]).{2,14}" title="Name and must contain one number"/>
<tr><td><td><span><?php if(isset($err1)){echo "*$err1";}?><span></tr>

<tr><td> Create Password:</td><td> <input type="password" name="pass" autocomplete=off pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,15}" required title="Password must contain  Uppercase letter,Special character, numbers" /><span></span></td></tr>
<tr><td> Retype password:</td><td> <input type="password" name="rpass" required/>
<tr><td><td><span><?php if(isset($err3)){echo "*$err3";}?></span></td></tr>
<td celpadding=5px celspacing=5px align=center><input type="submit" name="register" value="Register" /></td>
<td align=center><input type="reset" name="log" value="Clear" /></td>
<?php if(isset($r)){
     ?>
     <tr><td  align=center colspan=2>Login successfully Sign Up<a href=login.php>Here</a>
  <?php
}else{
  echo "<tr><td  align=center colspan=2>Already Registered User Sign Up<a href=login.php>Here</a>";
}
?>
</tr>
</table>
</form></div>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>