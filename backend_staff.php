<!DOCTYPE html>
<html>
<head>
  <title>Back-end Dashboard</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
    @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
    body {
    background-image: url("/src/img/whitebg.jpg");
    background-size: cover;
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
    .form-control{
    max-width: 50%;
    }
    #over{
    background:rgba(166,166,166,0.3);
    }
    .page-header{
    text-indent: 20px;
    }
    </style>
  <script type="text/javascript">
    $(function() {
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
    localStorage.setItem('lastTab', $(this).attr('href'));
    });
    // go to the latest tab, if it exists:
    var lastTab = localStorage.getItem('lastTab');
    if (lastTab) {
    $('[href="' + lastTab + '"]').tab('show');
    }
    });
    </script>
</head>
<body>
  <?php  $root = realpath($_SERVER["DOCUMENT_ROOT"]);
    ?>
  <?php include $root . '/header.php'; include $root . '/connectdb.php'; ?>
  <div class="page-header" id="over">
    <br>
    <h1>
      Cinema Staff Dashboard
      <small>(Back-end)</small>
    </h1>
  </div>
  <div class="container-fluid">
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      <?php
        include $root . '/getMovies.php';
        ?>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="showing">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseShowing" aria-expanded="false" aria-controls="collapseShowing">
              Showing List
              <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
          </h4>
        </div>
        <div id="collapseShowing" class="panel-collapse collapse" role="tabpanel" aria-labelledby="showing">
          <div class="panel-body">
            <?php
              include $root . '/getShowings.php';
              ?></div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="Customer">
          <h4 class="panel-title">
            <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCustomer" aria-expanded="false" aria-controls="collapseCustomer">
              Customer List
              <span class="glyphicon glyphicon-chevron-down"></span>
            </a>
          </h4>
        </div>
        <div id="collapseCustomer" class="panel-collapse collapse" role="tabpanel" aria-labelledby="Customer">
          <div class="panel-body">
            <?php
              include $root . '/getCustomers.php';
              ?></div>
        </div>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="container-fluid">
      <div class="col-md-12">
        <div class="well">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#addMovie" aria-controls="addMovie" role="tab" data-toggle="tab">Add Movie/Genre</a>
            </li>
            <li role="presentation">
              <a href="#deleteMovie" aria-controls="deleteMovie" role="tab" data-toggle="tab">Delete Movie/Genre</a>
            </li>
            <li role="presentation">
              <a href="#addRoom" aria-controls="addRoom" role="tab" data-toggle="tab">Add/Modify Room Info</a>
            </li>
            <li role="presentation">
              <a href="#deleteRoom" aria-controls="deleteRoom" role="tab" data-toggle="tab">Delete Room</a>
            </li>
            <li role="presentation">
              <a href="#addCustomer" aria-controls="addCustomer" role="tab" data-toggle="tab">Add/Modify Customer Info</a>
            </li>
            <li role="presentation">
              <a href="#deleteCustomer" aria-controls="deleteCustomer" role="tab" data-toggle="tab">Delete Customer</a>
            </li>
            <li role="presentation">
              <a href="#addShowing" aria-controls="addShowing" role="tab" data-toggle="tab">Add/Modify Showing Info</a>
            </li>
            <li role="presentation">
              <a href="#deleteShowing" aria-controls="deleteShowing" role="tab" data-toggle="tab">Delete Showing</a>
            </li>
          </ul>
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="addMovie">
              <?php include $root . '/addMovie.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="deleteMovie">
              <?php include $root . '/deleteMovie.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="addRoom">
              <?php include $root . '/addRoom.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="deleteRoom">
              <?php include $root . '/deleteRoom.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="addCustomer">
              <?php include $root . '/addCustomer.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="deleteCustomer">
              <?php include $root . '/deleteCustomer.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="addShowing">
              <?php include $root . '/addShowing.php' ?></div>
            <div role="tabpanel" class="tab-pane fade" id="deleteShowing">
              <?php include $root . '/deleteShowing.php' ?></div>
          </div>
          <!-- End Tab --> </div>
        <!-- End Well --> </div>
      <!-- End Col-md-3 --> </div>
  </div>
  <!-- </div>
  -->
  <!-- </div>--></body>
</html>
<!-- <div class="col-md-3">
<div class="well">
  <div class="page-header">
    <h3>Deletion Panel</h3>
  </div>
  <form id="addform" action="deleteMovie.php" method="post" >
    <div class="alert alert-warning" role="alert">Will remove the movie's associated genres</div>
    <div class="form-group">
      <label>MovieID</label>
      <input type="text" class="form-control" name="mID"></div>
    <div class="form-group">
      <label>MovieName</label>
      <input type="text" class="form-control" name="movieName"></div>
    <div class="form-group">
      <label>Year</label>
      <input type="text" class="form-control" name="YEAR"></div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" name = "submit" value="Remove"></div>
  </form>
</div>
</div>
-->
<!-- <div class="col-md-3">
<div class="well">
<div class="page-header">
  <h3>Deletion Panel</h3>
</div>
<form id="addform" action="deleteMovie.php" method="post" >
  <div class="alert alert-warning" role="alert">Will remove the movie's associated genres</div>
  <div class="form-group">
    <label>MovieID</label>
    <input type="text" class="form-control" name="mID"></div>
  <div class="form-group">
    <label>MovieName</label>
    <input type="text" class="form-control" name="movieName"></div>
  <div class="form-group">
    <label>Year</label>
    <input type="text" class="form-control" name="YEAR"></div>
  <div class="form-group">
    <input type="submit" class="btn btn-primary" name = "submit" value="Remove"></div>
</form>
</div>
</div>
-->