<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction Details</title>
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
       .box{
            display:flex;
            placeing-item:center;
            justify-items: center;
            justify-content: space-evenly;
            background-color: white;
            width:150px;
            text-align:center;
            align-items:center;
            height:200px;
            border-radius: 10px;
            color:black;
            box-shadow:0 10px 20px 10px lightsalmon;
        } 
        a{
          text-decoration:none;
        }
       .in{
        
        padding-left:20px;
       }
       .in input[type],select{
            border-radius:2rem;
            height:20px;
            width:50%;
            font-weight:bold;
       }
       main{
        padding-top:20px;
        padding-left:220px;
       }
       a:active{
color:red;
       }
        .class{
            border:yellow;
    }
    </style>
</head>
<body>
    <?php include 'adhead.html'; 
     include 'db.php';?>
    <aside>
      </aside>
      <main>
        <table cellpadding=20 >
 <tr><td><div class=box>
 <a href=viewtransaction.php?id=1><b> Total Transaction<br>
  <?php 
          $r=mysqli_query($con,'select count(tranid) from payment;');
          echo mysqli_fetch_array($r)[0];
          ?> </a>
 </div>
 <td> <div class=box>
 <a href=viewtransaction.php?id=2><b> Today Transaction<br>
  <?php 
          $r=mysqli_query($con,'select count(tranid) from payment where DAY(day)=DAY(now());');
          echo mysqli_fetch_array($r)[0];
          ?> </a>
 </div>
 <td> <div class=box>
  <a href=viewtransaction.php?id=3><b>This Month Transaction<br>
  <?php 
          $r=mysqli_query($con,'select count(tranid) from payment where  MONTH(day)=MONTH(now()) and YEAR(day)=YEAR(now());');
          echo mysqli_fetch_array($r)[0];
          ?> </a>
 </div>
 <td> <div class=box>
  <a href=viewtransaction.php?pro=1><b>View Today sold out products</a>

 </div><tr>
   <?php 
   if(isset($_GET['id'])){ ?>
    <form action="" method="post">
        <div class="in">
        <table class="form" cellpadding=20 align=center border=2px>
        <tr> 
                <th>S.No</th>
                <th> Id</th>
                <th> User Name</th>
                <th>Mode Of Payment</th>
                <th>Amount</th>
                <th> Date</th>
                <th>Address</th>      
            </tr>
            <?php 

               $id=$_GET['id'];
               if($id==1){
                $r="select * from payment;";    
               }
               else if($id==2){
                $r="select * from payment where DAY(day)=DAY(now());";  
               }
               else if($id==3){
                $r="select * from payment where MONTH(day)=MONTH(now()) and YEAR(day)=YEAR(now()); ";
               }
               $re=mysqli_query($con,$r);
               echo mysqli_error($con);
               
               $s=1;
               $total=0;
              
               while($row=mysqli_fetch_array($re)){
                   echo "<tr align=center><td>".$s;
                    echo "<td><a href=viewtransaction.php?orid=".$row['tranid'].">ORID".$row['tranid']."</a>";
                    echo "<td>".$row['userid'];
                    echo "<td>".$row['paymode'];
                    echo "<td>".$row['amount'];
                    echo "<td>".$row['day'];
                    $add="select * from user where user_id='$row[userid]';";
                    $add1=mysqli_query($con,$add);
                    while($add2=mysqli_fetch_array($add1)){
                        echo "<td>".$add2['caddress'].$add2['cpin'];
                    }
                   

                    $total+=$row['amount'];
                    $s+=1;
               }
               echo "<tr><td colspan=8 align=center style=font-size:20px;color:blue;><b>Total Amount: ".$total;
            }
            //order id based products list...
            if(isset($_GET['orid'])){
             $to=0;
              $histroy="select * from transaction where tranid='$_GET[orid]';";
              $ans=mysqli_query($con,$histroy);
              echo mysqli_error($con);
              echo "<table cellpadding=20 align=center border=2px><tr align=center ><th colspan=5>Order Id :ORID".$_GET['orid'];
              echo "<tr align=center><th>Product id <th>Product Name<th>Quantity<th>Unit<th>Prodcut Price<td>";
             while($his=mysqli_fetch_array($ans)){
                echo "<tr align=center><td>".$his['proid']."
                       <td>".$his['proname']."
                       <td>".$his['proquan'].$his['mesureby']."
                       <td>".$his['prounit']."
                       <td>".$his['proprice'];
                       $to+=$his['proprice'];
             }
                   echo "<tr><td><td><td><td>Total<td>".$to;
            }

            if(isset($_GET['pro'])){
              $d=date('Y-m-d');
              $s="select tranid from payment where day='$d';";
              $r=mysqli_query($con,$s);
              if(mysqli_num_rows($r)>0){
                echo "<tr><th>Product Id<th>Product Name<th>No of unit";
             $histroy="select type,proname,proid,sum(prounit),sum(proquan) from transaction inner join payment on payment.tranid=transaction.tranid group by transaction.proid,payment.day having payment.day='$d';";
              $ans=mysqli_query($con,$histroy);
              echo mysqli_error($con);
             while($his=mysqli_fetch_array($ans)){
                echo "<tr align=center><td>".$his['proid']."
                       <td>".$his['proname'];
                     
                      if($his['type']=='lose'){
                        echo "<td>".$his['sum(proquan)']."kg";
                      }else{
                       echo  "<td>".$his['sum(prounit)']." Items";
                      }
                     }
                    }
               else{
                echo "<tr><td colspan=3 align=center>Today No Transactions made";
              }
            }
  ?>
  </table>
  </main>
</body>
</html>