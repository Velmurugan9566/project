<?php 
  function insertit($i,$u,$ty,$t){
    $user=$_SESSION['user'];
    include 'db.php';
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
            if($r['unitpro']+$u>100){
              echo "<script type/javascript>
              alert('Per Product Shopping limit is reached');
              </script>";
                die();
                
              }
             if(($u+$r['unitpro'])>$proqu){
                echo "<script type/javascript>
                alert('Product stock limit is reached');
                </script>";
            
               die();
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
             $sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           }
           else{
            if($r['unitpro']+$u>20){
              echo "<script type/javascript>
              alert('Per Product Shopping limit is reached');
              </script>";
             die();
             
            }
             if(($u+$r['unitpro'])>$proun){
                echo "<script type/javascript>
                alert('Product stock limit is reached');
                </script>";
               die();
             }
             $u+=$r['unitpro'];
             $t+=$r['total'];
             
           $sql="UPDATE `cart` SET  `unitpro`='$u',`total`='$t'  WHERE userid='$user' AND idpro='$i';";
           }
           $return=mysqli_query($con,$sql);
              if(!$return){
                 echo "<script type/javascript>
                    alert('Product Not added');
                    </script>";
               }
              else{
                die ("<script type/javascript>
                    alert('Product Added to Cart');
                    </script>");
              }

       } header('location:'.$_SERVER['HTTP_REFERER']);

     }
     else{
      if($ty=='package'){
      if($u>20){
        echo "<script type/javascript>
        alert('Per Product Shopping limit is reached');
        </script>";
       die();
      }}
      else{
      if($u>100){
        echo "<script type/javascript>
        alert('Per Product Shopping limit is reached');
        </script>";
          die();
          
        }
      }
    $sql="insert into cart(idpro,userid,unitpro,total)values('$i','$user','$u','$t');";
    $return=mysqli_query($con,$sql);
       if(!$return){
          echo "<script type/javascript>
             alert('Product Not added');
             </script>";
        }
       else{
         die ("<script type/javascript>
             alert('Product Added to Cart');
             </script>");
       }
     }
     header('location:'.$_SERVER['HTTP_REFERER']);
 }
 ?>