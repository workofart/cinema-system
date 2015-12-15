<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Front-end Dashboard</title>
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
#over{
  background:rgba(166,166,166,0.3);
}
table{
  max-width: none;
}
.form-control{
  width: 30%;
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
    <h1>Cinema Staff Dashboard <small>(Front-end)</small></h1>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-4">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
            <!-- <div class="container">
            <div class="row"> -->
                <!--       <div class="col-md-6">
                  <?php
                  // include $root . '/getCustomers.php';
                  ?>
                </div> -->
                <!-- </div> -->
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="genre">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseGenre" aria-expanded="false" aria-controls="collapseGenre">
                        Movie Genres <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseGenre" class="panel-collapse collapse" role="tabpanel" aria-labelledby="genre">
                    <div class="panel-body">
                      <?php
                      include $root . '/getGenre.php';
                      ?>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Popular Movies (with 4+ Ratings) <span class="glyphicon glyphicon-chevron-down"></span>
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                      <?php
                      include $root . '/get4PlusRatings.php';
                      ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="well">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#giveRating" aria-controls="giveRating" role="tab" data-toggle="tab">Give Rating</a></li>
                  <li role="presentation"><a href="#getRating" aria-controls="getRating" role="tab" data-toggle="tab">Get Customer Rating</a></li>
                  <li role="presentation"><a href="#getCustomers" aria-controls="getCustomers" role="tab" data-toggle="tab">Get Customer Info</a></li>
                  <li role="presentation"><a href="#sellTicket" aria-controls="sellTicket" role="tab" data-toggle="tab">Sell Ticket</a></li>
                  <li role="presentation"><a href="#filterShowing" aria-controls="filterShowing" role="tab" data-toggle="tab">Filter Showing</a></li>
                </ul>
                <div class="tab-content">
                  <div role="tabpanel" class="tab-pane fade in active" id="giveRating">
                    <?php include $root . '/giveRating.php' ?>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="getRating">
                    <?php include $root . '/getMovieRating.php'; ?>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="getCustomers">
                    <?php include $root . '/customer.php'; ?>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="sellTicket">
                    <?php include $root . '/sellTicket.php' ?>
                  </div>
                  <div role="tabpanel" class="tab-pane fade" id="filterShowing">
                    <?php include $root . '/filteredShowings.php'; ?>
                  </div>
                </div> <!-- End Tab -->
              </div> <!-- End Well -->
            </div> <!-- End Col-md-8 -->
          </div>
        </div>
      </body>
      </html>
    </ul>
  </div> -->