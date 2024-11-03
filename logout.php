<<<<<<< HEAD
<?php
    session_start();
   unset($_SESSION['user']);
   header('location:'.$_SERVER['HTTP_REFERER']);
   
=======
<?php
    session_start();
   unset($_SESSION['user']);
   header('location:'.$_SERVER['HTTP_REFERER']);
   
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
   ?>