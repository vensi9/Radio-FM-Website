var audio = document.getElementById("podcast");
var audio1 = document.getElementById("podcast1");
var audio2 = document.getElementById("podcast2");
var audio3 = document.getElementById("podcast3");
var audio4 = document.getElementById("podcast4");
var audio5 = document.getElementById("podcast5");

var progressBar = document.getElementById("progressBar");

audio.addEventListener("timeupdate", function () {
    var currentTime = audio.currentTime;
    var duration = audio.duration;
    var progress = (currentTime / duration) * 100;
    progressBar.value = progress;
});

