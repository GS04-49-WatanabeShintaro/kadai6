<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>あなたは多数派？少数派？</title>
    <meta name="description" content="あなたが普段していることが多数派なのか少数派なのか診断できます。">
    <meta name="keywords" content="占い,診断,多数派,少数派">
    <!-- CSS読み込み -->
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- mycss -->
    <link href="css/mycss.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

    <!-- ファビコン読み込み -->
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
<body>
  <script>
  $(document).ready(function(){

//文字を出現させるコード。コピペ。
        var setElm = $('.split'),
        delaySpeed = 60,
        fadeSpeed = 0;

        setText = setElm.html();

        setElm.css({visibility:'visible'}).children().addBack().contents().each(function(){
            var elmThis = $(this);
            if (this.nodeType == 3) {
                var $this = $(this);
                $this.replaceWith($this.text().replace(/(\S)/g, '<span class="textSplitLoad">$&</span>'));
            }
        });
        $(window).load(function(){
            splitLength = $('.textSplitLoad').length;
            setElm.find('.textSplitLoad').each(function(i){
                splitThis = $(this);
                splitTxt = splitThis.text();
                splitThis.delay(i*(delaySpeed)).css({display:'inline-block',opacity:'0'}).animate({opacity:'1'},fadeSpeed);
            });
            setTimeout(function(){
                    setElm.html(setText);
            },splitLength*delaySpeed+fadeSpeed);
        });
//文字出現終了

//カウントダウン
var time = 16;
function countDown(){
  if (time != 1) {
    time = time - 1;
    $('#cd-text').html('00:' + ('0' + time).slice(-2) );//sliceで右から2桁表示
    var barLength = time / 16 * 100;//プログレスバーの長さ計算
    $('.progress-bar').attr({'style':'width:'+ barLength +'%'});//プログレスバーに長さを代入
    var down = setTimeout(countDown, 1000); //あとで停止するためにdownって変数にsetTimeout入れておく。
  } else {
    clearTimeout(down);//setTimeout終わり
    $('#cd-text').html('TIME OVER');
    $('.progress-bar').attr({'style':'width:0%'});
  }
};
countDown();
//カウントダウン終了



  });
  </script>

<?php

?>

<div id="q1" class="qPanel">
  <h4><b>問題</b></h4>
  <p class="split">エビフライは尻尾まで食べますか？</p>
</div>

<div class="countPanel">
  <div id="cd-text">00:20</div>
    <div class="progress">
      <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progressbar" style="width: 100%">
        <span class="sr-only"></span>
      </div>
  </div>
</div>

</body>
</html>
