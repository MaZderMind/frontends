<?php
$room = $_GET['room'];

if( !is_numeric($room) || !($room > 0 && $room < 7) ) {
 $room = 1;
}
$stream_base = 'http://streaming.camp.ccc.de:8000/';
$stream_baseH264 = 'rtsp://streaming.camp.ccc.de:8081/';
$stream = '';

switch($room) {
  case 2: $stream = 'baikonur'; $room = 'baikonur'; break;
  case 3: $stream = 'backpack'; $room = 'backpack'; break;
  case 1: default: $stream ='kourou'; $room = 'kourou'; break;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Chaos Communication Camp 2011 - Webstream - <?php print $room; ?></title>
    <link href="favicon.ico" rel="shortcut icon" />
    <link rel="stylesheet" href="base.css" type="text/css" media="screen" />
    <script type="text/javascript" src="jquery-1.4.2.min.js"></script>
</head>
<body>

<div id="main">
  <ul id="topmenu">
    <li><a href="?room=1">Kourou</a></li>
    <li><a href="?room=2">Baikonur</a></li>
    <li><a href="?room=3">Backpack</a><li>
  </ul>

  <div style="clear:both;"></div>

  <video id="player" src="<?php print $stream_base . $stream; ?>" width="720" height="576" controls autoplay poster="images/rocket.png">
    This browser is not compatible with HTML 5
  </video>

  <p id="now">Now watching: <?php print $room; ?></p>

  <ul id="bottommenu">
    <li><a href="#" onclick="$('#player').attr('width', 720); $('#player').attr('height', 576);">720x576</a></li>
    <li><a href="#" onclick="$('#player').attr('width', 320); $('#player').attr('height', 240);">320x240</a></li>
    <li><a href="<?php print $stream_base . $stream; ?>">Open video in external player</a></li>
    <li><a href="<?php print $stream_baseH264 . $stream; ?>">h264 stream URL</a></li>
  </ul>
</div>
</body>
</html>

