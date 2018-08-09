<!DOCTYPE html>
<html lang="en-us">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Unity WebGL Player | TankBattle</title>
    <link rel="shortcut icon" href="/game//TankBattleWeb/TemplateData/favicon.ico">
    <link rel="stylesheet" href="/game//TankBattleWeb/TemplateData/style.css">
    <script src="/game/TankBattleWeb/TemplateData/UnityProgress.js"></script>  
    <script src="/game//TankBattleWeb/Build/UnityLoader.js"></script>
    <script>
      var gameInstance = UnityLoader.instantiate("gameContainer", "/game//TankBattleWeb/Build/TankBattleWeb.json", {onProgress: UnityProgress});
    </script>
  </head>
  <body>
    <div class="webgl-content">
      <div id="gameContainer" style="width: 960px; height: 600px"></div>
      <div class="footer">
        <div class="webgl-logo"></div>
        <div class="fullscreen" onclick="gameInstance.SetFullscreen(1)"></div>
        <div class="title">TankBattle</div>
      </div>
    </div>
  </body>
</html>