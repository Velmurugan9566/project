<<<<<<< HEAD

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <style>
        main{
            margin-top: 180px ;
            min-height:500px auto;
            width:100%;
            height:100%;
            justify-items:center;
            justify-content:space-evenly;
            background-color: bisque;
            background-repeat:no-repeat;
            background-attachment: scroll;
            font-size:16px;
            font-family:'Times New Roman';
        }
        head{
            height:100%;
            width:100%;

        }
       
        footer{
            bottom:0;
            width:100%;
            height:150px;
            align:bottom;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        table{
            width:50%;
            height:50% auto;
            color:blue;
        }
        .login{
            color:white;
            font-style:bold;
        }
       .pay{
        text-decoration:none;
        font-size:18px;
        text-transform:uppercase;
       }
       .pay:hover{
       background-color: white;
       }
       .co{
        background-color:lightblue;
        width:100px;
        border-radius:2rem;
        height:40px;
       }
        a:hover{
            cursor:pointer;
        }
    </style>
        <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
   <?php include 'header.php'; ?>
<main>
       <?php
       if(!isset($_SESSION['user'])){
        echo '<p align=center> Not login please login first...<a href=login.php class=pay>Login</a></p>';
       }
       include "db.php";
       $_SESSION['las']=$_SERVER['REQUEST_URI'];
         if(isset($_SESSION['user'])){
           if(isset($_GET['amount'])){
            echo "<form action='' method=POST>";
            GLOBAL $flag;
            echo "<table align=center cellpadding=15px cellspacing=15px>";
             $count1=0;$count2=0;
            //product checking ....
            $cart="select * from product right join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
            $check=mysqli_query($con,$cart);
             while($row=mysqli_fetch_array($check)){
                $flag=1;
                $id=$row['idpro'];
                $uni=$row['unitpro'];
                //check it is available..
                if($row['proname']==null){
                    $count1+=1;
                    $remove1="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                    $re1=mysqli_query($con,$remove1);}
                     
                //check quantity....
                     if($row['protype']=='lose'){
                        if($row['unitpro']>$row['proqua']){
                            $remove2="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                            $re2=mysqli_query($con,$remove2);
                            $count2+=1;
                        }
                     }
                     else{
                        if($row['unitpro']>$row['prounit']){
                            $remove2="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                            $re2=mysqli_query($con,$remove2);
                            $count2+=1;
                        }
                    }
                 }
                 //message for outoff stock...
                 if(isset($re2)){
                    $flag=0;
                   echo "<tr><td>".$count2." product removed from your cart...Because of Outoff stock..<br>";
                }
                //message for not available..
                 if(isset($re1)){
                    echo "<tr<td>".$count1.": product removed from your cart... Because of Not available..<br>";
                    $flag=0;
                 }
               if($flag==0){
                echo "<tr><td><a href=cart.php>Preview your Cart</a>";
                echo "<td><td><td><input type=submit value='Continue to Pay' name=pay><br>";
            }
              echo "</form>";
           }
             $t="select sum(total) from cart where userid='$_SESSION[user]';";
             $r=mysqli_query($con,$t);
             while($r1=mysqli_fetch_array($r)){
             $_SESSION['amount']=$r1['sum(total)'];}
             global $flag;
        if($flag==1 || isset($_POST['pay'])){
            echo "<tr><td>User Id:". $_SESSION['user']."
                  <td>Total Amount is Rs:".$_SESSION['amount'];
            $s="select * from user where user_id='$_SESSION[user]';";
            $re=mysqli_query($con,$s);
            while($order=mysqli_fetch_array($re)){
              $name=$order['cname'];
              $ph=$order['cphone'];
              $pin=$order['cpin'];
              $add=$order['caddress'];
               }
            ?>
            <tr><td><p><b><u>Conform to delivery to this Address<td><a class=pay onclick=window.location.href='profileupdate.php'>Edit Address</a><br></u>
                       <?php 
                      
                            echo "<tr><td>".$name."<br>";
                            echo "<tr><td>".$ph."<br>";
                            echo "<tr><td>".$add."<br>";
                            echo "<tr><td>".$pin."<br>";                       
                echo "<tr><td><td><a  class=pay href=payment.php?bar=35>Procced to pay</a>";
    }
    

             if(isset($_GET['bar'])){              
    ?>
    <table cellpadding=20px cellspaceing=20  class='box' align=center>
        <tr>  <form action="" method="post">
        <td>User Id: <?php  echo $_SESSION['user'];?>&nbsp;&nbsp;&nbsp;&nbsp;
          Total Amount is Rs: <?php if(isset($_SESSION['amount'])) { echo $_SESSION['amount'];}?>
           <tr><td><b>Pay Online Card Payment<input type=radio name=option id=select value=online onchange='this.form.sumbit();'>
           <tr><td><b>Case On Delivery<input type=radio name=option  value=offline >
           <tr><td><input type=button class=co value=Cancel onclick=window.location.href='cart.php'><td><input type=submit name=sub class=co value=Continue>
           <tr><td colspan=2><hr>
           </tr>
        </form>
    <?php
             }
            
         if(isset($_POST['sub'])){
            if(isset($_POST['option'])){
                if($_POST['option']=='online'){
                   
                    ?>
          <form action="transaction.php?mode=online" method="post">
          <tr><td>Debit Card/Credit Card
           
           <tr><td>Enter your Card Number
           <tr><td colspan=2 style="width:100%;"><input type="text" inputmode=numeric name=cnumber  pattern='[0-9]{16}' maxlength="16" placeholder="enter 16 digit card number"  required title='exact 16 digit number are allowed'>
           <tr><td>Expiry Date <td>CCV Number
           <tr><td><input type="month"  name=expno  min="<?php  echo date('Y-m');?>" required placeholder="Month/Year format" required>
           <td><input type="password" inputmode=numeric  name=cvv maxlength=3 required placeholder="3 digit Number Behind Your card" pattern="[0-9]{3}" required>
           <tr><td><a href=transaction.php?mode=online ><input type="submit"  name=onlinepay class=co value=pay required></a>
                </form>
            <?php
            }
              else{
              ?>
              <tr><td><p class=h><b><u>Product will be delivered in this  Address</p><br></u>
                         <?php 
                                include 'db.php';
                                $s="select * from user where user_id='$_SESSION[user]';";
                                $re=mysqli_query($con,$s);
                                while($order=mysqli_fetch_array($re)){
                                  $name=$order['cname'];
                                  $ph=$order['cphone'];
                                  $pin=$order['cpin'];
                                  $add=$order['caddress'];
                                   }
                                   echo "<tr><td>".$name."<br>";
                                   echo "<tr><td>".$ph."<br>";
                                   echo "<tr><td>".$add."<br>";
                                   echo "<tr><td>".$pin."<br>";
                       echo "<tr><td><td><a href=transaction.php?mode=offline>Procced to finish</a>"; 
                             
                        }


                            }}
                        }
                    ?>
    
    </table>

   

</main>
<?php include 'footer.html'; ?>
</body>
=======

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Payment</title>
    <style>
        main{
            margin-top: 180px ;
            min-height:500px auto;
            width:100%;
            height:100%;
            justify-items:center;
            justify-content:space-evenly;
            background-color: bisque;
            background-repeat:no-repeat;
            background-attachment: scroll;
            font-size:16px;
            font-family:'Times New Roman';
        }
        head{
            height:100%;
            width:100%;

        }
       
        footer{
            bottom:0;
            width:100%;
            height:150px;
            align:bottom;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        table{
            width:50%;
            height:50% auto;
            color:blue;
        }
        .login{
            color:white;
            font-style:bold;
        }
       .pay{
        text-decoration:none;
        font-size:18px;
        text-transform:uppercase;
       }
       .pay:hover{
       background-color: white;
       }
       .co{
        background-color:lightblue;
        width:100px;
        border-radius:2rem;
        height:40px;
       }
        a:hover{
            cursor:pointer;
        }
    </style>
        <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
   <?php include 'header.php'; ?>
<main>
       <?php
       if(!isset($_SESSION['user'])){
        echo '<p align=center> Not login please login first...<a href=login.php class=pay>Login</a></p>';
       }
       include "db.php";
       $_SESSION['las']=$_SERVER['REQUEST_URI'];
         if(isset($_SESSION['user'])){
           if(isset($_GET['amount'])){
            echo "<form action='' method=POST>";
            GLOBAL $flag;
            echo "<table align=center cellpadding=15px cellspacing=15px>";
             $count1=0;$count2=0;
            //product checking ....
            $cart="select * from product right join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
            $check=mysqli_query($con,$cart);
             while($row=mysqli_fetch_array($check)){
                $flag=1;
                $id=$row['idpro'];
                $uni=$row['unitpro'];
                //check it is available..
                if($row['proname']==null){
                    $count1+=1;
                    $remove1="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                    $re1=mysqli_query($con,$remove1);}
                     
                //check quantity....
                     if($row['protype']=='lose'){
                        if($row['unitpro']>$row['proqua']){
                            $remove2="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                            $re2=mysqli_query($con,$remove2);
                            $count2+=1;
                        }
                     }
                     else{
                        if($row['unitpro']>$row['prounit']){
                            $remove2="delete  from cart where idpro='$id' and userid='$_SESSION[user]';";
                            $re2=mysqli_query($con,$remove2);
                            $count2+=1;
                        }
                    }
                 }
                 //message for outoff stock...
                 if(isset($re2)){
                    $flag=0;
                   echo "<tr><td>".$count2." product removed from your cart...Because of Outoff stock..<br>";
                }
                //message for not available..
                 if(isset($re1)){
                    echo "<tr<td>".$count1.": product removed from your cart... Because of Not available..<br>";
                    $flag=0;
                 }
               if($flag==0){
                echo "<tr><td><a href=cart.php>Preview your Cart</a>";
                echo "<td><td><td><input type=submit value='Continue to Pay' name=pay><br>";
            }
              echo "</form>";
           }
             $t="select sum(total) from cart where userid='$_SESSION[user]';";
             $r=mysqli_query($con,$t);
             while($r1=mysqli_fetch_array($r)){
             $_SESSION['amount']=$r1['sum(total)'];}
             global $flag;
        if($flag==1 || isset($_POST['pay'])){
            echo "<tr><td>User Id:". $_SESSION['user']."
                  <td>Total Amount is Rs:".$_SESSION['amount'];
            $s="select * from user where user_id='$_SESSION[user]';";
            $re=mysqli_query($con,$s);
            while($order=mysqli_fetch_array($re)){
              $name=$order['cname'];
              $ph=$order['cphone'];
              $pin=$order['cpin'];
              $add=$order['caddress'];
               }
            ?>
            <tr><td><p><b><u>Conform to delivery to this Address<td><a class=pay onclick=window.location.href='profileupdate.php'>Edit Address</a><br></u>
                       <?php 
                      
                            echo "<tr><td>".$name."<br>";
                            echo "<tr><td>".$ph."<br>";
                            echo "<tr><td>".$add."<br>";
                            echo "<tr><td>".$pin."<br>";                       
                echo "<tr><td><td><a  class=pay href=payment.php?bar=35>Procced to pay</a>";
    }
    

             if(isset($_GET['bar'])){              
    ?>
    <table cellpadding=20px cellspaceing=20  class='box' align=center>
        <tr>  <form action="" method="post">
        <td>User Id: <?php  echo $_SESSION['user'];?>&nbsp;&nbsp;&nbsp;&nbsp;
          Total Amount is Rs: <?php if(isset($_SESSION['amount'])) { echo $_SESSION['amount'];}?>
           <tr><td><b>Pay Online Card Payment<input type=radio name=option id=select value=online onchange='this.form.sumbit();'>
           <tr><td><b>Case On Delivery<input type=radio name=option  value=offline >
           <tr><td><input type=button class=co value=Cancel onclick=window.location.href='cart.php'><td><input type=submit name=sub class=co value=Continue>
           <tr><td colspan=2><hr>
           </tr>
        </form>
    <?php
             }
            
         if(isset($_POST['sub'])){
            if(isset($_POST['option'])){
                if($_POST['option']=='online'){
                   
                    ?>
          <form action="transaction.php?mode=online" method="post">
          <tr><td>Debit Card/Credit Card
           
           <tr><td>Enter your Card Number
           <tr><td colspan=2 style="width:100%;"><input type="text" inputmode=numeric name=cnumber  pattern='[0-9]{16}' maxlength="16" placeholder="enter 16 digit card number"  required title='exact 16 digit number are allowed'>
           <tr><td>Expiry Date <td>CCV Number
           <tr><td><input type="month"  name=expno  min="<?php  echo date('Y-m');?>" required placeholder="Month/Year format" required>
           <td><input type="password" inputmode=numeric  name=cvv maxlength=3 required placeholder="3 digit Number Behind Your card" pattern="[0-9]{3}" required>
           <tr><td><a href=transaction.php?mode=online ><input type="submit"  name=onlinepay class=co value=pay required></a>
                </form>
            <?php
            }
              else{
              ?>
              <tr><td><p class=h><b><u>Product will be delivered in this  Address</p><br></u>
                         <?php 
                                include 'db.php';
                                $s="select * from user where user_id='$_SESSION[user]';";
                                $re=mysqli_query($con,$s);
                                while($order=mysqli_fetch_array($re)){
                                  $name=$order['cname'];
                                  $ph=$order['cphone'];
                                  $pin=$order['cpin'];
                                  $add=$order['caddress'];
                                   }
                                   echo "<tr><td>".$name."<br>";
                                   echo "<tr><td>".$ph."<br>";
                                   echo "<tr><td>".$add."<br>";
                                   echo "<tr><td>".$pin."<br>";
                       echo "<tr><td><td><a href=transaction.php?mode=offline>Procced to finish</a>"; 
                             
                        }


                            }}
                        }
                    ?>
    
    </table>

   

</main>
<?php include 'footer.html'; ?>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>