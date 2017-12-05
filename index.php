<?php session_start();
if(!isset($_SESSION['fav']))
{
  $_SESSION['fav']=array();
}
/*print_r($_SESSION['fav']);*/
?>
<html>
<head>
  <title>SoundColudSearch</title>
  <script src="https://connect.soundcloud.com/sdk/sdk-3.1.2.js"></script>
</head>
<body style="background: darkkhaki;margin-top: : 8px">

<!-- <p>Suggestions: <span id="txtHint"></span></p>
  <p>Suggestions2: <span id="txtHint2"></span></p> -->

  <div id="putTheWidgetHere" style="height: 400px;background-image: url('turntable3.jpg');background-position:center;background-size:cover;min-width: 1024px">
  </div>
  <div style="text-align:center">
          <form style="height: 10px" action="/index.php" method="POST">
           <input name="top_100" type="submit" value="Top 100"/>
           <input name="house_top_100" type="submit" value="House Top 100" />
           <input name="breaks_top_100" type="submit" value="Breaks Top 100" />
         </form>
  </div>

  <div style="min-width: 1024px" >

      <div style="width: 22%;display: inline-block; vertical-align:top;margin-top: 8px">
        <div style="text-align:center">
          Top tracks:
          <hr>
<!--           <form style="height: 10px" action="/index.php" method="POST">
           <input name="myActionName3" type="submit" value="Top 100"/>
           <input name="myActionName" type="submit" value="House Top 100" />
           <input name="myActionName2" type="submit" value="Breaks Top 100" />
         </form> -->
        <!--  <hr> -->
        </div>
        <div style="overflow: auto;width: 100%;height: 50%">
          <?php
          if (isset($_POST['house_top_100']))
          {
            require_once('parse_file.php');
            Parse('top_100_house_beatport.txt');
          }
          else if (isset($_POST['breaks_top_100']))
          {
            require_once('parse_file.php');
            Parse('top_100_breaks_beatport.txt');
          }
          else if (isset($_POST['top_100']))
          {
            require_once('parse_file.php');
            Parse('top_100_beatport.txt');
          }
          else
          {
            /*include 'file_parse.php';*/
   /*         require_once('file_parse.php');*/
          }
          ?> 
        </div>
      </div>

      <div style="width: 53%;display: inline-block;margin-top: 5px">
        <div style="text-align:center">
          Track name: <input id="title" style="width: 30%" onkeypress="clickPress(event)" >
          <button id="search">Search</button>
        </div>
        <hr>
        <div style="overflow: auto;width: 100%;height: 50%">
          <a href="#"><ol id="list"></ol></a>
        </div>
      </div>

      <div style="width: 22%;display: inline-block;vertical-align:top;margin: 8px">
        <div style="text-align:center">
        Favorites:
        <hr>
        </div> 
        <div style="overflow: auto;width: 100%;height: 50%">
          <a href="#"><ol id="favorit">
            <?php
            require_once('load_favorites.php');
            ?>
          </ol></a>
        </div>
      </div>

</div>
<script src="Functions.js"></script>
</body>
</html>


