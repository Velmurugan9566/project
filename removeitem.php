<?php
include 'db.php';
session_start();
    if(isset($_GET['sno'])){
         $s="delete  from cart where idpro='$_GET[sno]' and userid='$_SESSION[user]';";
         $re=mysqli_query($con,$s);
          if(isset($re)){
               header('location:cart.php');
          }
    
     }
     if(isset($_GET['id'])){
          echo "hello";
          $s="delete  from product where proid='$_GET[id]';";
          $re=mysqli_query($con,$s);
           if(isset($re)){
                header('location:stockdetails.php');
           }
     
      }


     ?>