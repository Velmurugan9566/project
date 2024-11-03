
  <!DOCTYPE html>
<html>
</head>
<body>
        <?php session_start();
        $_SESSION['user']='geo@123';
require('vendor/autoload.php');
include 'db.php';
 $html="<table cellpadding=20 cellspaceing=1 align=center class=bill>
    <tr><th align=center colspan=12 style=font-size:30px;> Invoice Bill</th>";
        
         $s="select * from user where user_id='$_SESSION[user]';";
         $re=mysqli_query($con,$s);
         while($order=mysqli_fetch_array($re)){
           $name=$order['cname'];
           $ph=$order['cphone'];
           $pin=$order['cpin'];
           $add=$order['caddress'];
            }
            $d=date('Y-m-d,H:ia');
    $html.="<tr><td>Name:<td>".$name."<td colspan=8><td>Date:<td>".$d."
    <tr><td>Phone No:<td>".$ph."<td colspan=8>
    <tr><td>address:<td>".$add.-$pin."<td colspan=8>";
    $t="select tranid from payment where userid='$_SESSION[user]';";
    $r=mysqli_query($con,$t);
    while($r1=mysqli_fetch_array($r)){
        $tra=$r1['tranid'];}
   $html.= "<tr><td colspan=12><hr>
    <tr><td>S.No<td colspan=3>Product Name<td colspan=3>Product Weight<td colspan=2>Unit<td colspan=3>Product Price";
           $tr="select * from payment inner join transaction on payment.tranid=transaction.tranid where transaction.tranid='$tra';";
           $tr1=mysqli_query($con,$tr);
           $i=1;
           while($tr2=mysqli_fetch_array($tr1)){
               $html.="<tr><td>".$i;
               $html.= "<td colspan=3>".$tr2['proname'];
               $html.= "<td colspan=3>".$tr2['proquan'];
               $html.= "<td colspan=2>".$tr2['prounit'];
               $html.= "<td colspan=3>".$tr2['total'];
               $i+=1;
               $t=$tr2['amount'];
           }
           $html.= " <tr><td colspan=12><hr>";
           $html.= "<tr><td colspan=10><td>Total <td>".$t;
           $html.= "<tr><td colspan=12 align=center style=font-size:22px;><b> Thankyou for shopping with us....keep in touch";
 $html.= "</table>";
$html.='<tr><td align=center style=font-size:30px;><B><a href="home.php">Continue to Shopping</a></b></table>';
$mpdf= new \Mpdf\Mpdf();
$mpdf->writeHTML($html);
$file='media/'.time().'.pdf';
$mpdf->output($file,'I');
?>
 </html>