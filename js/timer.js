function formatatempo(segs) {
    min = 0;
    hr = 0;
    /*
    if hr < 10 then hr = "0"&hr
    if min < 10 then min = "0"&min
    if segs < 10 then segs = "0"&segs
    */
    while(segs>=60) {
        if (segs >=60) {
            segs = segs-60;
            min = min+1;
        }
    }
    
    while(min>=60) {
        if (min >=60) {
            min = min-60;
            hr = hr+1;
        }
    }
    
    if (hr < 10) {hr = "0"+hr}
    if (min < 10) {min = "0"+min}
    if (segs < 10) {segs = "0"+segs}
    fin = hr+":"+min+":"+segs
    return fin;
}

var segundos = 0; //inicio do cronometro

function conta() {
    segundos++;
    document.getElementById("counter").innerHTML = formatatempo(segundos);
}
    
function inicia(){
    interval = setInterval("conta();",1000);
}
    
function para(){
    clearInterval(interval);
}
    
function zera(){
    clearInterval(interval);
    segundos = 0;
    document.getElementById("counter").innerHTML = formatatempo(segundos);
}