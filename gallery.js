

//scrollReveal Option JS code
const scrollRevealOption = {
    distance: "50px",
    origin: "bottom",
    duration: 1000,
};

// Initialize ScrollReveal
const sr = ScrollReveal();







//Image Page container
sr.reveal(".image_card", {
    ...scrollRevealOption,
    interval: 1000, 
    distance: '50px', 
    origin: 'bottom', 
    opacity: 0, 
    easing: 'ease-in-out', 
    scale: 0.85, 
});
