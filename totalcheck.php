<<<<<<< HEAD
<?php
      $s="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
      $re=mysqli_query($con,$s);
      while($row=mysqli_fetch_array($re)){
               $id=$row['idpro'];

               $u=(float)$row['unitpro'];
               $p=(float)$row['proprice'];
       (float)$t=(int)$p * (float)$u;
       $s1="UPDATE `cart` SET  `total`='$t' WHERE  idpro='$id' && userid='$_SESSION[user]';";
        $r1=mysqli_query($con,$s1);
    }
=======
<?php
      $s="select * from product inner join cart on product.proid=cart.idpro where cart.userid='$_SESSION[user]';";
      $re=mysqli_query($con,$s);
      while($row=mysqli_fetch_array($re)){
               $id=$row['idpro'];

               $u=(float)$row['unitpro'];
               $p=(float)$row['proprice'];
       (float)$t=(int)$p * (float)$u;
       $s1="UPDATE `cart` SET  `total`='$t' WHERE  idpro='$id' && userid='$_SESSION[user]';";
        $r1=mysqli_query($con,$s1);
    }
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
    ?>