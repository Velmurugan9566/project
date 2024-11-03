<<<<<<< HEAD
<?php 
if(isset($_GET['op'])){
    $op= $_GET['op'];
    $id= $_GET['id'];
    echo $op;
    echo $id;
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
=======
<?php 
if(isset($_GET['op'])){
    $op= $_GET['op'];
    $id= $_GET['id'];
    echo $op;
    echo $id;
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
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
    ?>