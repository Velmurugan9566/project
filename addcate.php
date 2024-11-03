<<<<<<< HEAD
<?php
   include 'db.php';
   error_reporting(0);
    if(isset($_POST['sub'])){
      $flag=1;
         $img=$_POST['proimg'];
         $n=$_POST['prname'];
         if(isset($_FILES['proimg']['name'])){
         $image=basename($_FILES['proimg']['name']);
         $image_type=pathinfo($image,PATHINFO_EXTENSION);
         if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
          $img=$_FILES['proimg']['tmp_name'];
          $img=addslashes(file_get_contents($img));
          
           $flag=1;
            }
         else{
          $err="only jpg,png,jpeg,gif photos are allowed ";
           
            $flag=0;
           $img="";
          }}
         $s="select category from procate where category='$n';";
         $re=mysqli_query($con,$s);
          if($row=mysqli_num_rows($re)>0){
                die ("<script type/javascript>
                  alert('Category is already exist');
                  </script>");
                  $flag=0;
         }
         if($flag==1){
         $sql="insert into procate(category,cateimg)values('$n','$img');";
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
        padding-top:30px;
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
             <tr><td>Category Name <td><input type="text" name='prname' pattern='[a-zA-Z]{3,20}' required placeholder=" Enter Product Name">
            
           <tr><td>Category Image<td><input type="file" name=proimg  placeholder="Select Image" required><?php if(isset($err)){echo $err;}?>
            <tr> <td align=center><input type="submit" name='sub'  value="Add Category">  <td colspan=2><input type="reset"  value="Clear">  
            <tr><td>    </table>         
    </div>
  <?php 
     // $s1="select * from procate;";
      //$re1=mysqli_query($con,$s1);
      // while($row1=mysqli_num_rows($re1)){
       // echo "<tr><td>".$row1['category'];
       //}
       ?>

  </main>
</body>
=======
<?php
   include 'db.php';
   error_reporting(0);
    if(isset($_POST['sub'])){
      $flag=1;
         $img=$_POST['proimg'];
         $n=$_POST['prname'];
         if(isset($_FILES['proimg']['name'])){
         $image=basename($_FILES['proimg']['name']);
         $image_type=pathinfo($image,PATHINFO_EXTENSION);
         if($image_type=='jpg' or $image_type=='png' or $image_type=='jpeg' or $image_type=='gif'){
          $img=$_FILES['proimg']['tmp_name'];
          $img=addslashes(file_get_contents($img));
          
           $flag=1;
            }
         else{
          $err="only jpg,png,jpeg,gif photos are allowed ";
           
            $flag=0;
           $img="";
          }}
         $s="select category from procate where category='$n';";
         $re=mysqli_query($con,$s);
          if($row=mysqli_num_rows($re)>0){
                die ("<script type/javascript>
                  alert('Category is already exist');
                  </script>");
                  $flag=0;
         }
         if($flag==1){
         $sql="insert into procate(category,cateimg)values('$n','$img');";
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
        padding-top:30px;
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
             <tr><td>Category Name <td><input type="text" name='prname' pattern='[a-zA-Z]{3,20}' required placeholder=" Enter Product Name">
            
           <tr><td>Category Image<td><input type="file" name=proimg  placeholder="Select Image" required><?php if(isset($err)){echo $err;}?>
            <tr> <td align=center><input type="submit" name='sub'  value="Add Category">  <td colspan=2><input type="reset"  value="Clear">  
            <tr><td>    </table>         
    </div>
  <?php 
     // $s1="select * from procate;";
      //$re1=mysqli_query($con,$s1);
      // while($row1=mysqli_num_rows($re1)){
       // echo "<tr><td>".$row1['category'];
       //}
       ?>

  </main>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>