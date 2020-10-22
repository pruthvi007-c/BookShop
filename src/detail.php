<?php


session_start();



$temp=$_SESSION['username'];

$con=mysqli_connect('localhost','root','','project');
if($con){
	$query="SELECT * FROM `book` WHERE 1 ";
	$run=mysqli_query($con,$query);
	$temp3=0;		
	 if (mysqli_num_rows($run) > 0) {
	
	
    
    while($row = mysqli_fetch_assoc($run)) {
		$temp3++;
	}
}
}?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="user_style.css">
<link rel="stylesheet" type="text/css" href="http://use.fontawesome.com/releases/v5.5.0/css/all.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.js"></script>
</head>
<body >
<div class="body">
<div class="top">
<form action="ser.php" method="post">
<button class="search_button" name="search" ><img src="search_logo.png" height="25px" width="25px"></img></button>
<input type="search" class="search" placeholder="Search" name="name">
</form>
<label  class="button_top1"style="width:auto;"><i class="fas fa-user-circle" style=" float:left;margin-left:100px;font-size:35px;margin-top:22px; margin-right:5px;"></i><p class="button_font"><b style="padding-top:5px;"><?php echo $temp ;?></b></a></label>
<button style="display:none"></button>
<button  class="button_top23"style="width:auto;"><b><abbr title="NOTIFICATION"><i class="fas fa-comments">

</i></abbr></b></button>
<button onclick="document.getElementById('id03').style.display='block'" class="button_top2"style="width:auto;"><p class="button_font"><b><abbr title="CART"> <i class="fas fa-cart-arrow-down"></i></abbr></b></a></button>
<button onclick="document.getElementById('id04').style.display='block'" class="button_top2"style="width:auto;"><p class="button_font"><b><abbr title="PURCHASED BOOK"><i class="fas fa-file-download"></i></abbr></b></a></button>
<button class="button_top2" style="width:auto;" onclick="window.location.href='index.php'"><p class='button_font'><b><abbr title="LOGOUT"><i class="fas fa-sign-out-alt"></i></abbr></b></p></button>

</div>
<div id="id02" class="modal">
  <div class="con">
  <form class="modal-content animate" action="insert.php" method="post" enctype="multipart/form-data">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
      
  

    <div class="container">
    
	  <label class="container_font"><b>BOOK NAME:</b></label>
	  <input class="input"type="text" name="bname" required><br><br>
	  
	    <label class="container_font"><b>AUTHOR NAME:</b></label>
		<input class="input" type="text" name="aname"required><br><br>
		    <label class="container_font"><b>TYPE:</b></label>
		 <select name="type" style="width:200px;"required>
    <option value="ENGINEERING-MECHENICAL">ENGINEERING-MECHENICAL</option>
    <option value="ENGINEERING-CIVIL">ENGINEERING-CIVIL</option>
    <option value="ENGINEERING-CHEMICAL">ENGINEERING-CHEMICAL</option>
    <option value="ENGINEERING-ELECTRONICS">ENGINEERING-ELECTRONICS</option>
	  <option value="ENGINEERING-INFORMATION TECHNOLOGY">ENGINEERING-INFORMATION TECHNOLOGY</option>
	    <option value="ENGINEERING-COMPUTER">ENGINEERING-COMPUTER</option>
		  <option value="OTHER-STORY">OTHER-STORY</option>
		    <option value="OTHER-ROMANTIC">OTHER-ROMANTIC</option>
			<option value="OTHER-THRILL">OTHER-THRILL</option>
			<option value="OTHER-ADVENTURE">OTHER-ADVENTURE</option>
  </select>
  <br>
		 <label class="container_font"><b>PRICE:</b></label>
		<input required class="input" type="number" name="price" style="width:100px; height:30px;"><br><br>
		 <label class="container_font"><b>Upload Image:</b></label>
		<input required class="input" type="file" name="file"><br><br>
		<button type="submit" class="button3" name="submit1"><b>Add Book</b></button>
    </div>

    
     
      

  </form>
