<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Details</title>
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
    <form action="" method="post">
        <div class="in">
        <table class="form" cellpadding=20 border=2px>
            <tr>
                <th>Product Id</th>
                <th> Product Name</th>
                <th> Product Category</th>
                <th> Product Price(per unit)</th>
                <th> Quantity</th>
                <th> total stock</th>
                <th> Description</th>
                <th>Edit</th>
                <th>Remove</th>
            </tr>
            <?php 
              include 'db.php';
               $r='select * from product;';
               $re=mysqli_query($con,$r);
               
               while($row=mysqli_fetch_array($re)){
                  
                    echo "<tr><td>".$row['proid'];
                    
                    echo "<td>".$row['proname'];
                    echo "<td>".$row['procate'];
                    echo "<td>".$row['proprice'];
                    echo "<td>".$row['proqua'];
                    echo "<td>".$row['prounit'];
                    echo "<td>".$row['prodes'];
                    echo "<td><a href=stockedit.php?proid=".$row['proid'].">&#128221;";
                    echo "<td><a href=removeitem.php?id=".$row['proid'].">&#10062;";
                     } 
              ?>
           

  </table>
  </main>
</body>
</html>