<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinner Club</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/contact.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<?php
// include('./incs/header.php')
?>
</section>
<section id="contact_main">
 <div class="contact_inner clearfix">
  <div class="container">
   <div class="row">
    <div class="contact_main_1">
     <h1>Contact</h1>
	<ul>
	     <li><a href="#">Home</a></li>
		 <li><i class="fa fa-angle-double-right"></i></li>
		 <li>Contact</li>
	</ul>
   </div>
  </div>
 </div>
 </div>
</section>
<section id="contact_inner">
 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3635689.793072721!2d78.6421709625!3d27.141236999999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1531201517392 " height="600" style="border:0; width:100%;" allowfullscreen=""></iframe>
</section>
<section id="contact">
 <div class="container">
  <div class="row">
   <div class="col-sm-12">
	 <div class="col-sm-8">
	  <div class="col-sm-12 padding_left_1">
	   <div class="contact_3">
	   <h2>Lorem Ipsum Dolor Sit Amet:</h2>
	   <div class=" content-top2">
	   <h4 class="text-center">O</h4>
	   </div>
	   <p>Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh.</p></div>
	  </div>





	  <form method="post" action="">



	  <div class="col-sm-12 space_all">
	   <div class="col-sm-6">
	    <div class="contact_4">
		 <input type="text" class="form-control" name="name" placeholder="Name">
		</div>
	   </div>
	   <div class="col-sm-6">
	    <div class="contact_4">
		 <input type="text" class="form-control" name="email" placeholder="Email">
		</div>
	   </div>
	  </div>
	  <div class="col-sm-12">
	   <div class="contact_5">
	    <textarea placeholder="Message"  name="message"class="form-control"></textarea>
	   </div>
	  </div>
	  <div class="col-sm-12">
	   <div class="contact_6">
	       <ul>
	            <li><button class="button hvr-shutter-out-horizontal"   name="submit"  type="submit" class="button">SEND</button></li>
	      </ul>
	   </div>
	  </div>
	 </div>
	 </form>




	 <?php

	// include "./incs/db.php";
	if(isset($_POST["submit"]))
	{

		 //validation
		 $name=$_POST["name"];
		 $email=$_POST["email"];
		 $message=$_POST["message"];


		 $sql="insert into contact(name,email,message)
		  values('$name','$email','$message')";

		  $result=mysqli_query($conn,$sql);

		  if($result)
		  {
			  echo "<div class='alert alert-success'>date Inserted success</div>";
		  }

	}

  ?>
	 <div class="col-sm-4">
	  <div class="contact_8 clearfix">
	   <div class="contact_7">
	   <h2>Connect Us</h2>
	   <div class=" content-top2">
	   <h4 class="text-center">O</h4>
	   </div>
	  </div>
	  <div class="contact_2">
	   <h4>Address:</h4>
	   <h5><i class="fa fa-home"></i><span class="media_1">123 Lorem ipsum dolor sit amet</span></h5>
	  </div>
	  <div class="contact_2">
	   <h4>Phones:</h4>
	   <h5><i class="fa fa-phone"></i><span class="media_1">123-4567-1234</span></h5>
	   <h5><i class="fa fa-calculator"></i><span class="media_1">432-5456-7658</span></h5>
	  </div>
	  <div class="contact_2">
	   <h4>E-mail:</h4>
	   <h5><i class="fa fa-envelope"></i><a href="#"><span class="media_2">team@gmail.com</span></a></h5>
	   <h5>Sed Dignissim Lacinia:<a href="#"><span class="media_3"> cairo</span></a></h5>
	  </div>
	  </div>
	 </div>
	</div>
  </div>
 </div>
</section>
<?php

require('./incs/')
?>

</body>
</html>
