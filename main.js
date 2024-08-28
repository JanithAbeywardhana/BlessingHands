
const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};


const sr = ScrollReveal();

sr.reveal(".about-us .about-image img", {
    ...scrollRevealOption,
    interval: 1000, 
    distance: '50px', 
    origin: 'bottom', 
    opacity: 0, 
    easing: 'ease-in-out', 
    scale: 0.85, 
});


sr.reveal(".header .image img", {
    ...scrollRevealOption,
    interval: 1000, 
    distance: '50px', 
    origin: 'bottom', 
    opacity: 0, 
    easing: 'ease-in-out', 
    scale: 0.85, 
});

function animateCount(id, start, end, duration){
    let element = document.getElementById(id);
    let range = end - start;
    let startTime = null;

    function animation(currentTime){
        if (startTime === null) startTime = currentTime;
        let progress = currentTime - startTime;
        let value = Math.min(start + Math.floor((progress / duration) * range), end);
        element.innerHTML = value + '+';
        if (progress < duration) {
            requestAnimationFrame(animation);
        } else {
            element.innerHTML = end + '+';
        }
    }
    requestAnimationFrame(animation);
}

window.onload = function() {
    animateCount('count1', 0, 12, 1200);
    animateCount('count2', 0, 35, 1500);
    animateCount('count3', 0, 1700, 1300);
}


