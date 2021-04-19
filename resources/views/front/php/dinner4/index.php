<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinner Club</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/index.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="css/ken-burns.css" rel="stylesheet" type="text/css" media="all" />
	<link type="text/css" rel="stylesheet" href="css/animate.css">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<?php
include('./incs/header.php')
?>

<section id="center" class="center_home">
 <div class="banner">
 <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
			<!-- Wrapper-for-Slides -->
            <div class="carousel-inner" role="listbox">  
                <div class="item active"><!-- First-Slide -->
                    <img src="img/bg43.jpg" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated flipInX" class="">Dinner Club Restaurant</h1>
                        <p data-animation="animated flipInX" class="">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button hvr-shutter-out-horizontal">Read More</a></h4>
                    </div>
                </div>  
                <div class="item"> <!-- Second-Slide -->
                    <img src="img/bg44.jpg" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated fadeInDown">We Provide Our best</h1>
                        <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
						Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button hvr-shutter-out-horizontal">Read More</a></h4>
                    </div>
                </div> 
                <div class="item"><!-- Third-Slide -->
                    <img src="img/bg45.jpg" alt="" class="img-responsive">
                    <div class="carousel-caption kb_caption kb_caption_right">
                        <h1 data-animation="animated fadeInDown">Printing And Typesetting</h1>
                        <p data-animation="animated fadeInUp">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy  text ever since the when an unknown printer took a galley of type and scrambled [...]</p>
						<h4><a href="#"class="button">Read More</a></h4>
                    </div>
                </div> 
            </div> 
            <!-- Left-Button -->
            <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
				<span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a> 
            <!-- Right-Button -->
            <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
                <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> 
        </div>
		<script src="js/custom.js"></script>
	</div>
</section>


<section id="noodles">
 <div class="container">
  <div class="row">
   <div class="noodles_1">
    <h3>MAGGI Noodles Recipes</h3>
	<div class=" content-top2">
	 <h4 class="text-center">O</h4>
	</div>
   </div>
   <div class="noodles_2 clearfix">
   <?php
   require('./incs/db.php');
                    $sql = "select * from meals limit 8";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {

                      $img_src = $result['ml-image'];

                    ?>
    <div class="col-sm-3">
	 <div class="noodles_3">
	 <img src="./img/<?php echo $img_src; ?>" width="300" height="200" class="img-responsive" />
	  <h4>Paneer Bhurji MAGGI Noodles</h4>
	  <p>Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla.</p>
	 </div>
	</div>

<?php } ?>
   </div>
  </div>
 </div>
</section>

<section id="event">
 <div class="container">
  <div class="row">
   

	<?php
   require('./incs/db.php');
                    $sql = "select * from meals  order by Rate desc limit 4";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {

						$img_src = $result['ml-image'];
						$description = $result['description'];
					  

                    ?>
	
	


	<div class="col-sm-6">
	 <div class="event_2">
	  <!-- colored -->
                  <div class="ih-item square colored effect14 bottom_to_top"><a href="#">
				  <img src="./img/<?php echo $img_src; ?>" width="300" height="200" class="img-responsive" />
                      <div class="info">
                        <p><?php echo $description ?></php></h3>
                        <p> </p>
                      </div></a>
					  
					  </div>
         
         <!-- end colored -->
	 </div>
	
	</div>
	<?php }?>

   </div>

  </div>
 </div>
</section>

<?php
include('./incs/footer.php')
?>
</body>
</html>