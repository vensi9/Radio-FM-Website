var audio = document.getElementById("podcast");
var audio1 = document.getElementById("podcast1");
var audio2 = document.getElementById("podcast2");

var playPauseBtn = document.getElementById("play-pause");
var playPauseBtn1 = document.getElementById("play-pause1");
var playPauseBtn2 = document.getElementById("play-pause2");
var playlistPlayPauseBtn = document.getElementById("play-pause-playlist");


playPauseBtn.addEventListener("click", function () {
    if (audio.paused) {
        audio.play();
        playPauseBtn.innerHTML = '<span class="material-icons"style="font-size: 84px;">pause_circle_outline</span>';
    } else {
        audio.pause();
        playPauseBtn.innerHTML = '<span class="material-icons"style="font-size: 84px;">play_circle_outline</span>';

    }
});

playPauseBtn1.addEventListener("click", function () {
    if (audio1.paused) {
        audio1.play();
        playPauseBtn1.innerHTML = '<span class="material-icons"style="font-size: 84px;">pause_circle_outline</span>';
    } else {
        audio1.pause();
        playPauseBtn1.innerHTML = '<span class="material-icons"style="font-size: 84px;">play_circle_outline</span>';

    }
});

playPauseBtn2.addEventListener("click", function () {
    if (audio2.paused) {
        audio2.play();
        playPauseBtn2.innerHTML = '<span class="material-icons"style="font-size: 84px;">pause_circle_outline</span>';
    } else {
        audio2.pause();
        playPauseBtn2.innerHTML = '<span class="material-icons"style="font-size: 84px;">play_circle_outline</span>';

    }
});