</div>
</div>
<div id="id03" class="modal">

  <div class="con_cart">
  
  <span onclick="document.getElementById('id03').style.display='none'" class="close1" title="Close Cart">&times;</span>
     <div class="cart">
      <?php

	
	if($con){
	
	 $query="SELECT * FROM `cart` NATURAL JOIN `book` WHERE  uname='$temp' ";
	$run=mysqli_query($con,$query);
	 if (mysqli_num_rows($run) > 0) {
		 	

	

			
    
    while($row = mysqli_fetch_assoc($run)) {
	    
			 $temp2=$row["bname"];
			 $temp34=$row["bid"];
			 $temp33=$row["author"];
			 $temp32=$row["type"];
			 $temp5=$row["imsrc"];
			 $temp31=$row["price"];
			  $temp35=$row["oname"];
			  $temp36=$row["orderid"];
			 $temp4=$temp;
			
    echo "<div class='mybook_img1'> <img class='cart_image' src='$temp5' height='100%px' width='100%' style='float:left;'>
	                                  <div class='i1' >
	                                  
	                                     </div><div class='cart_button'><form action='notification.php' method='post'>
										 	
		                                <input type='hidden' name='bname' value='$temp2'>
										<input type='hidden' name='bid' value='$temp34'>
										<input type='hidden' name='author' value='$temp33'>
										<input type='hidden' name='type' value='$temp32'>
										<input type='hidden' name='oname' value='$temp35'>
										<input type='hidden' name='price' value='$temp31'>
                                       <input type='hidden' name='uname' value='$temp'>
									   <input type='hidden' name='orderid' value='$temp36'>
										 
										 <button type='submit' style='margin-top:35px;'>BUY</button></form>
										      <form action='login_detail.php' method='post'>
											 
											 <input type='hidden' name='imsrc' value='$temp5'>
		                                <input type='hidden' name='bname' value='$temp2'>
										<input type='hidden' name='bid' value='$temp34'>
										<input type='hidden' name='author' value='$temp33'>
										<input type='hidden' name='type' value='$temp32'>
										<input type='hidden' name='price' value='$temp31'>
                                       <input type='hidden' name='uname' value='$temp'>
									   
									    <input type='hidden' name='oname' value='$temp35'>
											 <button type='submit' name='detail' >DETAIlS</button></form>
      										<form action='remove.php' method='post'>
<input type='hidden' name='bname' value='$temp2'>
										<input type='hidden' name='bid' value='$temp34'>
										<input type='hidden' name='author' value='$temp33'>
										<input type='hidden' name='type' value='$temp32'>
										
										<input type='hidden' name='oname' value='$temp35'>
                                       <input type='hidden' name='uname' value='$temp'>
											<button>REMOVE</button></form></div></div><br>
										";
	}

	 }
	 else {
    echo "<div style='margin-left:50px; margin-top:170px;'>Oops Book Not Available</div>";
}
	}
	else{
		echo "not connected";
	}
     
    ?>
</div>
 
</div>
</div>
<div id="id04" class="modal">

  <div class="con_cart">
  
  <span onclick="document.getElementById('id04').style.display='none'" class="close1" title="Close Cart">&times;</span>
     <div class="cart">
      <?php

	
	if($con){
	
	 $query="SELECT * FROM `buy` NATURAL JOIN book WHERE  uname='$temp' ";
	$run=mysqli_query($con,$query);
	 if (mysqli_num_rows($run) > 0) {
		 	

	

			
    
    while($row = mysqli_fetch_assoc($run)) {
	    
			 $temp2=$row["bname"];
			 $temp34=$row["bid"];
			 $temp33=$row["author"];
			 $temp32=$row["type"];
			 $temp5=$row["imsrc"];
			 $temp31=$row["price"];
			  $temp35=$row["oname"];
			  
			 $temp4=$temp;
			
    echo "<div class='mybook_img1'><img class='cart_image' src='$temp5' height='100%px' width='100%' style='float:left;'><div class='i1' >
	                                     </div><div class='cart_button'>
											 
											 <input type='hidden' name='imsrc' value='$temp5'>
		                                <input type='hidden' name='bname' value='$temp2'>
										<input type='hidden' name='bid' value='$temp34'>
										<input type='hidden' name='author' value='$temp33'>
										<input type='hidden' name='type' value='$temp32'>
										<input type='hidden' name='price' value='$temp31'>
                                       <input type='hidden' name='uname' value='$temp'>
									   
									    <input type='hidden' name='oname' value='$temp35'>
											 <button type='submit' name='detail' style='margin-top:35px;' >DETAIlS</button></form>
      										<form action='remove1.php' method='post'>
<input type='hidden' name='bname' value='$temp2'>
										<input type='hidden' name='bid' value='$temp34'>
										<input type='hidden' name='author' value='$temp33'>
										<input type='hidden' name='type' value='$temp32'>
										
										<input type='hidden' name='oname' value='$temp35'>
                                       <input type='hidden' name='uname' value='$temp'>
											<button>REMOVE</button></form></div></div><br>
										";
	}

	 }
	 else {
    echo "<div style='margin-left:50px; margin-top:170px;'>Oops Book Not Available</div>";
}
	}
	else{
		echo "not connected";
	}
     
    ?>
