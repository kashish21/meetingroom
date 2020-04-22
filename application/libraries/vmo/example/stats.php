<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   
</head>
<body>
<!-- <span style="display:inline-block; position:absolute; font-size:22px; color:yellow; z-index: 2147483647;" id="random">RANDOM</span> -->

<div style="background:red;z-index:2147483647; width:100%; height:360px; opacity:0; position:absolute;" id="overlay">
</div>
<iframe src="https://player.vimeo.com/video/276419333" width="640" height="360" frameborder="0" allowfullscreen></iframe>
<br><br><br><br>
<button id="play">Play Video</button>
<button id="pause">Play Video</button>
<div class="slidecontainer">
  <input type="range" min="1" max="100" value="0" step="1"  class="slider" id="myRange">
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    // alert(); 
    document.addEventListener('contextmenu', event => event.preventDefault());
    function moveDiv() 
    {
        var $span = $("#random");
        
        $span.fadeOut(50, function() {
            var maxLeft = $(window).width() - $span.width();
            var maxTop = $(window).height() - $span.height();
            var leftPos = Math.floor(Math.random() * (maxLeft + 1))
            var topPos = Math.floor(Math.random() * (maxTop + 1))
        
            $span.css({ left: leftPos, top: topPos }).fadeIn(1000);
        });
    };

    moveDiv();
    setInterval(moveDiv, 1000);
</script> 

<script src="https://player.vimeo.com/api/player.js"></script>
<script>
    var iframe = document.querySelector('iframe');
    var player = new Vimeo.Player(iframe);
    var seek;
    

    player.getCurrentTime().then(function(seconds) {
        console.log(seconds);
    }).catch(function(error) {
        // an error occurred
    });
    
    player.ready().then(function() {
        player.getDuration().then(function(duration)
        {
            console.log(duration);
            // duration = the duration of the video in seconds
            $('input[type=range]').prop('min','1');
            $('input[type=range]').prop('max',duration);
        }).catch(function(error) {
            // an error occurred
        });
    });
   
    player.on('play', function() {
        seek = setInterval(function(){

        player.getCurrentTime().then(function(seconds) {
            $("input[type=range]").val(seconds);
            console.log(seconds);
        }).catch(function(error) {
            // an error occurred
        });

        },1000);
    });

    player.on('pause', function() {
        clearInterval(seek);
    });

    $('input[type=range]').change(function(){
        var setTime = $("input[type=range]").val();
        player.setCurrentTime(setTime).then(function(seconds) {
                //player.play();
            }).catch(function(error) {
                switch (error.name) {
                    case 'RangeError':
                        // the time was less than 0 or greater than the video’s duration
                        break;

                    default:
                        // some other error occurred
                        break;
                }
            });
    });

    player.getVideoTitle().then(function(title) {
        console.log('title:', title);
    });

    $('#play').click(function(){
        player.play();
    });
    $('#pause').click(function(){
        player.pause();
    });
    
    $('#overlay').click(function(e){
        e.preventDefault();
    });
    
</script>

</body>
</html>

