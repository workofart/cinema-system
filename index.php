<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <style>
        @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
        body {
            background-image: url("/src/img/whitebg.jpg");
            /*background: linear-gradient (45deg, blue, red);*/
            /*opacity: 0.9;*/
            /*background: -webkit-linear-gradient(to bottom,
            rgba(64, 64, 64, 1) 0%,
            rgba(64, 64, 64, 0) 10%,
            rgba(64, 64, 64, 0) 20%,
            rgba(64, 64, 64, 1) 30%);*/
            /*background-size: cover;*/
            opacity:0;  /* make things invisible upon start */
            -webkit-animation:fadeIn ease-in 1;  /* call our keyframe named fadeIn, use animattion ease-in and repeat it only 1 time */
            -moz-animation:fadeIn ease-in 1;
            animation:fadeIn ease-in 1;

            -webkit-animation-fill-mode:forwards;  /* this makes sure that after animation is done we remain at the last keyframe value (opacity: 1)*/
            -moz-animation-fill-mode:forwards;
            animation-fill-mode:forwards;

            -webkit-animation-duration:1s;
            -moz-animation-duration:1s;
            animation-duration:1s;
            }
            table{
                max-width: none;
            }
            .form-control{
                width: 30%;
            }
</style>
</head>
<body>
  <?php  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
  ?>
  <?php include $root . '/connectdb.php'; ?>
  <div class="jumbotron">
      <div class="container">
        <h1>Welcome to the Cinema System <span class="glyphicon glyphicon-film"></span></h1>
        <p>Created by:Hanxiang (Henry) Pan</p>
        <p>Student Number: 250608428</p>
        <p>
            <a class="btn btn-primary btn-lg" href="frontend_staff.php" role="button">Front-end</a>
            <a class="btn btn-primary btn-lg" href="backend_staff.php" role="button">Back-end</a>
        </p>
    </div>
</div>
</body>
</html>