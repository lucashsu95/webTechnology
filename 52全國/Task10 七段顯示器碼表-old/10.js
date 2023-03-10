let Lcount = 0;
let Lcount2 = 0;

let time = 0;
let time2 = 0;

function show() {
    time = document.getElementById("time");
    time.innerHTML = formatTime(Lcount);
}

function stop() {
    console.log('stop')

    time2 = time
    Lcount2 = Lcount

    Lcount = time = 0
}

function pad(num, size) {
    var s = "00" + num;
    return s.substr(s.length - size);
}

function formatTime(time) {
    var s = cs = 0;

    s = Math.floor(time / 100);
    //console.log('s ' + s)
    time = time % (60 * 1000);
    cs = time % 100;
    //console.log('cs ' + cs)
    newTime = pad(s, 3) + ":" + pad(cs, 2);
    return newTime;
}


function start() {
    console.log('start')
    if (time2 != '') {
        time = document.getElementById("time");
        time = time2;
        Lcount = Lcount2;
    }

    //console.log('time' + ':' + time)
    //console.log('time2' + ':' + time2)
    //console.log('Lcount' + ':' + Lcount)

    for (let i = Lcount; i < 999; i++) {
        setTimeout(() => {
            Lcount++
            time.innerHTML = formatTime(Lcount);
            //console.log(Lcount)
        }, i * 10);
    }
}

function reset() {
    location.href = "10.html";
}