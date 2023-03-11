let Lcount = 0;
var Lflag = 0;
let time = 0;

function show() {
    time = document.getElementById("time");
    time.innerHTML = formatTime(Lcount);
}

function stop() {
    Lflag = 0;
}
function pad(num, size) {
    var s = "00" + num;
    return s.substr(s.length - size);
}

function formatTime(time) {
    var s = cs = 0;
    console.log(time)
    s = Math.floor(time / 100);
    time = time % (60 * 1000);
    cs = time % 100;

    newTime = pad(s, 3) + ":" + pad(cs, 2);
    return newTime;
}

function fs_count() {
    if (Lflag == 1) {
        Lcount++;
        show();
        setTimeout("fs_count()", 10);
    }
}
function start() {
    Lflag = 1;
    fs_count();
}

function reset() {
    location.href = "10.html";
}