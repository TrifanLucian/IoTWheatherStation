<?php header("Refresh:10;");?>
<!DOCTYPE html>
<html>
<head>
<script src='https://bernii.github.io/gauge.js/dist/gauge.min.js'></script>
<style>

.flex-container {
  display: flex;
  flex-wrap: wrap;
}
.flex-left {
  background-color: #f1f1f1;

  flex: 33%;
}
.flex-center {
  background-color: dodgerblue;

  flex: 33%;
}
.flex-right {
  background-color: #f1f1f1;

  flex: 33%;
}


table, th, td {
  border: 1px solid black;
  text-align: center;
}
</style>
</head>
<body>





<?php
//$cnx = mysqli_connect("localhost", "root", "", "arduino") or die('Cannot connect to the DB');
$cnx = mysqli_connect("fdb1030.awardspace.net", "4294037_arduino", "Abcd1234", "4294037_arduino") or die('Cannot connect to the DB');
$interogare = "Select * From sensordata2 ORDER BY datetime DESC LIMIT 10";
$rezultat = mysqli_query($cnx, $interogare) or die ("Eroare: " . mysqli_error($cnx));
$randuri = mysqli_fetch_all($rezultat);
?>

<h2 style="text-align:center">Masuratori curente:</h2>

<div style="margin: 50px;" class="flex-container">
        <div class="flex-left">
                <div style="margin: auto;  width: 300px;">
                        Temperatura este de <?=$randuri[0][1]?>° Celsius!               
                        <canvas id="temperatura"></canvas>
                </div>
        </div>
        <div class="flex-center">
                <div style="margin: auto;  width: 300px;">
                        Umiditatea este de <?=$randuri[0][2]?>%!               
                        <canvas id="umiditate"></canvas>
                </div>
        </div>
        <div class="flex-right">
                <div style="margin: auto;  width: 300px;">
                        Presiunea este de <?=$randuri[0][3]?> mmHg!               
                        <canvas id="presiune"></canvas>
                </div>
        </div>
</div>

<h2 style="text-align:center">Ultimele 10 inregistrari</h2>

<table style="margin: auto; width: 80%" >
  <tr>
    <th>serverDateAndTime</th>
    <th>boardTEMP</th>
    <th>boardHUMID</th> 
    <th>boardPRES</th>
  </tr>
<?php
  
  foreach ($randuri as $rand) {
?>
  <tr>
    <td><?=$rand[0]?></td> <!--datetime-->
    <td><?=$rand[1]?></td> <!--boardTEMP-->
    <td><?=$rand[2]?></td> <!--boardHUMID-->
    <td><?=$rand[3]?></td> <!--boardPRES-->
  </tr>
<?php 
  } 
?>
</table>




</body>

<script>


var opts = {

  angle: 0, // The span of the gauge arc
  lineWidth: 0.44, // The line thickness
  radiusScale: 1, // Relative radius
  pointer: {
    length: 0.6, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
  colorStart: '#ACC1CF',   // Colors
  colorStop: '#DA0000',    // just experiment with them
  strokeColor: '#E0A4A4',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
    renderTicks: {
    divisions: 8,
    divWidth: 1.1,
    divLength: 0.7,
    divColor: '#333333',
    subDivisions: 3,
    subLength: 0.5,
    subWidth: 0.6,
    subColor: '#666666'
  },
  staticLabels: {
  font: "10px sans-serif",  
  labels: [0, 5, 10, 15, 20, 25, 30, 35, 40],  
  color: "#000000",  
  fractionDigits: 0  
  }
};

var opts2 = {
  angle: 0.15, // The span of the gauge arc
  lineWidth: 0.44, // The line thickness
  radiusScale: 1, // Relative radius
  pointer: {
    length: 0.64, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
  colorStart: '#6FADCF',   // Colors
  colorStop: '#8FC0DA',    // just experiment with them
  strokeColor: '#E0E0E0',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  // renderTicks is Optional
  renderTicks: {
    divisions: 5,
    divWidth: 1.1,
    divLength: 0.7,
    divColor: '#333333',
    subDivisions: 3,
    subLength: 0.5,
    subWidth: 0.6,
    subColor: '#666666'
  },
  staticLabels: {
  font: "10px sans-serif",  
  labels: [30,40,50,60,70,80],  
  color: "#000000",  
  fractionDigits: 0  
  }
  
};

var opts3 = {
  angle: 0.35, // The span of the gauge arc
  lineWidth: 0.1, // The line thickness
  radiusScale: 1, // Relative radius
  pointer: {
    length: 0.64, // // Relative to gauge radius
    strokeWidth: 0.035, // The thickness
    color: '#000000' // Fill color
  },
  limitMax: false,     // If false, max value increases automatically if value > maxValue
  limitMin: false,     // If true, the min value of the gauge will be fixed
  colorStart: '#6F6EA0',   // Colors
  colorStop: '#C0C0DB',    // just experiment with them
  strokeColor: '#EEEEEE',  // to see which ones work best for you
  generateGradient: true,
  highDpiSupport: true,     // High resolution support
  // renderTicks is Optional
  renderTicks: {
    divisions: 5,
    divWidth: 1.1,
    divLength: 0.7,
    divColor: '#333333',
    subDivisions: 3,
    subLength: 0.5,
    subWidth: 0.6,
    subColor: '#666666',   
  },
  staticLabels: {
  font: "10px sans-serif",  
  labels: [730,740,750,760,770,780],  
  color: "#000000",  
  fractionDigits: 0  
  }
};



var target = document.getElementById('temperatura'); // your canvas element
var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
gauge.maxValue = 40; // set max gauge value
gauge.setMinValue(0);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = 1; // set animation speed (32 is default value)
gauge.set(<?=$randuri[0][1]?>); // set actual value

var target2 = document.getElementById('umiditate'); // your canvas element
var gauge2 = new Gauge(target2).setOptions(opts2); // create sexy gauge!
gauge2.maxValue = 80; // set max gauge value
gauge2.setMinValue(30);  // Prefer setter over gauge.minValue = 0
gauge2.animationSpeed = 1; // set animation speed (32 is default value)
gauge2.set(<?=$randuri[0][2]?>); // set actual value

var target3 = document.getElementById('presiune'); // your canvas element
var gauge = new Donut(target3).setOptions(opts3); // create sexy gauge!
gauge.maxValue = 780; // set max gauge value
gauge.setMinValue(730);  // Prefer setter over gauge.minValue = 0
gauge.animationSpeed = 1; // set animation speed (32 is default value)
gauge.set(<?=$randuri[0][3]?>); // set actual value

</script>

</html>
