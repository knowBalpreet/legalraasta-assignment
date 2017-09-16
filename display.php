<?php include 'test.php'; ?>
<?php 

// echo "<pre>";
// var_dump(getNames());
// echo "</pre>";
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LegalRaasta Project</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
  </head>

  <body>

        <div class="container">

          <!-- <div class="ma sthead clearfix"> -->
            <div class="inner">
              <h3 class="masthead-brand">LegalRaasta</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link" href="form.php">Form</a>
                <a class="nav-link active" href="display.php">Display</a>
              </nav>
            </div>
          <!-- </div> -->

        </div>
<hr style=" display: block;height: 1px;border: 0;border-top: 1px solid #ccc;margin: 1em 0;padding: 0; ">
<br>          
          <div class="inner cover">
            <?php if (checkData()) {?>
              
            <div class="row">
              <div class="col-md-3" style="color: black;text-align: left;">

                <div id="accordion" role="tablist">
                  <div class="card">
                    <div class="card-header">
                      <i class="fa fa-hashtag" style="font-size: 23px"> Choices</i>
                    </div>
                  <div class="card">
                    <div class="card-header" role="tab" id="headingOne">
                      <h5 class="mb-0">
                        <a data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <i class="fa fa-filter" style="color: black;"> Marks Wise</i>
                        </a>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <?php foreach (getNames() as $id=>$name) { ?>
                          <li class="list-group-item" style="padding: 2px;"><button value="<?= $id ?>" class='btn btn-outline-dark' onclick="displayResultsfromNames(this.value)" style="width: 100%;"><i class="fa fa-arrow-circle-right" style="color:black;float: left;"></i> <b><?= $name ?></b></button></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" role="tab" id="headingTwo">
                      <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          <i class="fa fa-filter" style="color: black;"> Fields Wise</i>
                        </a>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        <ul class="list-group list-group-flush">
                          <?php foreach (getFields() as $key => $value) {?>                            
                          <li class="list-group-item" style="padding: 2px;"><button value="<?= $value ?>" class='btn btn-outline-dark' onclick="displayResultsfromFields(this.value)" style="width: 100%;"><i class="fa fa-arrow-circle-right" style="color:black;float: left;"></i> <b><?= explode("~", $value)[0] ?></b></button></li>
                          <?php } ?>
                        </ul>
                      </div>
                    </div>
                  </div>

                </div>
                </div>
              </div>
              <div class="col-md-9">
                <div class="welcome-msg">
                  <h1>Welcome to Display Results Page</h1>
                  <h3>Select an option from left to continue</h3>
                </div>
                <div id="getname"></div>
                <div class="graphdatafornames" id="bar_chart"></div>
                <div class="graphdataforfields"></div>
              </div>
            </div>
            <?php }else{ ?>
            <small>There is no data in database as of now. Please add data by clicking on the following link</small><br><br>
            <a href="form.php" class="btn btn-outline-success">Add Data</a>
            <?php } ?>
          </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<script>
    $('#collapseOne').collapse()
    
  function displayResultsfromNames(val) {
    $('.welcome-msg').hide();
    bar_chart_for_names(val);
    getNamefromid(val)
  }
  function displayResultsfromFields(val) {
    $('.welcome-msg').hide();
    bar_chart_for_subjects(val);
    getSubjectfromid(val);
    
  }
  
function getNamefromid(id) {
      $.ajax({
        type: 'POST',
        url: 'process.php', // point to server-side PHP script 
        data: {value:id},                         
        success: function(response){
          $('#getname').html(response);
            console.log(response); // display response from the PHP script, if any
           },
        error: function(response){
            console.log(response); // display response from the PHP script, if any
        }
     });
}
  
function getSubjectfromid(name) {
      $.ajax({
        type: 'POST',
        url: 'process.php', // point to server-side PHP script 
        data: {subject:name},                         
        success: function(response){
          $('#getname').html(response);
            console.log(response); // display response from the PHP script, if any
           },
        error: function(response){
            console.log(response); // display response from the PHP script, if any
        }
     });
}


</script>
<!--Load the AJAX API-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">

// Load the Visualization API and the piechart package.
google.charts.load('current', {'packages':['corechart']});
  
// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(bar_chart_for_names);
  
function bar_chart_for_subjects(name) {
  var jsonData = $.ajax({

    type: 'POST',
    url: 'process.php', // point to server-side PHP script 
    data: {name:name}, 
    dataType:"json",
    async: false,
  success: function(jsonData)
    {
      console.log(jsonData);
      var data = new google.visualization.arrayToDataTable(jsonData); 
          var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
              // Set chart options
        var options = {'colors':['green','red'],
                       'width':$(window).width()*(2.7/4),
                       'height':$(window).height()*(3/4) };
      chart.draw(data,options);
      
    } ,
    error: function(response){
      console.log(response);
    }
  }).responseText;
}

function bar_chart_for_names(id) {
  var jsonData = $.ajax({

    type: 'POST',
    url: 'process.php', // point to server-side PHP script 
    data: {id:id}, 
    dataType:"json",
    async: false,
  success: function(jsonData)
    {
      console.log(jsonData);
      var data = new google.visualization.arrayToDataTable(jsonData); 
          var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
              // Set chart options
        var options = {'colors':['green','red'],
                       'width':$(window).width()*(2.7/4),
                       'height':$(window).height()*(3/4) };
      chart.draw(data,options);
      
    } ,
    error: function(response){
      console.log(response);
    }
  }).responseText;
}
  </script>