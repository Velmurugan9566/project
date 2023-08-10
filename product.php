
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>product </title>
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
            max-height:400px;
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
            margin-top:20px;
            background-color: #49e819;
            width: 100%;
            height:30px;
            font-weight:bolder;
            font-size:18px;
        }
.bt{
   width:100%;
    background-color:yellow;
    font-weight:bolder;
}
    </style>
     <link rel="stylesheet" type="text/css" href="headcss.css">
</head>
<body>
   <?php include "header.php";?>
<main>
<div class=note><marque>Our Products .....</marquee></div>

  <?php 
              $_SESSION['lst']=$_SERVER['REQUEST_URI'];
       
             if(isset($_GET['cate'])){
                echo '<h2>'.$_GET['cate'].'</h2>';
                echo '<table   cellpadding="25px"cellspaceing="10px" ><tr>';
             include 'db.php';
               $r="select * from product where procate='$_GET[cate]';";
               $re=mysqli_query($con,$r);
               $c=0;
               while($row=mysqli_fetch_array($re)){  
                   
                    $i=trim($row['proid'],'/');
                    $n=trim($row['proname'],'/');
                    $u=$row['prounit'];
                    $p=$row['proprice'];
                    $q=$row['proqua'];
                    $m=$row['measure'];
                    $type=$row['protype'];
                    $d=$row['prodes'];
                    $im=$row['proimg'];
                        if($c%4==0){echo "<tr>"; $c=0;}
                        $c+=1;
                 echo "<td><form action='' method=post>
                 <table class='product' >
                 <tr><td colspan=4><img src=data:image/jpg;charset=utf8;base64,".base64_encode($im)." width=100% height='150px auto' alt='No
                 Image'>
                 <tr><td><p align=center><b>".$n."</p>
                 <tr><td><p id='show'><strong>Price :".$p."</p>";
                 if($type =='lose' && $m =='kg'){
                    echo "<tr><td>Select Quantity: <input type=number name='qu' min=.500 max=".$q."  step=.500  required title='our stock is over'/>".$m;
                    echo "<input type=hidden value=".$u." name='unit'  />";
                 }
                 elseif($type =='lose' && $m =='gm'){
                    echo "<tr><td><input type=number name='qu' min=1 max=".$q."  step=.100  required title='our stock is over'/>".$m;
                    echo "<input type=hidden value=".$u." name='unit'  />";
                 }
                 elseif($type =='lose' && $m =='ml'){
                    echo "<tr><td><input type=number name='qu' min=1 max=".$q."  step=.100  required title='our stock is over'/>".$m;
                    echo "<input type=hidden value=".$u." name='unit'  />";
                 }
                 else{
                   echo "<tr><td>Quantity :<input type='text' name=qu readonly value=".$q.$m.">
                   <tr><td>Select Unit: <input type=number name='unit' min=1 max=".$u." value=1 required title='our stock is over'/>";
                 }
                  echo "<tr><td><p>". $d."</p>
                  
                 <input type=hidden name='id' value=".$i."/>
                 <input type=hidden name='price' value=".$p."/>
                 <input type=hidden name='type' value=".$type."/><input type=hidden name='measure' value=".$m."/>";
             
                 if($u>0 && $q>0){
                  echo "<tr><td><input type='submit' name='cart' value='Add to Cart' class=bt />";
                 }
                 else{
                   echo "<tr><td colspan=2 align=center ><button>Out of Stock</button>";
                 }
                 echo "</table></form>"; 
              } 

            }

            if(isset($_POST['cart'])){
           
                $i=trim($_POST['id'],'/');
                 $p=$_POST['price'];
                 $ty=trim($_POST['type'],'/');
                 $d=date('Y-m-d,H:i:s');
                if($ty=='lose'){
                 $u=(float)$_POST['qu'];
                (float)$t=(int)$p * (float)$u;
                }
                else{
                 $u=(int)$_POST['unit'];
                 $t=(int)$p * (int)$u;
                }
                if(!isset($_SESSION['user'])){
                 echo "<script type/javascript>
                 alert('Not Yet Login Please Login first');
                 
                 </script>";  
                 $er='login first';
                }
                else{
              require 'addcart.php';
              insertit($i,$u,$ty,$t);
                }
 
            }
            
      
           ?>
         
      
          </tr>
</table>
</div>
</main>
<?php include 'footer.html';?>
</body>
</html>