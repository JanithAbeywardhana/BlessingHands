const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};


const sr = ScrollReveal();

//Container
sr.reveal(".course_card", {
    ...scrollRevealOption,
    interval: 1000, 
    distance: '50px',
    origin: 'bottom', 
    opacity: 0, 
    easing: 'ease-in-out', 
    scale: 0.85, 
});








