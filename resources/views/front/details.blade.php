<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinner Club</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/details.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<?php
include('./incs/header.php')
?>
<section id="details_main">
 <div class="details_inner clearfix">
  <div class="container">
   <div class="row">
    <div class="details_main_1">
     <h1>Recipes Details</h1>
	<ul>
	     <li><a href="#">Home</a></li>
		 <li><i class="fa fa-angle-double-right"></i></li>
		 <li>Details</li>
	</ul>
   </div>
  </div>
 </div>
 </div>
</section>
<section id="details">
 <div class="container">
  <div class="row">
   <div class="details_1">
    <h3>The Recipe Story</h3>
	<div class=" content-top2">
	 <h4 class="text-center">O</h4>
	</div>
   </div>
   <div class="details_2 clearfix">
    <div class="col-sm-6">
	 <div class="details_3">
	  <h3>The Ingredient List</h3>
	 </div>
	 <div class="details_4">
	  <ul>
	  
	<?php
   require('./incs/db.php');
       $id=$_GET['id'];
                    $sql = "select * from  ingredient where meal_id=$id";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {

						$img_src = $result['img'];
						// $description = $result['description'];
					  

                    ?>
	
	       <li class="well_1"><i class="fa fa-leaf"></i>MAGGI Masala-ae-Magic</li>
	       <li class="well_2"><?php echo $result['MAGGI Masala-ae-Magic'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Bread</li>
	       <li class="well_2"><?php echo $result['Bread'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Oil</li>
	       <li class="well_2"><?php echo $result['Oil'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Mustard Seeds</li>
	       <li class="well_2"><?php echo $result['Mustard Seeds'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Curry Leaves</li>
	       <li class="well_2"><?php echo $result['Curry Leaves'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Dry Red Chillies</li>
	       <li class="well_2"><?php echo $result['Curry Leaves'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Asafoetida Powder (Hing)</li>
	       <li class="well_2"><?php echo $result['Curry Leaves'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Onion</li>
	       <li class="well_2"><?php echo $result['Onion'];?></li>
		   <li class="well_1"><i class="fa fa-leaf"></i>Potato</li>
	       <li class="well_2"><?php echo $result['Potato'];?></li>
	  </ul>
	 </div>
	</div>
	<div class="col-sm-6">
	 <div class="details_3">
	  <h3>The Easy Steps</h3>
	 </div>
	 <div class="details_5">
	  <!-- <a href="#"><img src="img/35.jpg" alt="abc" class="img_responsive"></a> -->
	  <a href="details.php"> <img src="./img/<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" width="300" height="200" class="img-responsive" /></a>
	      <!-- <li class="well_17"><a href="#">VIEW ALL</a></li> -->

	 </div>
	 <?php } ?>
	 </div>
	</div>
   </div>
  </div>
 </div> 
</section>
<?php
require('./incs/footer.php')
?>
</body>
</html>