</div>
 
</div>
</div>



<div class="menu">
<div class="menu_bar">
<ul>
<li class="active" style="width:60px; margin-top:3px;" ><a href="user.php" class="a2">HOME</a></li>

<li style="width:148px;"><a href="#"class="a1">OTHER BOOKS &#10097 </a>
<div class="sub-menu">
 <ul>
 


   <li > <div class="sub_img1"><br>
   
   <form action="search1.php" method="post"><button type="submit" class="but" value="OTHER-STORY"name="type">STORY </button><br>
<button type="submit"class="but"value="OTHER-ADVENTURE"name="type">ADVENTURE</button><br>
 <button type="submit" class="but"value="OTHER-THRILL"name="type">THRILL</button><br>
  <button type="submit" class="but" value="OTHER-ROMANTIC"name="type">ROMANTIC</button><br>
   </div></li> 

 
 </ul>
</div>
</li>
<li  style="width:205px;"><a href="#" class="a1" >ENGINEERING BOOKS &#10097 </a>
<div class="sub-menu">
 <ul>
 <li><div class="sub_img1"><br>
<button type="submit"  class="but" value="ENGINEERING-INFORMATION TECHNOLOGY" name="type">INFORMATION TECHNOLOGY</button><br>
<button type="submit" class="but" value="ENGINEERING-COMPUTER" name="type">COMPUTER</button><br>
<button type="submit" class="but" value="ENGINEERING-CIVIL" name="type">CIVIL</button><br>
<button type="submit" class="but" value="ENGINEERING-MECHENICAL" name="type">MECHENICAL</button><br>
<button type="submit" class="but" value="ENGINEERING-ELECTRONICS" name="type">ELECTRONICS</button><br>
<button type="submit" class="but" value="ENGINEERING-CHEMICAL" name="type">CHEMICAL</button><br>
 </div></li>

</form>
 
 </ul>
</div>
</li>
<li style="width:130px; margin-top:3px;"><a href="#" class="a1">RECOMENDED</a></li>
</ul>

</div>
</div>
<?php


$img=$_POST['imsrc'];
$bname=$_POST['bname'];
$oname=$_POST['oname'];
$type=$_POST['type'];
$price=$_POST['price'];
$author=$_POST['author'];
$bid=$_POST['bid'];
if(isset($_POST['mybook12'])){
echo "<img src='$img' height='50%px' width='20%' style='margin-left:15%; margin-top:5%; margin-right:2%; float:left; '><div style='margin-top:7%; margin-left:20%' ><p><b>BOOK NAME</b>:$bname</p>
                          <p><b>TYPE </b>:$type</p>
						  <p><b>AUTHOR</b>:$author</p>
						  <p><b>OWNER NAME</b>:$oname</p>
						  <p><b>PRICE</b>:$price</p>
						  
						  
										<form action='addcart.php' method='post'>
										 
		                                <input type='hidden' name='oname' value='$oname'>
										<input type='hidden' name='bid' value='$bid'>
										
                                       <input type='hidden' name='uname' value='$temp'>
										 
									</form>
						  </div>";
}
else
{
	echo "<img src='$img' height='50%px' width='20%' style='margin-left:15%; margin-top:5%; margin-right:2%; float:left; '><div style='margin-top:7%; margin-left:20%' ><p><b>BOOK NAME</b>:$bname</p>
                          <p><b>TYPE </b>:$type</p>
						  <p><b>AUTHOR</b>:$author</p>
						  <p><b>OWNER NAME</b>:$oname</p>
						  <p><b>PRICE</b>:$price</p>
						  
						  
										<form action='addcart.php' method='post'>
										 
		                                <input type='hidden' name='oname' value='$oname'>
										<input type='hidden' name='bid' value='$bid'>
										
                                       <input type='hidden' name='uname' value='$temp'>
										 
										 <button type='submit' class='buy_button'  >ADD TO CART</button></form>
						  </div>";
}
?>
<hr style="margin-top:19%"><p style='margin-left:48%'>@copyright</p>
<script>
	function myFunction() {
  alert("Please Login!");
}
</script>
 <script>

var modal = document.getElementById('id01');
var modal = document.getElementById('id02');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
</body>
</html>