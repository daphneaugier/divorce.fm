document.addEventListener("DOMContentLoaded", function () {
    var widget,
        playButton = document.getElementById('play'),
        pauseButton = document.getElementById('pause'),
        nextButton = document.getElementById('next'),
        currentTrackIndex = 0,
        tracks = [
            'https://api.soundcloud.com/tracks/keziahhhhhhhhhhhh/miami-mix-1',
            'https://api.https://soundcloud.com/keziahhhhhhhhhhhh/pour-les-amis-mix-2'
        ];

    function loadTrack(trackUrl) {
        var playerContainer = document.getElementById('player');
        playerContainer.innerHTML = '';

        widget = SC.Widget(playerContainer);
        widget.load(trackUrl, {
            auto_play: false,
            show_comments: true,
            show_user: true
        });
    }

    playButton.addEventListener('click', function () {
        if (widget) widget.play();
    });

    pauseButton.addEventListener('click', function () {
        if (widget) widget.pause();
    });

    nextButton.addEventListener('click', function () {
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        loadTrack(tracks[currentTrackIndex]);
    });

    loadTrack(tracks[currentTrackIndex]);
});
