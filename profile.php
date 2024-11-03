<<<<<<< HEAD
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
        </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <?php include "header.php";
    $_SESSION['las']=$_SERVER['REQUEST_URI'];?>
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
    <tr><td colspan=4 align=center><h2>view your profile</h2>
    <tr><td>Name:<td>".$user['cname']."<td>Address:<td rowspan=2>".$user['caddress'].-$user['cpin']."
    <tr><td>Gender:<td>".$user['cgen']."
    <tr><td>Age:<td>".$user['cage']."
    <tr><td>phone number:<td>".$user['cphone']."
    <tr><td>Email<td>".$user['cemail']."
    <td colspan=2 align=center><button onClick=window.location='profileupdate.php?id=1'>change Address/PhoneNo/Email</button><tr>";
}
echo "<tr><td colspan=4 align=center>Your transaction History
        <tr align=center><td>Transaction Id<td>Payment Mode<td>Date of Purchase<td>Total Amount";
$tran="select * from payment where userid='$_SESSION[user]';";
      $r=mysqli_query($con,$tran);
      if(mysqli_num_rows($r)>0){
     while($tr=mysqli_fetch_array($r)){
     
      echo "<tr align=center><td><a href=profile.php?trid=".$tr['tranid']."&total=".$tr['amount'].">".$tr['tranid']."
      <td>".$tr['paymode']."
      <td>".$tr['day']."
       <td>".$tr['amount']."</tr></td>";
     }
    }else{
        echo "<tr><td colspan=4 align=center><b>You have no Transaction with us.. ";
    }
     echo "<tr><tr><td colspan=4><hr>";
     if(isset($_GET['trid'])){
         echo "<tr align=center><td>Transaction Id :".$_GET['trid']."<td><td><td><td><a href=repeat.php?id=".$_GET['trid']."><Button style=color:blue;>Repeat</button></a>";
         echo "<tr><td>Product Name
               <td>Quantity
               <td>Price
               <td>Unit
               <td>Total ";
               $histroy="select * from transaction where tranid='$_GET[trid]';";
               $ans=mysqli_query($con,$histroy);
              while($his=mysqli_fetch_array($ans)){
                 echo "<tr align=center><td>".$his['proname']."
                      <td>".$his['proquan'].$his['mesureby']." 
                      <td>".$his['proprice']."
                      <td>".$his['prounit']."
                      <td>".$his['total'];
                      }
              echo "<tr><td colspan=6><hr><tr><td><td><td><td>TOTAL Amount<td>".$_GET['total'];
              // echo "<tr><td colspan=4>Grand total<td>".$_GET['total'];

     }
    }
    else{
         echo "<h2 align=center class=h> Your Not login Please login first";
    }
     
     ?>


   
    


    </table>
    
=======
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
        </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <?php include "header.php";
    $_SESSION['las']=$_SERVER['REQUEST_URI'];?>
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
    <tr><td colspan=4 align=center><h2>view your profile</h2>
    <tr><td>Name:<td>".$user['cname']."<td>Address:<td rowspan=2>".$user['caddress'].-$user['cpin']."
    <tr><td>Gender:<td>".$user['cgen']."
    <tr><td>Age:<td>".$user['cage']."
    <tr><td>phone number:<td>".$user['cphone']."
    <tr><td>Email<td>".$user['cemail']."
    <td colspan=2 align=center><button onClick=window.location='profileupdate.php?id=1'>change Address/PhoneNo/Email</button><tr>";
}
echo "<tr><td colspan=4 align=center>Your transaction History
        <tr align=center><td>Transaction Id<td>Payment Mode<td>Date of Purchase<td>Total Amount";
$tran="select * from payment where userid='$_SESSION[user]';";
      $r=mysqli_query($con,$tran);
      if(mysqli_num_rows($r)>0){
     while($tr=mysqli_fetch_array($r)){
     
      echo "<tr align=center><td><a href=profile.php?trid=".$tr['tranid']."&total=".$tr['amount'].">".$tr['tranid']."
      <td>".$tr['paymode']."
      <td>".$tr['day']."
       <td>".$tr['amount']."</tr></td>";
     }
    }else{
        echo "<tr><td colspan=4 align=center><b>You have no Transaction with us.. ";
    }
     echo "<tr><tr><td colspan=4><hr>";
     if(isset($_GET['trid'])){
         echo "<tr align=center><td>Transaction Id :".$_GET['trid']."<td><td><td><td><a href=repeat.php?id=".$_GET['trid']."><Button style=color:blue;>Repeat</button></a>";
         echo "<tr><td>Product Name
               <td>Quantity
               <td>Price
               <td>Unit
               <td>Total ";
               $histroy="select * from transaction where tranid='$_GET[trid]';";
               $ans=mysqli_query($con,$histroy);
              while($his=mysqli_fetch_array($ans)){
                 echo "<tr align=center><td>".$his['proname']."
                      <td>".$his['proquan'].$his['mesureby']." 
                      <td>".$his['proprice']."
                      <td>".$his['prounit']."
                      <td>".$his['total'];
                      }
              echo "<tr><td colspan=6><hr><tr><td><td><td><td>TOTAL Amount<td>".$_GET['total'];
              // echo "<tr><td colspan=4>Grand total<td>".$_GET['total'];

     }
    }
    else{
         echo "<h2 align=center class=h> Your Not login Please login first";
    }
     
     ?>


   
    


    </table>
    
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
    </main>