<?php
   
   include 'db.php';
    if(isset($_POST['sub'])){
      $flag=1;
         //$img=$_POST['proimg'];
         $i=$_POST['prid'];
         $n=$_POST['prname'];
         $c=$_POST['prca'];
         $u=$_POST['prounit'];
         $p=$_POST['price'];
         $d=$_POST['prdes'];
         $q=$_POST['prqu'];
         $m=$_POST['measure'];
         $ty=$_POST['type'];
        
         if(isset($_FILES['proimg']['name'])){
         $image=basename($_FILES['proimg']['name']);
         $image_type=pathinfo($image,PATHINFO_EXTENSION);
         if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
          $img=$_FILES['proimg']['tmp_name'];
          $img=addslashes(file_get_contents($img));
           
           $flag=1;
            }
         else{
           die ("<script type/javascript>
                  alert('Only png jpg files are allowded');
                  </script>");
            $flag=0;
           $img="";
          }}
         $s="select proid from product where proid='$i';";
         $re=mysqli_query($con,$s);
          while($row=mysqli_fetch_array($re)){
               if($row['proid']==$i){
                die ("<script type/javascript>
                  alert('Product Id is already Exist');
                  </script>");
                  $flag=0;
                }
         }
         if($flag==1){
         $sql="insert into product(proid,proname,procate,proprice,proqua,measure,prounit,prodes,proimg,protype)values('$i','$n','$c','$p','$q','$m','$u','$d','$img','$ty');";
         $return=mysqli_query($con,$sql);
            if(!$return){
               echo "<script type/javascript>
                  alert('Data  not insert');
                  </script>";
              
             }
             else{
                echo "<script type/javascript>
                  alert('data Inserted successfully');
                  </script>";
              }
          }
        }
        // error_reporting(E_ALL^E_WARNING);
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
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
        padding-top:40px;
        padding-left:50px;
       }
       .in input[type],select{
            border-radius:2rem;
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
    <form action="" method="post" enctype="multipart/form-data">
        <div class="in">
        <table class="form" cellpadding=20>
             <tr><td>Product Name <td><input type="text" name='prname'  required placeholder=" Enter Product Name">
            <tr><td>Product ID <td><input type="text" name='prid' required placeholder="Enter Product Id" >
             <tr><td>Product category<td><select name='prca' required><option disabled selected>Select Category</option> 
              <?php  include 'db.php';
               $r='select distinct procate from product;';
               $re=mysqli_query($con,$r);
               while($row=mysqli_fetch_array($re)){
                    $a[]=$row['procate'];
              }foreach ($a as $i) {
                echo "<option value='".$i."'>".$i."</option>"; 
              }?>  
              </select>
              <tr><td><td> Add new category<a href=addcate.php>Here</a>
            <tr><td>Product Quantity <td><input type="number" name='prqu' min=1 pattern="[0-9]{1,7}" required placeholder="Enter Product Quantity"> 
            <tr><td>Measure By <td><input type="text" name='measure' pattern="[a-zA-Z]{1,5}" required placeholder="Ex. kg ,ml,gm"> 
           <tr><td>Product Price <td><input type="number" min=1 name='price' pattern="(?=.*\d\.){1,7}" required placeholder="Enter Product price">
           <tr><td>Product Description<td><textarea name='prdes' required placeholder="Enter Product Dscp.." rows='6' cols='60' style='resize:none' ></textarea>
           <tr><td>Product Unit<td><input type="number" min=1 name=prounit pattern="[0-9]{1,7}" required placeholder="Enter Product Unit">
           <tr><td>Product Image<td><input type="file" name=proimg  placeholder="Select Image" required>
           <tr><td>Manufacture Type <td><select name='type'><option  disabled selected>select type</option>
            <option value='package'>Package</option><option value='lose'>Lose</option></select>
            <tr> <td align=center><input type="submit" name='sub'  value="Add Product">  <td colspan=2><input type="reset"  value="Clear">  
            <tr><td>    </table>         
    </div>


  </main>
</body>
</html>