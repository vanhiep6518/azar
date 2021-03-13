<!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
<div id="player"></div>

<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;
    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '512',
            width: '100%',
            playerVars: {
                'autoplay': 1,
                'loop':1,
                'controls': 0,
                'rel' : 0,
                'fs' : 0,
            },
            videoId: '{{$video_id}}',
            startSeconds:1,
            endSeconds:25,
            events: {
                'onStateChange': function(e) {
                    if (e.data === YT.PlayerState.ENDED) {
                        player.playVideo();
                    }
                }
            }
        });

    }

</script>
