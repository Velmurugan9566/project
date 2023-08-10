<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home page</title>
    <style>
               body{
            width:100%;
            height:100%;
            background-color: bisque;
            font-family: Arial, sans-serif;
        }
        header{
            width:100%;
            height:30%;
            overflow:hidden;
            position:fixed;
            top:0;
            align-items:center;
            background-color: rgb(0, 79, 153);
            color:white;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            
        }
        .head{
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color:white;
            display:inline-block;
            padding-top:20px;
            
        }
      .nav,ul{
            list-style-type: none;
            display:flex;
            gap:20px;
            position:fixed;
            padding-left:60%;
            padding-bottom: 5px;
            font-weight: bold;
            font-size:20px;
            
        }
        .navl{
            font-size:20px;
            padding:5px;
            border-radius:5px;
            transition: all 0.3s ease-in-out;
            color:white;
            text-decoration:none ;
        }
        .navl:hover{
                background-color:skyblue;
                transform: scale(1,1);
               color:yellow;
               text-decoration:none;
        }
        
        main{
            margin-top: 180px ;
            align-items:center;
            width:100%;
            justify-items: center;
            justify-content: space-evenly;
            padding:20px;
            overflow:auto;
            background-color: bisque;
            background-attachment: scroll;
            
        }
        .product{
            background-color: white;
            width:220px;
            height:300px;
            border-radius: 20px 20px 0px 0px;
            color:black;
        } 
       
        .product:hover{
            box-shadow:20px;
            cursor:pointer;
            transform: translateY(-10px);
            box-shadow: 0px 10px 15px rgba(0, 0, 0, 0.3);
        }
        #btn{
            width:220px;
            height:25px;
            align-items:bottom;    
            background-color: #49e819;
            color:white;
            font-size: large;
            animation: glowing 1200ms infinite;
        }
        @keyframes glowing{
            0%{
                background-color:#2ba805;
                box-shadow: 0 0 5px #2ba805;
            }
            50%{
                background-color:#49e819;
                box-shadow: 0 0 5px #49e819;
            }
            100%{
                background-color:#2ba805;
                box-shadow: 0 0 5px #2ba805;
            }

        }
        footer{
            bottom:0;
            padding:15px;
            
            background-color: darkslateblue;
        }
        .fotcon{
            padding:50px;
            color:azure;
            font-weight: bolder;
        }
        .login{
            border:5px;
           color:white;
           text-decoration:none;
           font-size:18px;
           border-radius:5px;
        }
        .login:hover{
               font-size:20px;
               color:yellow;
               text-decoration:none;
        }
        .note{
            background-color: #49e819;
            width: 100%;
            height:30px;
            font-weight:bolder;
            font-size:18px;
            animation: glowing ms 1ms infinite;
        }
    </style>
    <!--<link rel="stylesheet" type="text/css" href="headcss.css">!-->
</head>
<body>
    <?php include "header.php"; $_SESSION['lst']=$_SERVER['REQUEST_URI'];?>
    
<main>
<div class=note><marquee>...Welcome to our Grocery Mart...
</marquee></div>
 <h2>Categorys Of Products</h2>
<table   cellpadding="20px"cellspaceing="5px" align=center>
    <tr>
    <?php  include 'db.php';
    if(!isset($_SESSION['ucount'])){
        $_SESSION['ucount']=1;
    }
    else{
        $_SESSION['ucount']+=1;
    }
            
               $r='select * from procate;';
               $re=mysqli_query($con,$r);
               $i=0;
               while($row=mysqli_fetch_array($re)){
                     if($i%4==0){
                        echo "<tr>";
                        $i=0;
                     }
                     $c=urlencode($row['category']);
                    echo '<td><div class=product > <a href=product.php?cate='.($c).'>
                    <img src=data:image/jpg;charset=utf8;base64,'.base64_encode($row['cateimg']).' width=100% height="100% auto" alt="No
                    Image"></div>
                   <button id=btn>'.$row['category'].'</button></a> </td>';
                
                    $i+=1;
              }
            ?>
            </form>

</table>

</main>

</body>
</html>