<?php
$con=mysqli_connect("localhost","root","");
if(!$con){
    die('could not connect'.mysqli_error($con));
}
mysqli_select_db($con,'grocery');
?>
