document.addEventListener("DOMContentLoaded", function () {
    let widget,
        playButton = document.getElementById('play'),
        pauseButton = document.getElementById('pause'),
        nextButton = document.getElementById('next'),
        currentTrackIndex = 0,
        tracks = [
            'https://api.soundcloud.com/tracks/keziahhhhhhhhhhhh/miami-mix-1',
            'https://api.soundcloud.com/tracks/keziahhhhhhhhhhhh/pour-les-amis-mix-2'
        ];

    function loadTrack(trackUrl) {
        const playerContainer = document.getElementById('player');
        playerContainer.innerHTML = '';

        widget = SC.Widget(playerContainer);
        widget.load(trackUrl, {
            auto_play: false,
            show_comments: true,
            show_user: true
        });
    }

    function playTrack() {
        playButton.src = "assets/images/buttonplay_pressed.png";
        if (widget) widget.play();
    }

    function pauseTrack() {
        pauseButton.src = "assets/images/buttondot_pressed.png";
        if (widget) widget.pause();
    }

    function nextTrack() {
        nextButton.src = "assets/images/buttonnext_pressed.png";
        currentTrackIndex = (currentTrackIndex + 1) % tracks.length;
        loadTrack(tracks[currentTrackIndex]);
    }

    playButton.addEventListener('click', playTrack);
    pauseButton.addEventListener('click', pauseTrack);
    nextButton.addEventListener('click', nextTrack);

    loadTrack(tracks[currentTrackIndex]);
});
