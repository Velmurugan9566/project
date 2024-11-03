<<<<<<< HEAD
<?php
$con=mysqli_connect("localhost","root","");
if(!$con){
    die('could not connect'.mysqli_error($con));
}
mysqli_select_db($con,'grocery');
?>
=======
<?php
$con=mysqli_connect("localhost","root","");
if(!$con){
    die('could not connect'.mysqli_error($con));
}
mysqli_select_db($con,'grocery');
?>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
