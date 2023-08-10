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
    <legend>Forgot User Id</legend>
<table class=box >
<tr><td colspan=2  >Enter your Phone Number:</td><td><input type="tel" name="phone" maxlength="10" inputmode=numeric pattern='[0-9]{10}'  title="Please enter phone Number" required /></td></tr>
<tr><td colspan=2 > Enter your Email Id:</td><td> <input type="email" name="email" autocomplete=off required /></td></tr>
<tr><td colspan=2 > Create a New UserId: <td><input type="text" name="n" required pattern="(?=.*\d)(?=.[a-zA-Z]).{2,14}" title="ID must contain one number"/>


<tr><tr><tr>
<tr><td celpadding=5px celspacing=5px colspan=3 align=center><input type="submit" name="sign" value="Change User Id" /></td>

</tr></fieldset>

<?php
if(isset($_POST['sign'])){
session_start();
include 'db.php';
 $n=$_POST['n'];
$e=$_POST['email'];
$ph=$_POST['phone'];
$s="select * from user where cphone='$ph';";
$re=mysqli_query($con,$s);
if(mysqli_num_rows($re)>0){
  while($row=mysqli_fetch_array($re)){
    if($row['cemail']!=$e){
      die("Please check the Email address");}
    else{
        $up="update user set user_id='$n' where cphone='$ph';";
        $upda=mysqli_query($con,$up);
        echo mysqli_error($con);
        echo "<script type/javascript>
        alert('User ID changed Succussfully');
        </script>";
        echo "<a href=login.php>Login Here</a>";
    }
}
}
else{
  die("Please check the Phone Number");
}
}
?>



</table>
</form></div>
</body>
</html>