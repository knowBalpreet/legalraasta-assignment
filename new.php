<html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(bar_chart);
      
  function bar_chart() {
    
    var jsonData = $.ajax({
      url: 'new/bar_chart.php',
        dataType:"json",
        async: false,
      success: function(jsonData)
        {
          var data = new google.visualization.arrayToDataTable(jsonData); 
              var chart = new google.visualization.BarChart(document.getElementById('bar_chart'));
          chart.draw(data);
          
        } 
      }).responseText;
  }
      </script>
  </head>
    <div style="font: 21px arial; padding: 10px 0 0 100px;">Bar Chart</div>
  <div id="bar_chart" style="width: 900px; height: 300px;"></div>
