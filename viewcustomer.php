<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
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
                <th>S.No</th>
                <th> Id</th>
                <th> Name</th>
                <th> Age</th>
                <th> Gender</th>
                <th> Phone Number</th>
                <th> Email Id</th>
                <th> Address</th>
                <th> Pincode</th>
            </tr>
            <?php 
              include 'db.php';
               $r='select * from user;';
               $re=mysqli_query($con,$r);
               $s=1;
               while($row=mysqli_fetch_array($re)){
                   echo "<tr><td>".$s;
                    echo "<td>".$row['user_id'];
                    echo "<td>".$row['cname'];
                    echo "<td>".$row['cage'];
                    echo "<td>".$row['cgen'];
                    echo "<td>".$row['cphone'];
                    echo "<td>".$row['cemail'];
                    echo "<td>".$row['caddress'];
                    echo "<td>".$row['cpin'];
                    $s+=1;
               }

  ?>
  </table>
  </main>
</body>
=======
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
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
                <th>S.No</th>
                <th> Id</th>
                <th> Name</th>
                <th> Age</th>
                <th> Gender</th>
                <th> Phone Number</th>
                <th> Email Id</th>
                <th> Address</th>
                <th> Pincode</th>
            </tr>
            <?php 
              include 'db.php';
               $r='select * from user;';
               $re=mysqli_query($con,$r);
               $s=1;
               while($row=mysqli_fetch_array($re)){
                   echo "<tr><td>".$s;
                    echo "<td>".$row['user_id'];
                    echo "<td>".$row['cname'];
                    echo "<td>".$row['cage'];
                    echo "<td>".$row['cgen'];
                    echo "<td>".$row['cphone'];
                    echo "<td>".$row['cemail'];
                    echo "<td>".$row['caddress'];
                    echo "<td>".$row['cpin'];
                    $s+=1;
               }

  ?>
  </table>
  </main>
</body>
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
</html>