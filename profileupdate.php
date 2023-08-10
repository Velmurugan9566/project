<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile </title>
    <style>
         body{
            width:100%;
            height:100%;
            background-color: bisque;
        }
        header{
            width:100%;
            height:30%;
            overflow:hidden;
            position:fixed;
            top:0;
            align-items:center;
            background-color: rgb(0, 79, 153);
            color:white;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }
        .head{
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color:white;
            display:inline-block;
            padding-top:20px;
            
        }
      .nav{
            list-style-type: none;
            display:flex;
            gap:20px;
            position:fixed;
            padding-left:60%;
            padding-bottom: 5px;
            font-weight: bold;
            font-size:20px;
            
        }
        .login{
           color:white;
           text-decoration:none;
           font-size:18px;
        }
        .navl{
            color:white;
            text-decoration:none ;
        }
        .navl:hover{
               color:yellow;
               text-decoration:underline;
               
        }
        
        main{
            margin-top: 160px ;
            height:100%;
            align-items:center;
            justify-items: center;
            justify-content: space-evenly;
            padding:20px;
            overflow:hidden;
            background-color: bisque;
            background-attachment: scroll;
            
        }
        .h{
          padding:200px;
        }
        input,textarea{
            margin: 0.4em;
            border:2px solid black;
            background-color:lightgray;
            
            height:30px;
        }
        textarea{
            height:70px;
        }
        </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <?php include "header.php";?>
    </header>  
<main>
    <?php
   if(isset($_SESSION['user'])){
      include 'db.php';
      $s="select * from user where user_id='$_SESSION[user]';";
      $re=mysqli_query($con,$s);
     while($user=mysqli_fetch_array($re)){
                 $ph=$user['cphone'];
                 $e=$user['cemail'];
                 $add=$user['caddress'];
                 $pin=$user['cpin'];
    echo "<table align=center bgcolor=white cellspacing=15px cellpadding=15px>
    <form action='' method=post><B>
    <tr><td colspan=4 align=center><h2>view your profile</h2>
    <tr><td><B>Name:<td>".$user['cname']."
    <tr><td><B>Gender:<td>".$user['cgen']."
    <td><B>Age:<td>".$user['cage']."

    <tr><td><B>Address:<td rowspan=2><textarea rows=5 cols=40 required name=add  >".$user['caddress']."</textarea>
    <tr><tr><td><B>Pincode<td><input type=text name=pin  required value='".$user['cpin']."' >

    <tr><td><B>phone number:<td><input type=tel name=ph required pattern='[0-9]{10}' value='".$user['cphone']."'>
    <tr><td><B>Email<td><input type=email required name=email value='".$user['cemail']."'>
    <tr><td colspan=2 align=center><input type=submit name=sub value=change><tr></form>";
}
if(isset($_POST['sub'])){
    $e=$_POST['email'];
    $p=$_POST['ph'];
    $pin=$_POST['pin'];
    $ad=$_POST['add'];
    $up="update user set cphone='$p',cemail='$e',cpin='$pin',caddress='$ad' where user_id='$_SESSION[user]';";
   $upda=mysqli_query($con,$up); 
   if($upda){
    echo "<script type/javascript>
    if(confirm('Proflie update successfully..')){
   document.location='".$_SESSION['las']."';}</script>";
   }
}
    }
    else{
         echo "<h2 align=center class=h> Your Not login Please login first";
    }
     ?>
    </table>
    </main>