<?
require_once 'config.php';
?>
<html>
    <head>        
      <link rel="stylesheet" href="ammap/ammap.css" type="text/css">
      <link rel="stylesheet" href="css/style.css" type="text/css">
      <link rel="shortcut icon" href="img/fav.ico"> 
      <title>CSF - Attack Map</title>
    </head>
    <body>
        <div id="topo">
          <a href="#" target="_blank"><img src="img/logo.png"></a>
        </div>
        <div id="mapdiv" style=""></div>
    </body>  
  <script src="ammap/ammap.js" type="text/javascript"></script>
		<script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
        <script type="text/javascript">
          
			var map;

			AmCharts.ready(function() {
			    map = new AmCharts.AmMap();
			    map.pathToImages = "ammap/images/";
			    map.colorSteps = 7;          
              
			    var dataProvider = {
			        mapVar: AmCharts.maps.worldLow,
                    
			        areas: [<? include 'cache.php'; ?>]
			    };
			    map.areasSettings = {
			        autoZoom: <?= $config_am[AUTO_ZOOM]; ?>
			    };
			    map.dataProvider = dataProvider;
			    var valueLegend = new AmCharts.ValueLegend();
			    valueLegend.right = 10;
			    valueLegend.minValue = "1";
			    valueLegend.maxValue = <?= $max; ?>;
			    map.valueLegend = valueLegend;

			    <?
			    if($config_am[PERMANENT_BLOCK] != NULL){
			    ?>
				    var legend = new AmCharts.AmLegend();
				    legend.align = "center";
				    legend.data = [{title:"<?= $config_am[TEXT_PERMANENT_BLOCK]; ?>", color:"<?= $config_am[COLOR_PERMANENT_BLOCK]; ?>"}]
				    map.addLegend(legend);
                <?
                }
                ?>
			    map.write("mapdiv"); 
			});
		</script>  
</html>
