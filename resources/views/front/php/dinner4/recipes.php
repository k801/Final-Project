<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dinner Club</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/global.css" rel="stylesheet">
	<link href="css/recipes.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans&display=swap" rel="stylesheet">
    <script src="js/jquery-2.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </head>
<body>
<?php
include('./incs/header.php')
?>
</section>
<section id="recipes_main" >
 <div class="recipes_inner clearfix">
  <div class="container">
   <div class="row">
    <div class="recipes_main_1">
     <h1>Recipes</h1>
	<ul>
	     <li><a href="details.html">Home</a></li>
		 <li><i class="fa fa-angle-double-right"></i></li>
		 <li>Recipes</li>
	</ul>
   </div>
  </div>
 </div>
 </div>
</section>
<section id="cooking">
 <div class="container">
  <div class="row">
   <div class="cooking_1 clearfix">
  
	
	 <div class="col-sm-4">
	 <div class="cooking_2">
	    <select class="input-text" name="section">
			<option value="Religion"> Diet Health</option>
			<option value="Hindu">Low Calorie</option>
			<option value="Muslim - Shia">Gluten Free</option>
			<option value="Muslim - Sunni">High Protein</option>
			<option value="Muslim - Others">Low Fat</option>
		 </select>
	  </div>
	 </div>
</section>
<section id="recipes">
 <div class="container">
  <div class="row">
   <div class="recipes_1 clearfix">
    
 
 
   <?php
   require('./incs/db.php');
                    $sql = "select * from meals";
                    $query = mysqli_query($conn, $sql);
                    while ($result = mysqli_fetch_array($query)) {

                      $img_src = $result['ml-image'];
                        $id=$result['ml_id'];
                    ?>

 
 
   <div class="col-sm-4">
	 <div class="recipes_2">
	  <a href="details.php"> <img src="./img/<?php echo $img_src; ?>" alt="" title="<?php echo $img_name; ?>" width="300" height="200" class="img-responsive" /></a>
	  <h4>Bread Poha Recipe</h4>
	  <p>Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. 
         Praesent mauris. Fusce nec </p>
	  <a href="details.php?id=<?php echo $id;?>"class="button">View More</a>

	 </div>
	</div>

	<?php } ?>

   </div>
 



  </div>
 </div>
</section>



<?php 

require('./incs/footer.php')
?>


<script>
        $(document).ready(function() {
            $('select[name="section"]').on('change', function() {
                var SectionId = $(this).val();
				console.log(SectionId);
                if (SectionId) {
                    $.ajax({
                        url: "{{ URL::to('section') }}/" + SectionId,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
							
                            // $('select[name="product"]').empty();
                            // $.each(data, function(key, value) {
                            //     $('select[name="product"]').append('<option value="' +
                            //         value + '">' + value + '</option>');
                            // });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
</body>
</html>