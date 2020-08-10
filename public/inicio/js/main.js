/*===== SCROLL REVEAL ANIMATION =====*/
const sr = ScrollReveal({
    origin: 'top',
    distance: '80px',
    duration: 2000,
    reset: true
});

/*SCROLL Last Product*/
sr.reveal('.tit1',{});
sr.reveal('.button',{delay: 200});
sr.reveal('.home__img',{delay: 400});
sr.reveal('.txt',{ interval: 200});

/*SCROLL ABOUT*/
sr.reveal('.about__img',{});
sr.reveal('.about__subtitle',{delay: 400});
sr.reveal('.about__text',{delay: 400});

/*SCROLL INDEX*/
sr.reveal('.home__txt',{});
sr.reveal('.home__text',{});
sr.reveal('.home__data',{interval: 50});
sr.reveal('.home__img',{delay: 100});

/*SCROLL PRODUCT*/
sr.reveal('.tit', {});
sr.reveal('.work__img',{interval: 50});

/*SCROLL CONTACT*/
sr.reveal('.formulario__grupo',{interval: 50});




