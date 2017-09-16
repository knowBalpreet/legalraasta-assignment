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

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">LegalRaasta</h3>
              <nav class="nav nav-masthead">
                <a class="nav-link" href="index.php">Home</a>
                <a class="nav-link active" href="form.php">Form</a>
                <a class="nav-link" href="display.php">Display</a>
              </nav>
            </div>
          </div>

          <div class="inner cover">
                        
            <form action="upload.php" id="myform" method="post" enctype="multipart/form-data">
            <center>
              <div class="form-group">
                <label for="upload">Please upload the valid CSV file here!</label>
                <br><input type="file" class="form-control-file btn btn-outline-success" name="csvfile" id="upload">
              <button type="submit" class="btn btn-outline-success" id="uploaded"><i class="fa fa-check-square-o" style="color:white"></i></button>
              </div>
              <small>Refer to Sample CSV file here:</small>
                <a href="file.csv" target="_download" class="btn btn-outline-light">Sample File</a>
            </center>
            </form>
          </div>
          <br>
          <div id="message"> 
          </div>


        </div>

      </div>

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
  $("#myform").submit(function(e){
    return false; 
  });

  $('#uploaded').on('click', function() {
    var file_data = $('#upload').prop('files')[0];   
    console.log(file_data);
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    // alert(form_data);
    console.log(form_data);                             
    $.ajax({
                type: 'POST',
                url: 'upload.php', // point to server-side PHP script 
                data: form_data,                         
                dataType: 'text',  // what to expect back from the PHP script, if anything
                cache: false,
                contentType: false,
                processData: false,
                success: function(response){
                  $('#message').html(response);
                   },
                error: function(response){
                    $('#message').html(response); // display response from the PHP script, if any
                }
     });
});
</script>