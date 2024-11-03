<<<<<<< HEAD

  <!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Transaction</title>
    <style>
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
        .navl{
            color:white;
            text-decoration:none ;
        }
        .navl:hover{
               color:yellow;
               text-decoration:underline;
               
        }
        main{
            margin-top:100px;
            padding-top:100px;
            width:100%;
            height:100%;
            justify-items:center;
            justify-content:space-evenly;
            background-color: bisque;
            font-family:'Times new roman';
            background-attachment: scroll;
        }
        head{
            height:100%;
            width:100%;

        }
       
        footer{
            bottom:0;
            width:100%;
            height:150px;
            align-items:bottom;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        table{
            width:80%;
            height:50% auto;
            color:blue;
            font-size:18px;
        }
        .login{
            color:white;
            font-style:bold;
        }
        .bill{
          
            border:2px solid black;
            font-weight:bolder;
            background-color:white;

        }

    </style>
        <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <div class='login'>
        <?php session_start(); if(isset($_SESSION['user'])){
            echo '<a class="login" style="padding-left:86%;">&#128526;'.$_SESSION["user"].'</a><a href="logout.php" class="login">|Logout</a> ';
        } else{?>
        <a href="login.php" class="navl" style="padding-left:86%;">Login|</a><a href="register.php" class="navl" target="__self">SignUp <i>&#xf2bd;</i></a><?php }?>
        </div>

        <div class="head">
      <h2 style="border-left:20px solid red;">Online Grocery Product Shopping&#128722;</h2>
              <h3 style="align:center;color:red;"><?php if(isset($msg)){ echo $msg; echo '<a href="login.php" style="color:white;">Login|</a>';}?></h3>
      
    </div>
     
    <ul class="nav" >
       <li><a href="home.php" class="navl" >Home</a></li>
       <li><a href="admin.php" class="navl">Admin</a></li>
       <li><a href="contant.php" class="navl">Contact</a></li>
       <li><a href="about.php" class="navl">About Us</a> </li>
    </ul>
    
</header>
<main>
    <table cellpadding=15px cellspacing=15px align=center>
        <tr><td>
<?php

include 'db.php';
    if(isset($_GET['mode']) && isset($_SESSION['amount'])){
        $mode=$_GET['mode'];
        $d=date('Y-m-d');
     if($mode=='online'){
         $s="insert into payment (userid,paymode,amount,day)values('$_SESSION[user]','$mode','$_SESSION[amount]','$d');";
         $re=mysqli_query($con,$s);
         if($re){
            echo "<script/type=javascript>
                     alert('Payment Successfully....');
                     </script>";
         }
     }
     else{
        $s="insert into payment (userid,paymode,amount,day)values('$_SESSION[user]','$mode','$_SESSION[amount]','$d'); ";
        $re=mysqli_query($con,$s);
        if($re){
            echo "<script/type=javascript>
                     alert('Order Succussfully Placed..');
                     </script>";
        }
     }
     if($re){
        $t="select tranid from payment where userid='$_SESSION[user]';";
        $r=mysqli_query($con,$t);
        while($r1=mysqli_fetch_array($r)){
            $tra=$r1['tranid'];}
            $cart="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
           $re=mysqli_query($con,$cart);
          while($ct=mysqli_fetch_array($re)){
              if($ct['protype']=='lose'){
                $u=$ct['prounit'];
                $q=$ct['unitpro'];
              }else{
                    $u=$ct['unitpro'];
                    $q=$ct['proqua'];
              }
              
              $insert="insert into transaction (tranid,userid,proid,proname,proquan,mesureby,prounit,proprice,total,type) values('$tra','$_SESSION[user]','$ct[proid]','$ct[proname]','$q','$ct[measure]','$u','$ct[proprice]','$ct[total]','$ct[protype]');";
              $in=mysqli_query($con,$insert);
              echo mysqli_error($con);
              if($ct['protype']=='package'){
                $update="UPDATE `product` SET  `prounit`=GREATEST(0,`prounit`-'$ct[unitpro]') WHERE  proid='$ct[idpro]';";
              }elseif($ct['protype']=='lose'){
                $update="UPDATE `product` SET  `proqua`=GREATEST(0,`proqua`-'$ct[unitpro]') WHERE  proid='$ct[idpro]';";
              }
               $r=mysqli_query($con,$update);
              }
     }
     $del="delete from cart where userid='$_SESSION[user]';";
     $d=mysqli_query($con,$del);
     unset($_SESSION['amount']);
  }
  if(isset($in)){
  ?>
  <table cellpadding=20 cellspaceing=1 align=center class=bill>
  <tr><th align=center colspan=12 style=font-size:30px;>Online Grocery Mart</th>
    <tr><th align=center colspan=12 style=font-size:30px;> Invoice Bill</th>
        <?php
         $s="select * from user where user_id='$_SESSION[user]';";
         $re=mysqli_query($con,$s);
         while($order=mysqli_fetch_array($re)){
           $name=$order['cname'];
           $ph=$order['cphone'];
           $pin=$order['cpin'];
           $add=$order['caddress'];
            }
            $d=date('Y-m-d,H:ia');
    echo "<tr><td>Name:<td>".$name."<td colspan=8><td>Date:<td>".$d."
    <tr><td>Phone No:<td>".$ph."<td colspan=8>
    <tr><td>address:<td>".$add.-$pin."<td colspan=8>";
    ?>
    <tr><td colspan=12><hr>
    <tr><td>sno<td colspan=3>Product Name<td colspan=3>Product weight<td>Price <td colspan=2>Unit<td colspan=3>Total Price
    <?php
           $tr="select * from payment inner join transaction on payment.tranid=transaction.tranid where transaction.tranid='$tra';";
           $tr1=mysqli_query($con,$tr);
           $i=1;
           while($tr2=mysqli_fetch_array($tr1)){
               echo "<tr><td>".$i.".";
               echo "<td colspan=3>".$tr2['proname'];
               echo "<td colspan=3>".$tr2['proquan'];
               echo "<td >Rs.".$tr2['proprice'];
               echo "<td colspan=2>".$tr2['prounit'];
               echo "<td colspan=3>Rs.".$tr2['total'];
               $i+=1;
               $t=$tr2['amount'];
           }
           echo " <tr><td colspan=12><hr>";
           echo "<tr><td colspan=8><td colspan=2 align=center>Total <td>Rs:".$t;
           echo "<tr><td colspan=12 align=center style=font-size:22px;><b> Thankyou for shopping with us....keep in touch";
           ?>

  </table>
<tr><td align=center style=font-size:30px;><B><a href='home.php'>Continue to Shopping</a></b></table>
<?php
  }

  ?>
</main></table>
<?php include 'footer.html'; ?>
=======

  <!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Transaction</title>
    <style>
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
        .navl{
            color:white;
            text-decoration:none ;
        }
        .navl:hover{
               color:yellow;
               text-decoration:underline;
               
        }
        main{
            margin-top:100px;
            padding-top:100px;
            width:100%;
            height:100%;
            justify-items:center;
            justify-content:space-evenly;
            background-color: bisque;
            font-family:'Times new roman';
            background-attachment: scroll;
        }
        head{
            height:100%;
            width:100%;

        }
       
        footer{
            bottom:0;
            width:100%;
            height:150px;
            align-items:bottom;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        table{
            width:80%;
            height:50% auto;
            color:blue;
            font-size:18px;
        }
        .login{
            color:white;
            font-style:bold;
        }
        .bill{
          
            border:2px solid black;
            font-weight:bolder;
            background-color:white;

        }

    </style>
        <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <div class='login'>
        <?php session_start(); if(isset($_SESSION['user'])){
            echo '<a class="login" style="padding-left:86%;">&#128526;'.$_SESSION["user"].'</a><a href="logout.php" class="login">|Logout</a> ';
        } else{?>
        <a href="login.php" class="navl" style="padding-left:86%;">Login|</a><a href="register.php" class="navl" target="__self">SignUp <i>&#xf2bd;</i></a><?php }?>
        </div>

        <div class="head">
      <h2 style="border-left:20px solid red;">Online Grocery Product Shopping&#128722;</h2>
              <h3 style="align:center;color:red;"><?php if(isset($msg)){ echo $msg; echo '<a href="login.php" style="color:white;">Login|</a>';}?></h3>
      
    </div>
     
    <ul class="nav" >
       <li><a href="home.php" class="navl" >Home</a></li>
       <li><a href="admin.php" class="navl">Admin</a></li>
       <li><a href="contant.php" class="navl">Contact</a></li>
       <li><a href="about.php" class="navl">About Us</a> </li>
    </ul>
    
</header>
<main>
    <table cellpadding=15px cellspacing=15px align=center>
        <tr><td>
<?php

include 'db.php';
    if(isset($_GET['mode']) && isset($_SESSION['amount'])){
        $mode=$_GET['mode'];
        $d=date('Y-m-d');
     if($mode=='online'){
         $s="insert into payment (userid,paymode,amount,day)values('$_SESSION[user]','$mode','$_SESSION[amount]','$d');";
         $re=mysqli_query($con,$s);
         if($re){
            echo "<script/type=javascript>
                     alert('Payment Successfully....');
                     </script>";
         }
     }
     else{
        $s="insert into payment (userid,paymode,amount,day)values('$_SESSION[user]','$mode','$_SESSION[amount]','$d'); ";
        $re=mysqli_query($con,$s);
        if($re){
            echo "<script/type=javascript>
                     alert('Order Succussfully Placed..');
                     </script>";
        }
     }
     if($re){
        $t="select tranid from payment where userid='$_SESSION[user]';";
        $r=mysqli_query($con,$t);
        while($r1=mysqli_fetch_array($r)){
            $tra=$r1['tranid'];}
            $cart="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
           $re=mysqli_query($con,$cart);
          while($ct=mysqli_fetch_array($re)){
              if($ct['protype']=='lose'){
                $u=$ct['prounit'];
                $q=$ct['unitpro'];
              }else{
                    $u=$ct['unitpro'];
                    $q=$ct['proqua'];
              }
              
              $insert="insert into transaction (tranid,userid,proid,proname,proquan,mesureby,prounit,proprice,total,type) values('$tra','$_SESSION[user]','$ct[proid]','$ct[proname]','$q','$ct[measure]','$u','$ct[proprice]','$ct[total]','$ct[protype]');";
              $in=mysqli_query($con,$insert);
              echo mysqli_error($con);
              if($ct['protype']=='package'){
                $update="UPDATE `product` SET  `prounit`=GREATEST(0,`prounit`-'$ct[unitpro]') WHERE  proid='$ct[idpro]';";
              }elseif($ct['protype']=='lose'){
                $update="UPDATE `product` SET  `proqua`=GREATEST(0,`proqua`-'$ct[unitpro]') WHERE  proid='$ct[idpro]';";
              }
               $r=mysqli_query($con,$update);
              }
     }
     $del="delete from cart where userid='$_SESSION[user]';";
     $d=mysqli_query($con,$del);
     unset($_SESSION['amount']);
  }
  if(isset($in)){
  ?>
  <table cellpadding=20 cellspaceing=1 align=center class=bill>
  <tr><th align=center colspan=12 style=font-size:30px;>Online Grocery Mart</th>
    <tr><th align=center colspan=12 style=font-size:30px;> Invoice Bill</th>
        <?php
         $s="select * from user where user_id='$_SESSION[user]';";
         $re=mysqli_query($con,$s);
         while($order=mysqli_fetch_array($re)){
           $name=$order['cname'];
           $ph=$order['cphone'];
           $pin=$order['cpin'];
           $add=$order['caddress'];
            }
            $d=date('Y-m-d,H:ia');
    echo "<tr><td>Name:<td>".$name."<td colspan=8><td>Date:<td>".$d."
    <tr><td>Phone No:<td>".$ph."<td colspan=8>
    <tr><td>address:<td>".$add.-$pin."<td colspan=8>";
    ?>
    <tr><td colspan=12><hr>
    <tr><td>sno<td colspan=3>Product Name<td colspan=3>Product weight<td>Price <td colspan=2>Unit<td colspan=3>Total Price
    <?php
           $tr="select * from payment inner join transaction on payment.tranid=transaction.tranid where transaction.tranid='$tra';";
           $tr1=mysqli_query($con,$tr);
           $i=1;
           while($tr2=mysqli_fetch_array($tr1)){
               echo "<tr><td>".$i.".";
               echo "<td colspan=3>".$tr2['proname'];
               echo "<td colspan=3>".$tr2['proquan'];
               echo "<td >Rs.".$tr2['proprice'];
               echo "<td colspan=2>".$tr2['prounit'];
               echo "<td colspan=3>Rs.".$tr2['total'];
               $i+=1;
               $t=$tr2['amount'];
           }
           echo " <tr><td colspan=12><hr>";
           echo "<tr><td colspan=8><td colspan=2 align=center>Total <td>Rs:".$t;
           echo "<tr><td colspan=12 align=center style=font-size:22px;><b> Thankyou for shopping with us....keep in touch";
           ?>

  </table>
<tr><td align=center style=font-size:30px;><B><a href='home.php'>Continue to Shopping</a></b></table>
<?php
  }

  ?>
</main></table>
<?php include 'footer.html'; ?>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
 </html>