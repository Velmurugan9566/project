<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile </title>
    <style>
       main{
            margin-top: 160px ;
            align-items:center;
            justify-items: center;
            justify-content: space-evenly;
            padding:20px;
            overflow:hidden;
            background-color: bisque;
            background-attachment: scroll;
            
        }
      
        .product{
            background-color: white;
            width:250px;
            height:300px;
            border-radius: 10px;
            color:black;
            box-shadow:0 10px 20px 10px lightsalmon ;
           
        } 
        .product input[type=text],input[type=number]{

            width:50px;
        
        }
        .product:hover{
            box-shadow:20px;
            cursor:pointer;
            transform:scale(1.1);
            background-color: rgb(194, 32, 183);
        }
        footer{
            bottom:0;
            width:100%;
            height:150px;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        body{
            width:100%;
            height:100%;
        }
        .login{
            color:white;
            font-size:18px;
        }   
        .note{
            background-color: #49e819;
            padding-top:20px;
            width: 100%;
            height:30px;
        }
  
        </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <div class="head">
      <h2 style="border-left:20px solid red;">Online Groosry Product Shooping&#128722;</h2>
       </div>
    </header>  
<main>
<table border=2 cellpadding=20 align=center>
  <tr>
    <th>Product name</th>
    <th>status</th>
  </tr>
<?php
session_start();
   include 'db.php';
   include 'addcart.php';
   echo $_GET['id'];
   $f=1;
   $histroy="select * from transaction where tranid='$_GET[id]';";
   $ans=mysqli_query($con,$histroy);
   while($his=mysqli_fetch_array($ans)){ 
    $i=$his['proid'];                            
          $ty=$his['type'];
          if($ty=='lose'){
            $u=$his['proquan']; 
          }
          else{
            $u=$his['prounit'];
           
          }
          $t=$his['total'];       
            echo mysqli_error($con);
           // insertit($i,$u,$ty,$t);
    $user=$_SESSION['user'];
    $uni="select * from cart where userid='$user' AND idpro='$i';";
    $find=mysqli_query($con,$uni); 
    if(mysqli_num_rows($find)>0){
           //product table fetch quantity
          $pro="select * from product where proid='$i';";
          $pro1=mysqli_query($con,$pro);
          while($p1=mysqli_fetch_array($pro1)){$proqu=$p1['proqua'];$proun=$p1['prounit'];}
          //product table fetch quantity
       while($r=mysqli_fetch_array($find)){
          
           if($ty=='lose'){
             if(($u+$r['unitpro'])>$proqu){
                echo "<tr><td>".$his['proname']."
                      <td>Product limit is reached so not added";
               $f=0;
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
             //$sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           }
           else{
             if(($u+$r['unitpro'])>$proun){
              echo "<tr><td>".$his['proname']."
              <td>Product limit is reached so not added";
               $f=0;
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
            }
            if($f==1){
           $sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           $return=mysqli_query($con,$sql);
              if(!$return){
                echo "<tr><td>".$his['proname']."
                <td>Product Not added";
               }
              else{
                echo "<tr><td>".$his['proname']."
                <td>Product Successfully added";
              }
            }

       }
       $f=1;
     }
     else{
      $pro="select * from product where proid='$i';";
          $pro1=mysqli_query($con,$pro);
          if(mysqli_num_rows($pro1)>0){
          while($p1=mysqli_fetch_array($pro1)){$proqu=$p1['proqua'];$proun=$p1['prounit'];
            if($ty=='lose'){
              if($u>$p1['proqua']){
                echo "<tr><td>".$his['proname']."
              <td>Product limit is reached so not added";
               $f=0;
              }
           }
           else{
              if($u>$p1['prounit']){
                echo "<tr><td>".$his['proname']."
                <td>Product limit is reached so not added";
                 $f=0;
              }
          }
          if($f==1){
          $sql="insert into cart(idpro,userid,unitpro,total)values('$i','$user','$u','$t');";
        $return=mysqli_query($con,$sql);
       if(!$return){
        echo "<tr><td>".$his['proname']."
           <td>Product Not added";
        }
       else{
        echo "<tr><td>".$his['proname']."
        <td>Product added to cart..";
       }
      }
          }
          $f=1;
        }else{
          echo "<tr><td>".$his['proname']."
           <td>Product Not available";
        }
   
     }
    
 }
 ?>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Profile </title>
    <style>
       main{
            margin-top: 160px ;
            align-items:center;
            justify-items: center;
            justify-content: space-evenly;
            padding:20px;
            overflow:hidden;
            background-color: bisque;
            background-attachment: scroll;
            
        }
      
        .product{
            background-color: white;
            width:250px;
            height:300px;
            border-radius: 10px;
            color:black;
            box-shadow:0 10px 20px 10px lightsalmon ;
           
        } 
        .product input[type=text],input[type=number]{

            width:50px;
        
        }
        .product:hover{
            box-shadow:20px;
            cursor:pointer;
            transform:scale(1.1);
            background-color: rgb(194, 32, 183);
        }
        footer{
            bottom:0;
            width:100%;
            height:150px;
            
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        body{
            width:100%;
            height:100%;
        }
        .login{
            color:white;
            font-size:18px;
        }   
        .note{
            background-color: #49e819;
            padding-top:20px;
            width: 100%;
            height:30px;
        }
  
        </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
    <header>
    <div class="head">
      <h2 style="border-left:20px solid red;">Online Groosry Product Shooping&#128722;</h2>
       </div>
    </header>  
<main>
<table border=2 cellpadding=20 align=center>
  <tr>
    <th>Product name</th>
    <th>status</th>
  </tr>
<?php
session_start();
   include 'db.php';
   include 'addcart.php';
   echo $_GET['id'];
   $f=1;
   $histroy="select * from transaction where tranid='$_GET[id]';";
   $ans=mysqli_query($con,$histroy);
   while($his=mysqli_fetch_array($ans)){ 
    $i=$his['proid'];                            
          $ty=$his['type'];
          if($ty=='lose'){
            $u=$his['proquan']; 
          }
          else{
            $u=$his['prounit'];
           
          }
          $t=$his['total'];       
            echo mysqli_error($con);
           // insertit($i,$u,$ty,$t);
    $user=$_SESSION['user'];
    $uni="select * from cart where userid='$user' AND idpro='$i';";
    $find=mysqli_query($con,$uni); 
    if(mysqli_num_rows($find)>0){
           //product table fetch quantity
          $pro="select * from product where proid='$i';";
          $pro1=mysqli_query($con,$pro);
          while($p1=mysqli_fetch_array($pro1)){$proqu=$p1['proqua'];$proun=$p1['prounit'];}
          //product table fetch quantity
       while($r=mysqli_fetch_array($find)){
          
           if($ty=='lose'){
             if(($u+$r['unitpro'])>$proqu){
                echo "<tr><td>".$his['proname']."
                      <td>Product limit is reached so not added";
               $f=0;
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
             //$sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           }
           else{
             if(($u+$r['unitpro'])>$proun){
              echo "<tr><td>".$his['proname']."
              <td>Product limit is reached so not added";
               $f=0;
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
            }
            if($f==1){
           $sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           $return=mysqli_query($con,$sql);
              if(!$return){
                echo "<tr><td>".$his['proname']."
                <td>Product Not added";
               }
              else{
                echo "<tr><td>".$his['proname']."
                <td>Product Successfully added";
              }
            }

       }
       $f=1;
     }
     else{
      $pro="select * from product where proid='$i';";
          $pro1=mysqli_query($con,$pro);
          if(mysqli_num_rows($pro1)>0){
          while($p1=mysqli_fetch_array($pro1)){$proqu=$p1['proqua'];$proun=$p1['prounit'];
            if($ty=='lose'){
              if($u>$p1['proqua']){
                echo "<tr><td>".$his['proname']."
              <td>Product limit is reached so not added";
               $f=0;
              }
           }
           else{
              if($u>$p1['prounit']){
                echo "<tr><td>".$his['proname']."
                <td>Product limit is reached so not added";
                 $f=0;
              }
          }
          if($f==1){
          $sql="insert into cart(idpro,userid,unitpro,total)values('$i','$user','$u','$t');";
        $return=mysqli_query($con,$sql);
       if(!$return){
        echo "<tr><td>".$his['proname']."
           <td>Product Not added";
        }
       else{
        echo "<tr><td>".$his['proname']."
        <td>Product added to cart..";
       }
      }
          }
          $f=1;
        }else{
          echo "<tr><td>".$his['proname']."
           <td>Product Not available";
        }
   
     }
    
 }
 ?>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
 <tr><td colspan=2 align=center><a href='cart.php'>..See your Cart..</a></tr>