<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <style>
        header{
            width:100%;
            height:25%;
            overflow:hidden;
            position:fixed;
            top:0;
            align-items:center;
            background-color: rgb(0, 79, 153);
            color:white;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            background-image:url("19.jpg");
            background-repeat:no-repeat;
            background-size:100% 100%;
        }
        .head{
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color:white;
            display:inline-block;
            padding-top:20px;
        }
        main{
            margin-top: 160px ;
            
            overflow:hidden;
            background-color: bisque;
            background-attachment: scroll;
        }
        .category{
            background-color: bisque;
            align-items:center;
            justify-items: center;
            justify-content: space-evenly;
            padding:20px;
        }
        .product{
            background-color:#ff7f50 ;
            width:200px;
            height:200px;
            border-radius: 10px;
            box-shadow:0 10px 20px 10px lightsalmon ;
            align-items: center;
            display:flex;
            justify-content:space-evenly;
        }
        .itemlk{
            color:white;
            font-weight: bold;
           
            text-decoration:none;
        }
        .itemlk:hover{
            color:red;
        }
        .product:hover{
            box-shadow:20px;
            cursor:pointer;
            transform:scaleY(1.2);
            background-color: rgb(194, 32, 183);
        }
        footer{
            bottom:0;
            width:100%;
            min-height:150px;  
            background-color: darkslateblue;
        }
        .fotcon{
            
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
       .box{
        padding:20px;
        background-color:lightblue;
       }
       .alert{
        border:2px solid red;
        text-decoration:none;
        font-size:20px;
       }
       .vi{
        padding-left:900px;
       }
    </style>
</head>
<body>
   
    <header>
        <div class="head">
      <h2 style="border-left:20px solid red;">Online Grocery Product Shopping&#128722;</h2>
       <h2>Admin Panal</h2>
       <h3 class=vi> No of Today website Visiters: <?php session_start(); echo $_SESSION['ucount'];?></h3>
    </div>
    
</header>
<main>
 <h2>Dashboard</h2>
<div class="category">
<table   cellpadding="25px"cellspaceing="10px" >
    <form action="" method="post">
     <tr>
        <td ><div class="product"><a href="addproduct.php" class="itemlk" name="adpro"> Add Product</button></div></td>
        <td><div class="product"><a href="viewcustomer.php" class="itemlk"  name="cusde">View customer Details</a></div></td>
        <td><div class="product"><a href="stockdetails.php" class="itemlk" name="stde" >Stock Details</a></div></td>
        <td><div class="product"><a href="viewtransaction.php" class="itemlk" name="trade">Transaction Details</a></div></td>
        <td><div class="product"><a href="home.php" class="itemlk" name="trade">Go Home Page</a></div></td>
    </tr>
   
    </form>
</table>
</div>

</main>
<?php 

include 'db.php';
$f=0;
$s="select * from product where (protype='package' AND prounit<=10) OR (protype='lose' AND proqua<=20) ;";
$r=mysqli_query($con,$s);
echo mysqli_error($con);
if(mysqli_num_rows($r)>0){
    
echo "<div class=box><table cellpadding=20px align=center class=alert border=2px>
    <tr align=center ><th colspan=2 >Some products are below 10 units please check it Down
    <tr align=center><th>Product Name<th>Unit</tr>";
while($r1=mysqli_fetch_array($r)){
 if($r1['protype']=='package'){
    if($r1['prounit']<=10){
        echo "<tr align=center><td>".$r1['proname']."<td>".$r1['prounit'];
     }
 }
 else{
    if($r1['proqua']<=20){
        echo "<tr align=center><td>".$r1['proname']."<td>".$r1['proqua'];
    }
 }
 
}
echo "<tr><td colspan=2 align=center><a href=stockdetails.php >Stock Details</a></table>";
}
?>




</div>
<footer>
    <div class="fotcon">
        <h2>About Us </h2>
        <h3> 40A North Car street<br>Tirunelveli Town-627454.</br>
   </div>
</footer>
</body>
</html>
