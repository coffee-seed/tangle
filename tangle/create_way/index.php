<?php
	include_once('../tech/fun.php');
	$page='create_way';
	if(!check_cookie()){
		create_refer_cookie(' https://newpage.ddns.net/tangle/create_way/');
		header('Location: http://newpage.ddns.net/tangle/auth/');
		exit;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset='utf-8'>
		<title>
			<?php
				echo $texts[$page]['title'];
			?>
		</title>
				<link rel="shortcut icon" href="../media/logo/favico.png" type="image/x-icon">
		<link rel='stylesheet' type='text/css' href='../style/list.css'>
		<link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />
   <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
    <script type="text/javascript" src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
   <style>
			.My_window{
					visibility:hidden;
					width:0px;
					height:0px;
					position: fixed;
					top:10%;
				}
      .directions li span.arrow {
        display:inline-block;
        min-width:28px;
        min-height:28px;
        background-position:0px;
        background-image: url("https://heremaps.github.io/maps-api-for-javascript-examples/map-with-with-route-from-a-to-b-using-public-transport/img/arrows.png");
        position:relative;
        top:8px;
      }
      .directions li span.depart  {
        background-position:-28px;
      }
      .directions li span.rightUTurn  {
        background-position:-56px;
      }
      .directions li span.leftUTurn  {
        background-position:-84px;
      }
      .directions li span.rightFork  {
        background-position:-112px;
      }
      .directions li span.leftFork  {
        background-position:-140px;
      }
      .directions li span.rightMerge  {
        background-position:-112px;
      }
      .directions li span.leftMerge  {
        background-position:-140px;
      }
      .directions li span.slightRightTurn  {
        background-position:-168px;
      }
      .directions li span.slightLeftTurn{
        background-position:-196px;
      }
      .directions li span.rightTurn  {
        background-position:-224px;
      }
      .directions li span.leftTurn{
        background-position:-252px;
      }
      .directions li span.sharpRightTurn  {
        background-position:-280px;
      }
      .directions li span.sharpLeftTurn{
        background-position:-308px;
      }
      .directions li span.rightRoundaboutExit1 {
        background-position:-616px;
      }
      .directions li span.rightRoundaboutExit2 {
        background-position:-644px;
      }
      
      .directions li span.rightRoundaboutExit3 {
        background-position:-672px;
      }
      
      .directions li span.rightRoundaboutExit4 {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutPass {
        background-position:-700px;
      }
      
      .directions li span.rightRoundaboutExit5 {
        background-position:-728px;
      }
      .directions li span.rightRoundaboutExit6 {
        background-position:-756px;
      }
      .directions li span.rightRoundaboutExit7 {
        background-position:-784px;
      }
      .directions li span.rightRoundaboutExit8 {
        background-position:-812px;
      }
      .directions li span.rightRoundaboutExit9 {
        background-position:-840px;
      }
      .directions li span.rightRoundaboutExit10 {
        background-position:-868px;
      }
      .directions li span.rightRoundaboutExit11 {
        background-position:896px;
      }
      .directions li span.rightRoundaboutExit12 {
        background-position:924px;
      }
      .directions li span.leftRoundaboutExit1  {
        background-position:-952px;
      }
      .directions li span.leftRoundaboutExit2  {
        background-position:-980px;
      }
      .directions li span.leftRoundaboutExit3  {
        background-position:-1008px;
      }
      .directions li span.leftRoundaboutExit4  {
        background-position:-1036px;
      }
      .directions li span.leftRoundaboutPass {
        background-position:1036px;
      }
      .directions li span.leftRoundaboutExit5  {
        background-position:-1064px;
      }
      .directions li span.leftRoundaboutExit6  {
        background-position:-1092px;
      }
      .directions li span.leftRoundaboutExit7  {
        background-position:-1120px;
      }
      .directions li span.leftRoundaboutExit8  {
        background-position:-1148px;
      }
      .directions li span.leftRoundaboutExit9  {
        background-position:-1176px;
      }
      .directions li span.leftRoundaboutExit10  {
        background-position:-1204px;
      }
      .directions li span.leftRoundaboutExit11  {
        background-position:-1232px;
      }
      .directions li span.leftRoundaboutExit12  {
        background-position:-1260px;
      }
      .directions li span.arrive  {
        background-position:-1288px;
      }
      .directions li span.leftRamp  {
        background-position:-392px;
      }
      .directions li span.rightRamp  {
        background-position:-420px;
      }
      .directions li span.leftExit  {
        background-position:-448px;
      }
      .directions li span.rightExit  {
        background-position:-476px;
      }
      .directions li span.ferry  {
        background-position:-1316px;
      }
      </style>
		<link rel="shortcut icon" href="../media/logo/favico.png" type="image/x-icon">
		<link rel='stylesheet' type='text/css' href='../style/create_way.css'>
	</head>
	<body id="map-with-route">
	
	<header>
				<div>
				Создание маршрута
				</div>
				
	</header>
	  <div class='My_window' id='My_window'>
	  <input type='text' id='text1' value='Enter text'>
	  <button id='button1'>Дать название метке</button>
	</div>
	<main class='b'>
	 <input class='btn'type="button" id="btnAdd"  value="добавить маркер">
			<div class="mapp" style="width: 70%; height: 70vh" id="mapContainer">
            </div>
	</main>
	
	
	
	
	
	
    <div class="page-header">
 
  
  <div id="panel"></div>

  <form id='f1' action='' method='post'>
  <label for="name"><b>Название маршрута</b></label>
	<input  class='fr'type='text' id='name' name='name' value='way1'><br>
	<label for="name"><b>Аннотация</b></label>
	<input class='fr'type='text' id='title' name='title' value='title1'><br>
	<label for="name"><b>Полное описание</b></label>
	<textarea class='fr'rows='10'id='long_text' name='long_text' value='long_text1'>long_text</textarea><br>
	<label for="name"><b>Время планируемая на маршрут</b></label>
	<input class='fr'type='number' id='time' name='time' value='1'><br>
	<label for="name"><b>Тип(веший, вело, общ.транспорт, автомобиль)</b></label>
	<input class='fr'type='text' id='number' name='type' value='1'><br> 
	</form>
	<button id='button2'>Соединить точки</button>
	<h3></h3>
	<script src='../scripts/js/create_way/karta.js'></script>
		<script src='../scripts/js/create_way/demo.js'></script>
		<?php
			create_way_by_post();
			?>
	</body>
</html>

