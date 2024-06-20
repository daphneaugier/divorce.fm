function openForm() {
    document.getElementById("myForm").style.display = "block";
  }

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    let widget,
        playButton = document.getElementById('play'),
        pauseButton = document.getElementById('pause'),
        nextButton = document.getElementById('next'),
        currentTrackIndex = 0,
        tracks = [
            'https://soundcloud.com/divorce-fm/webinar-tm-06-euphoria',
            'https://soundcloud.com/divorce-fm/webinar-tm-12-zetta',
            'https://soundcloud.com/divorce-fm/trivial-pursuit-wii-theme-5',
            'https://soundcloud.com/divorce-fm/trivial-pursuit-wii-theme-1'
        ];

    function loadTrack(trackUrl) {
        const iframe = document.getElementById('sc-widget');
        iframe.src = `https://w.soundcloud.com/player/?url=${trackUrl}&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true`;

        widget = SC.Widget(iframe);
    }

    function playTrack() {
        playButton.src = "assets/images/buttonplay_pressed.png";
        pauseButton.src = "assets/images/buttonpause.png";
        if (widget) widget.play();
    }

    function pauseTrack() {
        pauseButton.src = "assets/images/buttonpause_pressed.png";
        playButton.src = "assets/images/buttonplay.png";
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