<<<<<<< HEAD

<html>
<head>
 <title>Categorys</title>
<style> 
  header{
      width:100%;
	  height:150px;
	  align-items:center;
	  background-color:rgb(0,79,153);
	  top:0;
	  position:fixed;
	  color:white;
	  font-family:cambria,cochin;
	  }
   .head{
	   padding-top:20px;
       color:white;
       display:inline-block;
     }
	 .nav{
	   list-style-type:none;
	   display:flex;
	   gap:20px;
	   padding-left:60%;
	   padding-bottom:2px;
	   font-weight:bold;
	   font-size:20px;
	   }
	 .navl{
	     color:white;
		 }
	  .navl:hover{
	      color:yellow;
		  }
	  main{
	     background-color:bisque;
		 align-items:center;
		 padding:20ex;
		}
	  .category{
	       background-color:bisque;
		   align-items:center;
		   padding:10px;
		  }
	   .product{
	       background-color:lightpink;
		   width:200px;
		   height:200px;
		   align:center;
		   align-items:center;
		   border-radius:10px;
		   /*display:flex;*/
		   box-shadow:0px 10px 10px 10px lightgray;
		  }
		 .product:hover{
		      transform:scale(1.1);
		.itemlk{
             color:red;
			 padding-left:50px;
            }
			.re{
				color:white;
				
			}
		   
</style>
 <body>
  <header>
    <div class="re">
   <a href='#' style="padding-left:50px;">Login|<a href='#' >SignUp</a>
   </div>
    <div class="head">
       <h2 style="border-left: 15px solid red;">Online Product Shoping &#128722; </h2>
     </div>
	 
	 <ul class="nav">
	   <li><a href="#" class="navl">Home </a></li>
	   <li><a href="#" class="navl">Admin </a></li>
	   <li><a href="#" class="navl">Contact </a></li>
	   <li><a href="#" class="navl">About Us </a></li>
	  </ul>
	  
   </header>
   <main>
     <h3>Categorys Of Product</h3>
	  <div class="category">
	   <table cellpadding="25">
	       
	    	<?php for($i=1;$i<=8;$i++){?>
		
		    <?php if($i%4==0){ echo "<tr>"; }?>
		  <td>
		<table class="product" >
		   <tr><td colspan=4><img src="OIP.jpg" width=100% height=25% alt="No Image">
		   <tr><td><p>rise</p>
		   <tr><td><p>Price: $999</p>
		   <tr><td><select name='qu'><option value='5'>5KG--300$</option>
		  <option value='5'>10KG--600$</option>
		  <option value='5'>20KG--1200$</option>
		  <option value='5'>25KG--2400$</option>
		   </select>
		   <tr><td><input type="number" max=5 min=1 name='qu'>
		   <tr><td><input type="text" name='prise'  />
		   <tr><td colspan=3><td><center><input type="submit" name='prise' value='add'/>
		   </table>
		<?php } ?>
		</table>
   </div>
 </main>
 </body>
</html>
 
=======

<html>
<head>
 <title>Categorys</title>
<style> 
  header{
      width:100%;
	  height:150px;
	  align-items:center;
	  background-color:rgb(0,79,153);
	  top:0;
	  position:fixed;
	  color:white;
	  font-family:cambria,cochin;
	  }
   .head{
	   padding-top:20px;
       color:white;
       display:inline-block;
     }
	 .nav{
	   list-style-type:none;
	   display:flex;
	   gap:20px;
	   padding-left:60%;
	   padding-bottom:2px;
	   font-weight:bold;
	   font-size:20px;
	   }
	 .navl{
	     color:white;
		 }
	  .navl:hover{
	      color:yellow;
		  }
	  main{
	     background-color:bisque;
		 align-items:center;
		 padding:20ex;
		}
	  .category{
	       background-color:bisque;
		   align-items:center;
		   padding:10px;
		  }
	   .product{
	       background-color:lightpink;
		   width:200px;
		   height:200px;
		   align:center;
		   align-items:center;
		   border-radius:10px;
		   /*display:flex;*/
		   box-shadow:0px 10px 10px 10px lightgray;
		  }
		 .product:hover{
		      transform:scale(1.1);
		.itemlk{
             color:red;
			 padding-left:50px;
            }
			.re{
				color:white;
				
			}
		   
</style>
 <body>
  <header>
    <div class="re">
   <a href='#' style="padding-left:50px;">Login|<a href='#' >SignUp</a>
   </div>
    <div class="head">
       <h2 style="border-left: 15px solid red;">Online Product Shoping &#128722; </h2>
     </div>
	 
	 <ul class="nav">
	   <li><a href="#" class="navl">Home </a></li>
	   <li><a href="#" class="navl">Admin </a></li>
	   <li><a href="#" class="navl">Contact </a></li>
	   <li><a href="#" class="navl">About Us </a></li>
	  </ul>
	  
   </header>
   <main>
     <h3>Categorys Of Product</h3>
	  <div class="category">
	   <table cellpadding="25">
	       
	    	<?php for($i=1;$i<=8;$i++){?>
		
		    <?php if($i%4==0){ echo "<tr>"; }?>
		  <td>
		<table class="product" >
		   <tr><td colspan=4><img src="OIP.jpg" width=100% height=25% alt="No Image">
		   <tr><td><p>rise</p>
		   <tr><td><p>Price: $999</p>
		   <tr><td><select name='qu'><option value='5'>5KG--300$</option>
		  <option value='5'>10KG--600$</option>
		  <option value='5'>20KG--1200$</option>
		  <option value='5'>25KG--2400$</option>
		   </select>
		   <tr><td><input type="number" max=5 min=1 name='qu'>
		   <tr><td><input type="text" name='prise'  />
		   <tr><td colspan=3><td><center><input type="submit" name='prise' value='add'/>
		   </table>
		<?php } ?>
		</table>
   </div>
 </main>
 </body>
</html>
 
>>>>>>> f3efdc0c1f7e39158ab60dcb14915620bd7061db
 