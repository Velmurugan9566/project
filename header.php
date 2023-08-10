<header>
        <div class='login'>
        <?php session_start(); if(isset($_SESSION['user'])){
            echo '<a class="login" href=profile.php style="padding-left:86%;">&#128526;'.$_SESSION["user"].'</a><a href="logout.php" class="login">||Logout</a> ';
        } else{?>
        <a href="login.php"  class="login"  style="padding-left:86%;">Login|</a><a href="register.php"  class="login" >SignUp <i>&#127788;</i></a><?php }?>
        </div>
        <div class="head">
      <h2 style="border-left:20px solid red;">Online Grocery Product Shopping&#128722;<a href="cart.php" class="login" style="padding-left:720px;">Cart&#128722;</a></h2>
      
       </div>
     
    <ul class="nav" >
       <li><a href="home.php" class="navl"  >Home</a></li>
      
       <li><a href="adminlogin.php" class="navl">Admin</a></li>
       <li><a href="contact.php" class="navl">Contact</a></li>
       <li><a href="about.php" class="navl">About Us</a> </li>
    </ul>
    
</header>