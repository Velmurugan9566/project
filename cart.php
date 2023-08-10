
<!DOCTYPE html>
<head>
    <title>Cart</title>
    <style>
         
        
        main{
            margin-top: 200px ;
            align-items:center;
            width:100%;
            justify-items: center;
            justify-content: space-evenly;
            
            overflow:auto;
            background-color: bisque;
            
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
            width:100%;
            min-height:400px auto;
        }
        main a{
            color:white;
            font-size:20px;
            text-decoration:none;
        }
        .login{
            color:white;
            font-style:bold;
        }
      
        #bt2{
            border:1px solid black;
            font-style:bold;
            font-size:18px;
            width:20px;
            height:25px;
            background-color:#ff5800;
            cursor:pointer;
        }
        #bt2:hover{
            background-color:#f8d568;
        }
        #txt{
            padding:2px;
            border:1px solid black;
            text-align:center;
            font-size:16px;
            width:30px;
            height:20px;
        }
        table{
            border-collapse:collapse;
             width:100%;
             vertical-align:middle;
        }
        td,th{
            border:2px solid black;
            font-family:'Times new Roman';
            font-size:20px;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="headcss.css">
    <script type/javascript>
    function fun(){
        alert('some products are not available so remove it first');
    }
    </script>

</head>
<body>
<?php include "header.php";


?>

<main>
    <table cellpadding=20px  border='5px solid black' class=tb>
        <tr>
            <th>Serial Number</th>
           <th>Product Name</th>
           <th>Product Weight</th>
           <th>Total Unit</th>
           <th>Product Price(per unit)</th>
           <th>Total Price</th>
           <th>Remove</th>
    </tr>

    <?php
    
    if(!isset($_SESSION['user'])){
        echo "<tr><td colspan=9 align=center><b>Not Yet Login Please Login first";
    }
    else{
       include "db.php";
        include 'totalcheck.php';
        $last=$_SESSION['lst'];
       $s="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
       $re=mysqli_query($con,$s);
       $i=0;
       $amount=0;
       $flag=0;
       $f=0;
        while($row=mysqli_fetch_array($re)){
            //check quantity....
            if($row['protype']=='lose'){
              
                if($row['unitpro']>$row['proqua']){
                   $flag=1;
                }
             }
             else{
                if($row['unitpro']>$row['prounit']){
                    $flag=1;
                }
            }
            $i+=1;
             if($flag==1){
                echo "<tr style=background-color:gray; align=center><td >".$i;
             }else{
                echo "<tr align=center><td >".$i;
               }
            
             echo "<td>".$row['proname'];
             if($row['protype']=='lose'){
                echo "<td>".$row['unitpro'].$row['measure'];
                echo "<td><button id=bt2 onclick=location.href='cart.php?op=sub&id=".$row['idpro']."'; >-</button><input type=text readonly value=".$row['unitpro']." id=txt /><button id=bt2 onclick=location.href='cart.php?op=add&id=".$row['idpro']."';>+</button>";
             }else{
             echo "<td>".$row['proqua'].$row['measure']."
                   <td><button id=bt2 onclick=location.href='cart.php?op=sub&id=".$row['idpro']."'; >-</button><input type=text readonly value=".$row['unitpro']." id=txt /><button id=bt2 onclick=location.href='cart.php?op=add&id=".$row['idpro']."';>+</button>";
             }
             echo "<td>$".$row['proprice'];
             echo "<td>".$row['total'];
             if($flag==1){
                echo "<td align=center ><a href=removeitem.php?sno=".$row['idpro'].">Please remove the item <br>because of not available&#10060;</a>";
                $f=1;
             }
             else{
            echo  "<td align=center><a href=removeitem.php?sno=".$row['idpro'].">&#10060;</a></tr>"; }
             $amount+=$row['total'];
             $flag=0;
       }
          
       
    if(mysqli_num_rows($re)>0){
        echo "<tr><td colspan=7><tr><td colspan=6 align=center><b> Sub Total<td>".$amount;
    ?>

   
   <tr><td colspan=3><td colspan=2 bgcolor=blue><a onclick=window.location.href='<?php echo $last; ?>'>Continue To Shoping</a> 
   <td colspan=2 bgcolor=blue>
    <?php 
    if($f==1){
        echo "<a onclick='fun();' href=#>Place Order</a>";
    }
    else{
       echo "<a href=payment.php?amount=".$amount." >Place Order</a></h2></tr>";
    }
   
     }
        else{
            echo "<tr><td colspan=7><tr><td colspan=6 align=center> <b>Your cart is empty...</b><a href=home.php style=color:black>shop<td>";
        }

            ?>
        <?php 
        
if(isset($_GET['op'])){
    $op= $_GET['op'];
    $id= $_GET['id'];
    $t=0;
     include 'db.php';
     $uni="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]' AND cart.idpro='$id';";
     $find=mysqli_query($con,$uni); 
     while($r=mysqli_fetch_array($find)){
            //product table fetch quantity
          $proqu=$r['proqua'];
          $proun=$r['prounit'];
          $ty=$r['protype'];
        
    if($op=='add'){
     
      if($ty=='lose'){
        if($r['unitpro']+1>$proqu){
          echo "<script type/javascript>
          alert('Product limit is reached');
          </script>";
         die();
         
        }
        if($r['unitpro']+1>100){
          echo "<script type/javascript>
          alert('Per Product Shopping limit is reached');
          </script>";
            die();
            
          }
           
      }
      else {
      if($r['unitpro']+1>$proun){
        echo "<script type/javascript>
        alert('Product limit is reached');
        </script>";
       die();
       
      }
      if($r['unitpro']+1>20){
        echo "<script type/javascript>
        alert('Per Product Shopping limit is reached');
        </script>";
       die();
       
      }
    }
         $t=$r['total']+$r['proprice'];
        $update="UPDATE `cart` SET  `unitpro`=GREATEST(0,`unitpro`+1),`total`='$t' WHERE  idpro='$id' && userid='$_SESSION[user]';";
        $r=mysqli_query($con,$update);
        echo mysqli_error($con);
      
    }
    else{
      if($ty=='lose'){
        if($r['unitpro']-1<1){
            die();
          }
      }
      else if($r['unitpro']-1<1){
       die();
      }
      $t=$r['total']-$r['proprice'];
        $update="UPDATE `cart` SET  `unitpro`=GREATEST(0,`unitpro`-1),`total`='$t' WHERE  idpro='$id' && userid='$_SESSION[user]';";
        $r=mysqli_query($con,$update);
        echo mysqli_error($con);
            
    }
  }
}
 } ?>
        
   </table>

</main>
<?php include 'footer.html'; ?>
</body>
</html>