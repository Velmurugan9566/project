<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Details</title>
    <style>
       
        aside{
          top:0;
          left:0;
          width:150px;
          position:fixed;
          height:100%;
          background-color:pink;
        }
       .form {
        width:100%;
       }
       .in{
       
        padding-left:50px;
       }
       .in input[type],select{
            border:2px solid black;
            height:20px;
            width:50%;
            font-weight:bold;
       }
       main{
        padding-left:150px;
       }
    </style>
</head>
<body>
  <?php include 'adhead.html'; ?>
    
    <aside>
      </aside>
      <main>
        <h2 align=center>Update stock details</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="in">
        <table class="form" cellpadding=20>
           
            <?php 
             if(isset($_GET['proid'])){
                $id=$_GET['proid'];
              include 'db.php';
              $r="select * from product where proid='$id';";
               $re=mysqli_query($con,$r);
               
               while($row=mysqli_fetch_array($re)){
                $im=$row['proimg'];
                echo " <tr><td >Product Id<td><input type=text value=".$row['proid']." readonly>
                        <td colspan=2><img src=data:image/jpg;charset=utf8;base64,".base64_encode($im)." width=100% height='150px auto' alt='No
                        Image'><tr><td><td><td colspan=2 rowspan=2>Change image<input type=file accept=image/*  name=proimg>
                <tr><tr> <td>Product Name<td><input type=text class=nam value='".$row['proname']."' readonly>
                <tr><td> Product Category<td><input type=text value='".$row['procate']."' readonly>

                <tr><td colspan=2 align=center>update price , Avilability ,Describtion
                <tr><td> Product Price(per unit)<td><input type=number required  value='".$row['proprice']."'  min=0 name=price required>";
                if($row['protype']=="lose"){
                  echo " <tr><td> Add stock<td><input type=hidden  value='".$row['prounit']."' name=quan >
                             <input type=number  value='".$row['proqua']."'  pattern='[0-9]{1,7}' name=quan required>";
                }
                else{
                  echo "<tr><td> Add stock<td><input type=number value='".$row['prounit']."' pattern='[0-9]{1,7}' min=0 name=unit><input type=hidden  value='".$row['proqua']."' name=quan >";
                               
                }
                echo "<tr><td> Describtion<td><textarea rows=4 cols=35  name=des style='resize:none'>".$row['prodes']."</textarea>";
                    }                
  ?>
           <tr><td colspan=3><input type=submit name=s value=update>
            </form>
            <?php
               if(isset($_POST['s'])){
                $price=$_POST['price'];
                $unit=$_POST['unit'];
                $des=$_POST['des'];
                
                if(!empty($_FILES['proimg']['name'])){
                  $image=basename($_FILES['proimg']['name']);
                  $image_type=pathinfo($image,PATHINFO_EXTENSION);
                  if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
                   $img=$_FILES['proimg']['tmp_name'];
                   $img=addslashes(file_get_contents($img));
                   $sq="UPDATE `product` SET `proimg`='$img' WHERE  proid='$id';";
                   $re=mysqli_query($con,$sq);
                }
                  else{
                    die ("<script type/javascript>
                  alert('only jpg,png,jpeg,gif photos are allowed ');
                  </script>");
                }}
               $sql="UPDATE `product` SET  `prounit`='$unit',`proprice`='$price',`prodes`='$des',`proqua`='$_POST[quan]' WHERE  proid='$id';";
             
               $r=mysqli_query($con,$sql);
               if(isset($r)){
                echo "<script type/javascript>
                alert('Update Successfully');
                </script>"; 
               }
               else{
                die('not update');
               }


               }
               }?>

  </table>
  </main>
</body>
</html>