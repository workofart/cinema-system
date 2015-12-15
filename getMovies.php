  
    <div class="panel panel-default">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Movie List (By Alphabet) <span class="glyphicon glyphicon-chevron-down"></span>
        </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">
          <table class="table table-bordered table-hover">
            <?php
            $query = "select * from Movie order by movieName";
            $result = mysqli_query($connection, $query);
            if (!$result){
            echo "
            <br>
            <div class='alert alert-danger' role='alert'>
              Query Failed" . $sql . "
              <br>" . mysqli_error($connection) . "</div>";
            }
            echo "<h2>Movie Info</h2>";
            echo "<tr class='info'><th>Movie Name</th>"
            . "<th>Year</th>"
            . "<th>MovieID</th>"
            . "<th>Movie Poster</th></tr>";
            while ($row = mysqli_fetch_assoc($result)){
            echo "<tr class='active'><td>"
            . $row["movieName"] . "</td>" . "<td>"
          . $row["YEAR"] . "</td>" . "<td>"
        . $row["mID"] . "</td>" . "<td>";
        if($row["moviePoster"] == null){ echo "Poster N/A";} else { echo "<img src=" . $row["moviePoster"] . " height='240' width='360'></td>";}
        }
        mysqli_free_result($result);
        ?>
      </table>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" role="tab" id="headingTwo">
    <h4 class="panel-title">
    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      Movie List (By Year) <span class="glyphicon glyphicon-chevron-down"></span>
    </a>
    </h4>
  </div>
  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
    <div class="panel-body">
      <table class="table table-bordered table-hover">
        <?php
        $query = "select * from Movie order by year";
        $result = mysqli_query($connection, $query);
        if (!$result){
        echo "
        <br>
        <div class='alert alert-danger' role='alert'>
          Query Failed" . $sql . "
          <br>" . mysqli_error($connection) . "</div>";
        }
        echo "<h2>Movie Info</h2>";
        echo "<tr class='info'><th>Year</th>"
        . "<th>Movie Name</th>"
        . "<th>MovieID</th>"
        . "<th>Movie Poster</th></tr>";
        while ($row = mysqli_fetch_assoc($result)){
        echo "<tr class='active'><td>"
        . $row["YEAR"] . "</td>" . "<td>"
        . $row["movieName"] . "</td>" . "<td>"
        . $row["mID"] . "</td>" . "<td>";
        if($row["moviePoster"] == null){ echo "Poster N/A";} else { echo "<img src=" . $row["moviePoster"] . " height='240' width='360'></td>";}
        }
    mysqli_free_result($result);
    ?>
  </table>
</div>
</div>
</div>