<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JQuery/Fontawesome Rating Plugin</title>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <script src="{{asset('assets/js/rating.js')}}"></script>
</head>
<body>

    <div class="row">
        <div class="col-12 col-md-6" style="font-size: 2em;">
            <h5>Example with half stars</h5>
            <div id="halfstarsReview"></div>
        </div>

        <div class="col-12 col-md-6">
            <label for="halfstarsInput">Stars</label>
            <input type="text" readonly id="halfstarsInput" class="form-control form-control-sm">
           
        </div>
        
<script>
      $("#halfstarsReview").rating({
        "half": true,
        "click": function (e) {
            // console.log($('#item_id').text());
            // console.log(e.starts);
            $("#halfstarsInput").val(e.stars);
            //   e.preventDefault();
             $.ajax({
                type: 'get',
                url: "{{route('store-stars')}}",
                data: {
                    rating: e.stars,
                    id:$('#item_id').text()
                },
                success: function (data) {
                       
// $('#show-rating').html(data);

                }, error: function (reject) {
                }
            });






    }



    });
</script>
</body>
</html>